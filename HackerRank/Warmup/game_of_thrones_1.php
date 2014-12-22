<?php

$inputFile = fopen("game_of_thrones_1.txt", "r") or die("Unable to open file!");

$data = array();
while(!feof($inputFile)) {
    $data[] = fgets($inputFile);
}
fclose($inputFile);

for ($i = 0; $i < count($data); $i++) {
    echo game(trim($data[$i])), "\n";
}

function game($str)
{
    $result = array();
    $flag   = 0;
    for ($i = 0; $i < strlen($str); $i++) {
        $result[$str[$i]][] = $str[$i];
    }
    foreach ($result as $item) {
        if (count($item) % 2 != 0) {
            $flag++;
        }
    }
    echo ($flag > 1) ? "NO" : "YES";
}
