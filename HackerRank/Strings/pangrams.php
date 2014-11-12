<?php

$inputFile = fopen("pangram.txt", "r") or die("Unable to open file!");

$data = array();
while (!feof($inputFile)) {
    $data[] = fgets($inputFile);
}
fclose($inputFile);

echo pangram(trim($data[0]));

function pangram($str)
{
    $chars = str_split(str_replace(' ', '', strtolower($str)));
    if (count(array_unique($chars)) == 26) {
        return 'pangram';
    } else {
        return 'not pangram';
    }
}
