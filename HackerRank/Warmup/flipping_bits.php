<?php

$inputFile = fopen("flipping_bits.txt", "r") or die("Unable to open file!");

$data = array();
while(!feof($inputFile)) {
    $data[] = fgets($inputFile);
}
fclose($inputFile);

for ($i = 1; $i < count($data); $i++) {
    echo flipping_bits(trim($data[$i])), "\n";
}

function flipping_bits($n)
{
    $result = '';
    $bin = decbin($n);
    $bin = substr("00000000000000000000000000000000", 0, 32 - strlen($bin)) . $bin;
    for ($i = 0; $i < strlen($bin); $i++) {
        $result .= $bin[$i] ^ 1;
    }
    return bindec($result);
}
