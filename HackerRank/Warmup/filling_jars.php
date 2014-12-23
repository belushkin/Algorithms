<?php

$inputFile = fopen("filling_jars.txt", "r") or die("Unable to open file!");

$data = array();
while(!feof($inputFile)) {
    $data[] = trim(fgets($inputFile));
}
fclose($inputFile);

list($n, $m) = explode(" ", $data[0]);
unset($data[0]);
echo fill_jars($n, $m, $data), "\n";

function fill_jars($n, $m, Array $matrix)
{
    $result = 0;
    for ($i = 1; $i < $m+1; $i++) {
        $exploded = explode(" ", $matrix[$i]);
        $result = $result + (($exploded[1] - $exploded[0] + 1) * $exploded[2]);
    }
    return floor($result / $n);
}
