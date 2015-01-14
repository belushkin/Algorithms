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
    sort($weights);

    $result = 1;
    $weight = $weights[0];
    for ($i = 1; $i < count($weights); $i++) {
        if ($weights[$i] - $weight > 4) {
            $weight = $weights[$i];
            $result++;
        }
    }
    return $result;
}
