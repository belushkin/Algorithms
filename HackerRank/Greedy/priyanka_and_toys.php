<?php

$inputFile = fopen("priyanka_and_toys.txt", "r") or die("Unable to open file!");

$data = array();
while(!feof($inputFile)) {
    $data[] = trim(fgets($inputFile));
}
fclose($inputFile);

echo greedy($data[1]), "\n";

function greedy($weights)
{
    $weights = explode(" ", $weights);
    $result = $weights[0] + 4;

    echo $result;
//    sort($weights);
    $i = 0;
    foreach($weights as $w) {
        if ($w <= $result) {
            $i++;
            continue;
        }
        break;
    }
    return $i;
}

//3

//10
//16 18 10 13 2 9 17 17 0 19
