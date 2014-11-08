<?php

// O(n^2(logN)) algorithm

$inputFile = fopen("input.txt", "r") or die("Unable to open file!");

$data = array();
while(!feof($inputFile)) {
    $data[] = fgets($inputFile);
}
fclose($inputFile);

$n = $data[0];
$numbers = explode(' ', $data[1]);

sort($numbers); // O(N^2)

for ($i = 0; $i < ($n - 3); $i++) { // O(logN)
    $a      = $numbers[$i];
    $start  = $i + 1;
    $end    = $n - 1;

    while ($start < $end) {
        $b = $numbers[$start];
        $c = $numbers[$end];

        if ($a + $b + $c == 0) {
            echo $a . " "  . $b . " " . $c . "\n";
            $start = $start + 1;
            $end = $end - 1;
        } elseif ($a + $b + $c > 0) {
            $end = $end - 1;
        } else {
            $start = $start + 1;
        }
    }
}
