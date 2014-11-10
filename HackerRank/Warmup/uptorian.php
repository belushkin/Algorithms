<?php

$inputFile = fopen("uptorian.txt", "r") or die("Unable to open file!");

$data = array();
while(!feof($inputFile)) {
    $data[] = fgets($inputFile);
}
fclose($inputFile);

for ($i = 1; $i < count($data); $i++) {
    echo uptorian($data[$i]) . "\n";
}

function uptorian($n) {
    if ($n == 0) {
        return 1;
    }
    if ($n % 2 == 0) {
        return 1 + uptorian($n-1);
    } else {
        return 2 * uptorian($n-1);
    }
}
