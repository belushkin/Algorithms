<?php

$inputFile = fopen("chief_hopper.txt", "r") or die("Unable to open file!");

$data = array();
while(!feof($inputFile)) {
    $data[] = trim(fgets($inputFile));
}
fclose($inputFile);

$n      = $data[0];
$h      = explode(" ", $data[1]);
$ret    = 0;
for ($i = $n-1; $i >= 0; $i--) {
    if (($ret + $h[$i]) % 2 == 1) {
        $ret = ($ret + $h[$i] + 1) >> 1;
        echo $ret, "\n";exit();
    } else {
        $ret = ($ret + $h[$i]) >> 1;
    }
}

echo $ret, "\n";