<?php

$inputFile = fopen("project_euler_1.txt", "r") or die("Unable to open file!");

$data = array();
while(!feof($inputFile)) {
    $data[] = trim(fgets($inputFile));
}
fclose($inputFile);

$n = $data[0];
//for ($i = 1; $i < $n+1; $i++) {
    echo euler(1000,3) + euler(1000,5) - euler(1000,15), "\n";
//}

function euler($k, $n)
{
    $m = ($k-1) / $n;
    return $n * $m * ($m+1) / 2;
}


//def sum_factors_of_n_below_k(k, n):
//    m = (k-1) // n
//    return n * m * (m+1) // 2
//
//def solution_01():
//    return (sum_factors_of_n_below_k(1000, 3) +
//        sum_factors_of_n_below_k(1000, 5) -
//        sum_factors_of_n_below_k(1000, 15))

