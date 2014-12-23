<?php

$inputFile = fopen("chocolate_feast.txt", "r") or die("Unable to open file!");

$data = array();
while(!feof($inputFile)) {
    $data[] = trim(fgets($inputFile));
}
fclose($inputFile);

for ($i = 1; $i < count($data); $i++) {
    echo chocolate_feast($data[$i]), "\n";
}

function chocolate_feast($str)
{
    $exploded   = explode(' ', $str);
    $money = intval($exploded[0] / $exploded[1]);
    return intval($money + ($money-1) / ($exploded[2]-1));
}

//3
//10 2 5
//12 4 4
//6 2 2
