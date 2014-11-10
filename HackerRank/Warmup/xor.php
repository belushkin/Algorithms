<?php

$inputFile = fopen("xor.txt", "r") or die("Unable to open file!");

$data = array();
while(!feof($inputFile)) {
    $data[] = fgets($inputFile);
}
fclose($inputFile);

$l = (int) $data[0];
$r = (int) $data[1];

echo maxxor($l, $r);

function maxxor($l, $r)
{
    $max = 0;
    while ($l <= $r) {
        for ($i = $l; $i <= $r; $i++) {
            $t = $l ^ $i;
            if ($t > $max) {
                $max = $t;
            }
        }
        $l = $l+1;
    }
    return $max;
}
