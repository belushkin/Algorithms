<?php

$inputFile = fopen("isfibo.txt", "r") or die("Unable to open file!");

$data = array();
while(!feof($inputFile)) {
    $data[] = fgets($inputFile);
}
fclose($inputFile);

$memo = array();
fibonacci(200);
for ($i = 1; $i < count($data); $i++) {
    if (in_array(trim($data[$i]), $memo)) {
        echo "IsFibo\n";
    } else {
        echo "IsNotFibo\n";
    }
}

function fibonacci($n)
{
    global $memo;
    if (!isset($memo[$n])) {
        if ($n == 1 || $n == 2) {
            $memo[$n] = 1;
        } else {
            $memo[$n] = fibonacci($n - 1) + fibonacci($n - 2);
        }
    }
    return $memo[$n];
}
