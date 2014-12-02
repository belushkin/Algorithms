<?php

$inputFile = fopen("minimum_draw.txt", "r") or die("Unable to open file!");

$data = array();
while (!feof($inputFile)) {
    $data[] = fgets($inputFile);
}
fclose($inputFile);

for ($i = 1; $i < count($data); $i++) {
    echo minimum_draw($data[$i]), "\n";
}

function minimum_draw($absnum) {
    if ($absnum == 1) {
        return 2;
    } else {
        return $absnum + 1;
    }
}
