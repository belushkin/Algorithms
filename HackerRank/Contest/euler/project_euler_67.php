<?php

$inputFile = fopen("project_euler_67.txt", "r") or die("Unable to open file!");

$data = array();
while(!feof($inputFile)) {
    $data[] = trim(fgets($inputFile));
}
fclose($inputFile);

$t      = $data[0];
$step1  = 2;
$step3  = 2;
$step2  = 1;

for ($i = 0; $i < $t; $i++) {
    $triangle   = array();
    $n          = $data[$step2];

    for ($j = 0; $j < $n; $j++) {
        $triangle[] = $data[$j + $step3];
    }
    $step1  = $step1 + $n + 2;
    $step2  = $step2 + $n + 1;
    $step3  = $step3 + $n + 1;

    echo euler($triangle), "\n";
}

function euler($triangle)
{
    $count = count($triangle);

    if ($count == 1) {
        return $triangle[0];
    }

    $up = explode(" ", $triangle[$count - 2]);
    $down = explode(" ", $triangle[$count - 1]);
    $result = array();

    for ($i = 0; $i < count($up); $i++) {
        $item = array();
        for ($j = $i; $j < $i + 2; $j++) {
            $item[] = $up[$i] + $down[$j];
        }
        $result[] = max($item);
    }
    unset($triangle[$count - 1]);
    $triangle[$count - 2] = implode(" ", $result);

    return euler($triangle);
}
