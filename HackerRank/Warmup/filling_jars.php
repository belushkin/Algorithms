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

//http://stackoverflow.com/questions/15549045/best-method-for-sum-two-arrays
function fill_jars($n, $m, Array $matrix)
{
    $result = array_fill(1,$n,0);
    for ($i = 1; $i < $m+1; $i++) {
        $exploded = explode(" ", $matrix[$i]);
        for ($j = intval($exploded[0]); $j <= intval($exploded[1]); $j++) {
            $result[$j] = $result[$j] + intval($exploded[2]);
        }
    }
    return floor(array_sum($result) / $n);
}
//5 3
//1 2 100
//2 5 100
//3 4 100
//160 - RESULT

//4 3
//2 3 603
//1 1 286
//4 4 882
//593 - RESULT

//4991588628 - RESULT