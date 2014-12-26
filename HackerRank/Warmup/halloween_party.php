<?php

$inputFile = fopen("halloween_party.txt", "r") or die("Unable to open file!");

$data = array();
while(!feof($inputFile)) {
    $data[] = fgets($inputFile);
}
fclose($inputFile);

for ($i = 1; $i < count($data); $i++) {
    echo halloween(trim($data[$i])), "\n";
}

function halloween($str)
{
    return floor($str/2) * ceil($str/2);
}

//2
//3 9
//17 24


//5 - 6 = 3*2
//6 - 9 = 3*3
//7 - 12 = 3*4
//8 - 16 = 4*4