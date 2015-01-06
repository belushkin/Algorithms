<?php

$inputFile = fopen("flipping_bits.txt", "r") or die("Unable to open file!");

$data = array();
while(!feof($inputFile)) {
    $data[] = fgets($inputFile);
}
fclose($inputFile);

for ($i = 1; $i < count($data); $i++) {
    echo flipping_bits(trim($data[$i])), "\n";
}

function flipping_bits($n)
{
    $a = 0b00000000000000000000000000000000;
    //$a = 0b00000000;
    $n = 4;

    $bin = decbin(4294967294);
    $bin = substr("00000000000000000000000000000000", 0, 32 - strlen($bin)) . $bin;

//    $bedon = $a | $bin;
    print_r($bin);
    echo "\n";
    exit();
    return $a & $n;
}


//<?php
//$n    = trim(fgets(STDIN));
//$i    = 0;
//while($i < intval($n)) {
//    echo flipping_bits(trim(fgets(STDIN))), "\n";
//    $i++;
//}
//
//function flipping_bits($n)
//{
//    return 0b00000000000000000000000000000000 | $n;
//}
//
//?>
