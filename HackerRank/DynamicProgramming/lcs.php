<?php
//9 10
//3 9 8 3 9 7 9 7 0
//3 3 9 9 9 1 7 2 0 6
// 3 3 9 9 7 0

//5 6
//1 2 3 4 1
//3 4 1 2 1 3
//1 2 3

$inputFile = fopen("lcs.txt", "r") or die("Unable to open file!");

$data = array();
while (!feof($inputFile)) {
    $data[] = fgets($inputFile);
}
fclose($inputFile);

echo lcs(trim($data[1]), trim($data[2]));

//$t = fgets(STDIN);
//$str1 = fgets(STDIN);
//$str2 = fgets(STDIN);
//
//echo lcs(trim($str1), trim($str2));

function lcs($set1, $set2) {
    if (strlen($set1) > strlen($set2)) {
        return lcs($set2, $set1);
    }
    $result     = $part = array();
    $set1       = explode(' ', $set1);
    $set2       = explode(' ', $set2);

    echo implode('', $set1), "\n";
    echo implode('', $set2), "\n";
    echo "\n";

    $position = 0;
    for ($i = 0; $i < count($set1); $i++) {
        $set3 = array();
        for ($j = 0; $j < count($set2); $j++) {
            if ($set1[$i] == $set2[$j]) {
                $result[] = $set2[$j];
                for ($k = $j; $k < count($set2); $k++) {
                    $set3[] = $set2[$k];
                }
                $set2 = $set3;
                break;
            }
        }
    }
    print_r($result);

    //return implode(' ', $output);
}