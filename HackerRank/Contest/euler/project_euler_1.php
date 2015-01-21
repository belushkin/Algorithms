<?php

$inputFile = fopen("project_euler_1.txt", "r") or die("Unable to open file!");

$data = array();
while(!feof($inputFile)) {
    $data[] = trim(fgets($inputFile));
}
fclose($inputFile);

$n = $data[0];
for ($i = 1; $i < $n+1; $i++) {
    echo euler($data[$i],3) + euler($data[$i],5) - euler($data[$i],15), "\n";
}

function euler($k, $n)
{
    $m = intval(($k-1) / $n);
    return $n * $m * ($m+1) / 2;
}
