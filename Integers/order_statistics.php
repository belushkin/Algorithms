<?php

$list = array(3,4,5,7,8,2,5,6,9,0,1);

function partition($list, $pivot)
{
    $left = $right = array();

    $len = count($list);
    for ($i = 0; $i < $len; $i++) {
        if ($list[$i] <= $pivot) {
            $left[] = $list[$i];
        } else {
            $right[] = $list[$i];
        }
    }

    if (count($left) == 0) {
        $left[] = $pivot;
    } else {
        $right[] = $pivot;
    }
    return array($left, $right);
}

function order_statistic($list, $i)
{
    if (count($list) == 1) {
        return $list[0];
    }

    // ceate a non empty partitions
    // extract the pivot from the list and
    // in case one of the sub-lists is empty
    // add the pivot there!
    $pivot = array_pop($list);
    list($left, $right) = partition($list, $pivot);

    if (count($left) >= $i) {
        return order_statistic($left, $i);
    } else {
        return order_statistic($right, $i - count($left));
    }
}

// 4
echo order_statistic($list, 5);
