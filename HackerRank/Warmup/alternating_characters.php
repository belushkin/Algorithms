<?php

$inputFile = fopen("alternating_characters.txt", "r") or die("Unable to open file!");

$data = array();
while(!feof($inputFile)) {
    $data[] = fgets($inputFile);
}
fclose($inputFile);

for ($i = 1; $i < count($data); $i++) {
    echo alternating_characters(trim($data[$i])), "\n";
}

function alternating_characters($str)
{
    $i = 0;
    $count = 0;
    while ($i < strlen($str)) {
        if ($str[$i] == @$str[$i+1]) {
            $count++;
        }
        $i++;
    }
    return $count;
}


//49979
//50062
//49889
//50005
//50069
//50262
//49984
//50262
//49950
//50075
