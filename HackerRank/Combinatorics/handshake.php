<?php

$inputFile = fopen("handshake.txt", "r") or die("Unable to open file!");

$data = array();
while (!feof($inputFile)) {
    $data[] = fgets($inputFile);
}
fclose($inputFile);

for ($i = 1; $i < count($data); $i++) {
    echo handshake($data[$i]), "\n";
}

function handshake($absnum) {
    if ($absnum == 1) {
        return 0;
    } else {
        return ($absnum - 1)  + handshake($absnum - 1);
    }
}
