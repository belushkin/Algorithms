<?php

define(MIN, 1);
define(MAX, 9);
$list = array(4, 3, 5, 9, 7, 2, 4, 1, 6, 5);

function radix_sort(&$input)
{
    $temp = array();
    $len = count($input);

    // initialize with 0s
    $temp = array_fill(MIN, MAX-MIN+1, 0);

    foreach ($input as $key => $val) {
        $temp[$val]++;
    }

    $input = array();
    foreach ($temp as $key => $val) {
        if ($val == 1) {
            $input[] = $key;
        } else {
            while ($val--) {
                $input[] = $key;
            }
        }
    }
}

// 4, 3, 5, 9, 7, 2, 4, 1, 6, 5
echo implode(' ', $list), "\n";

radix_sort($list);

// 1, 2, 3, 4, 5, 5, 6, 7, 8, 9
echo implode(' ', $list), "\n";