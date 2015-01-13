<?php

$inputFile = fopen("mark_and_toys.txt", "r") or die("Unable to open file!");

$data = array();
while(!feof($inputFile)) {
    $data[] = trim(fgets($inputFile));
}
fclose($inputFile);

echo greedy($data[0], $data[1]), "\n";

function greedy($price, $prices)
{
    $result = 0;
    $t      = explode(" ", $price);
    $price  = $t[1];
    $prices = explode(" ", $prices);

    sort($prices);
    $i = 0;
    foreach($prices as $p) {
        $result += $p;
        if ($result > $price) {
            break;
        }
        $i++;
    }
    return $i;
}
