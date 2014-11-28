<?php
//9 10
//3 9 8 3 9 7 9 7 0
//3 3 9 9 9 1 7 2 0 6
//3 3 9 9 7 0

//5 6
//1 2 3 4 1
//3 4 1 2 1 3
//3 4 1

//50 46
//16 27 89 79 60 76 24 88 55 94 57 42 56 74 24 95 55 33 69 29 14 7 94 41 8 71 12 15 43 3 23 49 84 78 73 63 5 46 98 26 40 76 41 89 24 20 68 14 88 26
//27 76 88 0 55 99 94 70 34 42 31 47 56 74 69 46 93 88 89 7 94 41 68 37 8 71 57 15 43 89 43 3 23 35 49 38 84 98 47 89 73 24 20 14 88 75

//27 76 88 55 94 42 56 74 69 7 94 41 8 71 15 43 3 23 49 84 98 89 24 20 14 88

//27 76 88 55 94 42 56 74 69 46 88
$inputFile = fopen("lcs.txt", "r") or die("Unable to open file!");

$data = array();
while (!feof($inputFile)) {
    $data[] = fgets($inputFile);
}
fclose($inputFile);

$t  = explode(' ', trim($data[0]));
$s1 = explode(' ', trim($data[1]));
$s2 = explode(' ', trim($data[2]));

$n = $t[0];
$m = $t[1];

//AATCC
//$s1 = array('A', 'A', 'T', 'C', 'C');
//$s1 = 'AATCC';

//ACACG
//$s2 = array('A', 'C', 'A', 'C', 'G');
//$s2 = 'ACACG';

$result = array();
$c      = lcs($s1,$s2);
backtrack($c, $s1, $s2, count($s1), count($s2), $result);
echo implode(' ', array_reverse($result));

function lcs($s1, $s2)
{
    $length1 = count($s1);//strlen($s1);
    $length2 = count($s2);//strlen($s2);
    $c       = array();

    for ($i = 0; $i < $length1+1; $i++) {
        for ($j = 0; $j < $length2+1; $j++) {
            $c[$i][$j] = 0;
        }
    }
    for ($i = 1; $i < $length1+1; $i++) {
        for ($j = 1; $j < $length2+1; $j++) {
            if ($s1[$i-1] == $s2[$j-1]) {
                $c[$i][$j] = $c[$i-1][$j-1] + 1;
            } else {
                $c[$i][$j] = max($c[$i][$j-1], $c[$i-1][$j]);
            }
        }
    }
    return $c;
}

function backtrack($c, $s1, $s2, $i, $j, &$result)
{
    if ($i == 0 || $j == 0) {
        return "";
    } else if ($s1[$i-1] == $s2[$j-1]) {
        $result[] = $s1[$i-1];
        return backtrack($c, $s1, $s2, $i-1, $j-1, $result) + $s1[$i-1];
    } else {
        if ($c[$i][$j-1] > $c[$i-1][$j]) {
            return backtrack($c, $s1, $s2, $i, $j-1, $result);
        } else {
            return backtrack($c, $s1, $s2, $i-1, $j, $result);
        }
    }
}

//$t = fgets(STDIN);
//$str1 = fgets(STDIN);
//$str2 = fgets(STDIN);
//
//echo lcs(trim($str1), trim($str2));
//$arr = array();
//function lcs(Array $s, $n, Array $t, $m)
//{
//    global $arr;
//    if ($n == 0|| $m == 0) {
//        return 0;
//    }
//    if (isset($arr[$n][$m])) {
//        return $arr[$n][$m];
//    }
//    if ($s[$n] == $t[$m]) {
//        $result = 1+ lcs($s,$n-1,$t,$m-1);
//    } else {
//        $result = max(lcs($s,$n-1,$t,$m), lcs($s,$n,$t,$m-1));
//    }
////    echo $n, " ", $m, " ", $result , "\n";
//    $arr[$n][$m] = $result;
//    return $result;
//}
