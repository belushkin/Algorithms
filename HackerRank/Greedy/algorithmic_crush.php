<?php

$inputFile = fopen("algorithmic_crush.txt", "r") or die("Unable to open file!");

$data = array();
while(!feof($inputFile)) {
    $data[] = trim(fgets($inputFile));
}
fclose($inputFile);

$t = explode(" ", $data[0]);
$n = trim($t[0]);
$m = trim($t[1]);

$result = array();
for ($i = 1; $i < $m+1; $i++) {
    $t = explode(" ", $data[$i]);
    $result[] = array($t[0], $t[2]); // a, k
    $result[] = array($t[1]+1, -$t[2]); // b + 1, -k
}
$max_val = $cur_val = 0;

sort($result);
for ($i = 0; $i < $m*2; $i++) {
    $cur_val += $result[$i][1];
    $max_val = max($max_val, $cur_val);
}
echo $max_val, "\n";
