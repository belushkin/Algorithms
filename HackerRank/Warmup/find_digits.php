<?php

$inputFile = fopen("find_digits.txt", "r") or die("Unable to open file!");

$data = array();
while(!feof($inputFile)) {
    $data[] = fgets($inputFile);
}
fclose($inputFile);

for ($i = 1; $i < count($data); $i++) {
    echo find_digits(trim($data[$i])), "\n";
}

function find_digits($n)
{
    $result = 0;
    for ($i = 0; $i < strlen($n); $i++) {
        if ($n[$i] && ($n % $n[$i] == 0) ) {
            $result++;
        }
    }
    return $result;
}
