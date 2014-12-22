<?php

$inputFile = fopen("the_love_letter_mystery.txt", "r") or die("Unable to open file!");

$data = array();
while(!feof($inputFile)) {
    $data[] = fgets($inputFile);
}
fclose($inputFile);

for ($i = 1; $i < count($data); $i++) {
    echo love_letter(trim($data[$i])), "\n";
}

function love_letter($str)
{
    $len    = strlen($str);
    $until  = ceil($len/2);
    $count  = 0;
    for($i=0; $i < $until; ++$i) {
        if ($str[$i] != $str[$len - $i - 1]) {
            $count = $count + abs(ord($str[$i]) - ord($str[$len - $i - 1]));
        }
    }
    echo $count;
}

//11
//11
//58
//27
//4
