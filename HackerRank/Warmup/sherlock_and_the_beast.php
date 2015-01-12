<?php

$inputFile = fopen("sherlock_and_the_beast.txt", "r") or die("Unable to open file!");

$data = array();
while(!feof($inputFile)) {
    $data[] = fgets($inputFile);
}
fclose($inputFile);

for ($i = 1; $i < count($data); $i++) {
    echo satb(trim($data[$i])), "\n";
}

function satb($number)
{
    if ($number == 1) {
        return -1;
    }
    if ($number % 3 == 0) {
        return str_repeat('5', $number);
    }
    if ($number % 5 == 0) {
        return str_repeat('3', $number);
    }
    $highest = $number - ($number % 3);
    return $highest;
    return $number;
}

//2
//3 9
//17 24
