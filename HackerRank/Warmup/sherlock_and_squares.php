<?php

$inputFile = fopen("sherlock_and_squares.txt", "r") or die("Unable to open file!");

$data = array();
while(!feof($inputFile)) {
    $data[] = fgets($inputFile);
}
fclose($inputFile);

for ($i = 1; $i < count($data); $i++) {
    echo sas(trim($data[$i])), "\n";
}

function sas($str)
{
    $exploded   = explode(' ', $str);
    $root       = sqrt($exploded[0]);
    if ((int)$root == $root) {
        $exploded[0] = $exploded[0] - 1;
    }
    if ($exploded[0] < 0) {
        $exploded[0] = 0;
    }
    return floor(sqrt($exploded[1])) - floor(sqrt($exploded[0]));
}

//2
//3 9
//17 24
