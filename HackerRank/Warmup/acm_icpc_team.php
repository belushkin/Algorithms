<?php

$inputFile = fopen("acm_icpc_team.txt", "r") or die("Unable to open file!");

$data = array();
while(!feof($inputFile)) {
    $data[] = trim(fgets($inputFile));
}
fclose($inputFile);

unset($data[0]);
$result = find_maximum($data);
while (list($key, $value) = each($result)) {
    echo $value, "\n";
}

function find_maximum(Array $matrix)
{
    $length     = count($matrix);
    $max        = 0;
    $result     = array();

    for ($i = 1; $i < $length+1; $i++) {
        for ($j = $i+1; $j < $length+1; $j++) {
            $str    = $matrix[$i] | $matrix[$j];
            $t      = strlen(str_replace('0','',$str));
            $max    = max($max, $t);
            $result[$t][] = 1;
        }
    }
    return array($max, count($result[$max]));
}
