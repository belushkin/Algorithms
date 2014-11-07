<?php

// O(n^3) algorithm

$inputFile = fopen("input.txt", "r") or die("Unable to open file!");

$data = array();
while(!feof($inputFile)) {
    $data[] = fgets($inputFile);
}
fclose($inputFile);

$n = $data[0];
$numbers = explode(' ', $data[1]);

$count = 0;
for ($i = 0; $i < $n; $i++) {
    for ($j = $i+1; $j < $n; $j++) {
        for ($k = $j+1; $k < $n; $k++) {
            if ($numbers[$i] + $numbers[$j] + $numbers[$k] == 0) {
                echo $numbers[$i] . " "  . $numbers[$j] . " " . $numbers[$k] . "\n";
            }
        }
    }
}
