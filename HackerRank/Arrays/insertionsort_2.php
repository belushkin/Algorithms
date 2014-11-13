<?php

insertionsort(array(1, 4, 3, 5, 6, 2));

function insertionSort(array $array)
{
    $length = count($array);
    for ($i = 1; $i < $length; $i++) {
        $element = $array[$i];
        $j = $i;
        while ($j > 0 && $array[$j - 1] > $element) {
            //move value to right and key to previous smaller index
            $array[$j] = $array[$j - 1];
            $j = $j - 1;
        }
        //put the element at index $j
        $array[$j] = $element;
        echo implode(' ', $array) . "\n";
    }
    return $array;
}

/*
$t = fgets(STDIN);
$string = fgets(STDIN);

insertionsort(explode(' ', $string));

function insertionsort(array $input)
{
    $length = count($input);
    for ($i = $length - 1; $i >= 0; $i-- ) {
        $t = $input[$i];
        $j = $i;
        while ($j > 0 && $input[$j - 1] > $t) {
            $input[$j] = $input[$j - 1];
            $j = $j - 1;
        }
        $input[$j] = $t;
        echo implode(' ', $input) . "\n";
    }
}
*/