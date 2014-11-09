<?php

$input = array(6, 5, 3, 1, 8, 7, 2, 4);

function merge_sort($arr)
{
    if (count($arr) <= 1) {
        return $arr;
    }

    $left = array_slice($arr, 0, (int)(count($arr)/2));
    $right = array_slice($arr, (int)(count($arr)/2));

    $left = merge_sort($left);
    $right = merge_sort($right);

    $output = merge($left, $right);

    return $output;
}


function merge($left, $right)
{
    $result = array();

    while (count($left) > 0 && count($right) > 0) {
        if ($left[0] <= $right[0]) {
            array_push($result, array_shift($left));
        } else {
            array_push($result, array_shift($right));
        }
    }

    array_splice($result, count($result), 0, $left);
    array_splice($result, count($result), 0, $right);
    return $result;
}

// 1, 2, 3, 4, 5, 6, 7, 8
$output = merge_sort($input);
print_r($output);