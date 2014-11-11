<?php

function binary_search($value, $data = array()) {
    $lo = 0;
    $high = count($data) - 1;

    while ($lo <= $high) {
        $mid = $lo + floor(($high - $lo) / 2);
        if ($value < $data[$mid]) {
            $high = $mid - 1;
        } elseif($value > $data[$mid]) {
            $lo = $mid + 1;
        } else {
            return $mid;
        }
    }
    return -1;
}

echo binary_search(78, array(30,33,44,45,50,56,78,88,89,90,92,94,99,100));