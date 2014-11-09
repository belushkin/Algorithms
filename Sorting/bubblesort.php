<?php

$input = array(6, 5, 3, 1, 8, 7, 2, 4);

function bubble_sort($arr)
{
    $length = count($arr);

    for ($i = 0; $i < $length; $i++) {
        for ($j = $length-1; $j > $i; $j--) {
            if ($arr[$j] < $arr[$j-1]) {
                $t = $arr[$j];
                $arr[$j] = $arr[$j-1];
                $arr[$j-1] = $t;
            }
        }
    }

    return $arr;
}

// 1, 2, 3, 4, 5, 6, 7, 8
$output = bubble_sort($input);