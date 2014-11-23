<?php

// 1 idea - use counting sort with zero filled array
// 2 idea - exhaustive search
// 3 idea - use hashSet for counting lcs

$data = array(100,4,200,1,3,2);

function lcs($data) {
    if (count($data) == 0) {
        return 0;
    }

    // Use a hashSet
    foreach ($data as $key => $value) {
        $result[$value] = 1;
    }

    $max = 1;
    for ($i = 0; $i < count($data); $i++) {
        $left = $data[$i] - 1;
        $right = $data[$i] + 1;
        $count = 1;

        while (in_array($left, array_keys($result))) {
            $count++;
            unset($result[$left]);
            $left--;
        }
        while (in_array($right, array_keys($result))) {
            $count++;
            unset($result[$right]);
            $right++;
        }
        $max = max($count, $max);
    }

    return $max;
}

var_dump(lcs($data)); //4
