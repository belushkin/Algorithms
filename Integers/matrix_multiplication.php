<?php

$matrix1 = array(
    array(1,2,3),
    array(4,5,6)
);

$matrix2 = array(
    array(7,8),
    array(9,10),
    array(11,12)
);

$result = array();
for($i = 0; $i < count($matrix1); $i++) {
    for ($k = 0; $k < count($matrix1); $k++) {
        $result[$i][$k] = 0;
        for($j = 0; $j < count($matrix1[$i]); $j++) {
            $result[$i][$k] += $matrix1[$i][$j] * $matrix2[$j][$k];
        }
    }
}

print_r($result);

//$matrix3 = array(
//    array(58,64),
//    array(139,154)
//);
