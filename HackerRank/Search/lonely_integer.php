<?php

$inputFile = fopen("lonely_integer.txt", "r") or die("Unable to open file!");

$data = array();
while (!feof($inputFile)) {
    $data[] = fgets($inputFile);
}
fclose($inputFile);

echo lonely_integer(explode(" ", trim($data[1]))), "\n";

function lonely_integer($input) {
    for ($i = 0; $i < count($input); $i++) {
        if (!in_array($input[$i], array_merge(array_slice($input,0,$i),array_slice($input,$i+1)))) {
            return $input[$i];
        }
    }
    return false;
}
