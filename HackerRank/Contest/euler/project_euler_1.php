<?php

$inputFile = fopen("project_euler_1.txt", "r") or die("Unable to open file!");

$data = array();
while(!feof($inputFile)) {
    $data[] = trim(fgets($inputFile));
}
fclose($inputFile);

$n = $data[0];
for ($i = 1; $i < $n+1; $i++) {
    echo euler($data[$i]), "\n";
}

// http://stackoverflow.com/questions/4587320/project-euler-1find-the-sum-of-all-the-multiples-of-3-or-5-below-1000
// :Find the sum of all the multiples of 3 or 5 below 1000
//For n=10; and k =3; ( 3 * (3+1) / 2) * 3
function euler($n)
{
    $result = 0;
    $k1     = 3;
    $k2     = 5;

//    $result = ()



}
