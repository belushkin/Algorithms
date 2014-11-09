<?php

$input = array(6, 5, 3, 1, 8, 7, 2, 4);

function shell_sort($arr)
{
    $gaps = array(1, 2, 3, 4, 6);
    $gap = array_pop($gaps);
    $len = count($arr);

    while ($gap > 0) {
        for ($i = $gap; $i < $len; $i++) {

            $temp = $arr[$i];
            $j = $i;

            while ($j >= $gap && $arr[$j - $gap] > $temp) {
                $arr[$j] = $arr[$j - $gap];
                $j -= $gap;
            }

            $arr[$j] = $temp;
        }

        $gap = array_pop($gaps);
    }

    return $arr;
}

// 1, 2, 3, 4, 5, 6, 7, 8
shell_sort($input);