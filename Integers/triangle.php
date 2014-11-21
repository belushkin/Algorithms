<?php
/*
Given a triangle, find the minimum path sum from top to bottom. Each step you may move to adjacent numbers on the row below.

For example, given the following triangle

[
    [2],
    [3,4],
    [6,5,7],
    [4,1,8,3]
]

The minimum path sum from top to bottom is 11 (i.e., 2 + 3 + 5 + 1 = 11).

*/

$triangle = array(
    array(2),
    array(3,4),
    array(6,5,7),
    array(4,1,8,3),
);

function partition($list, $pivot)
{
    $left = $right = array();
    for($i = 0; $i < count($list); $i++) {
        if ($list[$i] <= $pivot) {
            $left[] = $list[$i];
        } else {
            $right[] = $list[$i];
        }
    }

    if (empty($left)) {
        $left[] = $pivot;
    } else {
        $right[] = $pivot;
    }
    return array($left, $right);
}

function order_statistics($list, $i) {
    if (count($list) == 1) {
        return $list[0];
    }

    $pivot = array_pop($list);
    list($left, $right) = partition($list, $pivot);
    if (count($left) >= $i) {
        return order_statistics($left, $i);
    } else {
        return order_statistics($right, $i - count($left));
    }
}

function minimumPath($triangle) {
    $result = 0;
    for ($i = 0; $i < count($triangle); $i++) {
        $result += order_statistics($triangle[$i], 1);
    }
    return $result;
}

echo minimumPath($triangle);

