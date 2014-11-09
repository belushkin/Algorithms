<?php

$list = array(5, 3, 9, 8, 7, 2, 4, 1, 6, 5);

// recursive
function quicksort($array)
{
    if (count($array) == 0) {
        return array();
    }

    $pivot = $array[0];
    $left = $right = array();

    for ($i = 1; $i < count($array); $i++) {
        if ($array[$i] < $pivot) {
            $left[] = $array[$i];
        } else {
            $right[] = $array[$i];
        }
    }

    return array_merge(quicksort($left), array($pivot), quicksort($right));
}

// 1, 2, 3, 4, 5, 5, 6, 7, 8, 9
print_r(quicksort($list));
