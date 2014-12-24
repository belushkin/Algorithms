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

// http://math.stackexchange.com/questions/548043/how-to-find-all-perfect-squares-in-a-given-range-of-numbers
function sas($str)
{
    $exploded   = explode(' ', $str);
    return floor(sqrt($exploded[1])) - floor(sqrt($exploded[0]));
}

//2
//3 9
//17 24
