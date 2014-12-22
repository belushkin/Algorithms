<?php

$inputFile = fopen("acm_icpc_team.txt", "r") or die("Unable to open file!");

$data = array();
while(!feof($inputFile)) {
    $data[] = fgets($inputFile);
}
fclose($inputFile);

$matrix = array();
for ($i = 1; $i < count($data); $i++) {
    $length = strlen(trim($data[$i]));
    for ($j = 0; $j < $length; $j++) {
        $matrix[$i-1][] = $data[$i][$j];
    }
}

$result = find_maximum($matrix);
while (list($key, $value) = each($result)) {
    echo $value, "\n";
}

function find_maximum(Array $matrix)
{
    $length = count($matrix);
    $c          = 0;
    $max        = 0;
    $result     = array();
    $maxValue   = count($matrix[0]);

    while ($c < $length) {
        for ($i = 0; $i < count($matrix); $i++) {
            if ($c == $i) {
                continue;
            }
            $t = 0;
            for ($j = 0; $j < count($matrix[$i]); $j++) {
                $t = $t + ($matrix[$i][$j] or $matrix[$c][$j]);
            }
            $max = max($t, $max);
            if ($t == $maxValue) {
                $result[] = 1;
            }
        }
        $c++;
    }
    return array($max, count($result) / 2);
}
