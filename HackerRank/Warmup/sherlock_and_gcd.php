<?php

$inputFile = fopen("sherlock_and_gcd.txt", "r") or die("Unable to open file!");

$data = array();
while(!feof($inputFile)) {
    $data[] = trim(fgets($inputFile));
}
fclose($inputFile);

$j = 0;
for ($i = 0; $i < $data[0]; $i++) {
    echo sag($data[$j+1], $data[$j+2]), "\n";
    $j = $j + 2;
}

function sag($count, $numbers)
{
    $exploded   = explode(' ', $numbers);
    $number     = ceil(count($exploded) / $count);

    if (count($exploded) == 1) {
        return "NO";
    }

    $j = 0;
    for ($i = 0; $i < $number; $i++) {
        $subset = array_slice($exploded, $j, $count);
        $j      = $j + $count;

        $answer = gcd($subset[0], $subset[1]);
        for ($k = 2; $k < count($subset); $k++) {
            $answer = gcd($answer, $subset[$k]);
        }
    }

    return ($answer > 1) ? "NO" : "YES";

}

function gcd($a, $b)
{
    return ($a % $b) ? gcd($b, $a % $b) : $b;
}
