<?php

$data   = array(7,0,1,2,0,3,0,4,2,3);
$result = array();

foreach ($data as $key => $value) {
    if (count($result) < 3) {
        $result[] = $value;
    } else {
        if (!in_array($value, $result)) {
            $index = ($value > 3) ? $value : 3;
            $lru = $data[$key - $index];

            $key = array_search($lru, $result);
            $result = array_replace($result, array($key => $value));
        }
    }
    if (count($result) == 3) {
        echo implode(' ', $result), "\n";
    }
}

print_r($result);
