<?php

$inputFile = fopen("two_arrays.txt", "r") or die("Unable to open file!");

$data = array();
while(!feof($inputFile)) {
    $data[] = trim(fgets($inputFile));
}
fclose($inputFile);

$n = $data[0];
$j = 0;
for ($i = 0; $i < $n; $i++) {
    echo greedy($data[$j+1], $data[$j+2], $data[$j+3]), "\n";
    $j = $j + 3;
}

function greedy($kn, $a, $b)
{
    $t = explode(" ", $kn);
    $n = $t[1];
    $a = explode(" ", $a);
    $b = explode(" ", $b);
    $result = array();

    for ($i = 0; $i < count($b); $i++) {
        $c = array();
        $value  = array_shift($a);
        array_push($a, $value);

        print_r(implode(" ", $a));
        echo "\n";
        print_r(implode(" ", $b));
        echo "\n=======================\n";
        for ($j = 0; $j < count($b); $j++) {
            $c[] = $a[$j] + $b[$j] ;
        }
        $result[] = compute($c, $n);
    }
    return in_array("YES", $result) ? "YES" : "NO";
}

function compute($data = array(), $n)
{
    for ($i = 0; $i < count($data); $i++) {
        if ($data[$i] < $n) {
            return "NO";
        }
    }
    return "YES";
}


//YES
//NO

//2
//3 10
//2 1 3
//7 8 9
//4 5
//1 2 2 1
//3 3 3 4


//YES
//NO
//NO
//YES
//YES

//5
//2 4
//1 3
//3 1
//5 5
//2 3 1 1 1
//1 3 4 3 3
//10 9
//1 5 1 4 4 2 7 1 2 2
//8 7 1 7 7 4 4 3 6 7
//10 9
//3 6 8 5 9 9 4 8 4 7
//5 1 0 1 6 4 1 7 4 3
//10 4
//4 4 3 2 1 4 4 3 2 4
//2 3 0 1 1 3 1 0 0 2

