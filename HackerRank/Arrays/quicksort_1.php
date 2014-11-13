<?php

print_r(quicksort(array(4, 5, 3, 7, 2)));


function quicksort($input)
{
    $pivot = $input[0];
    $l = $r = array();
    for ($i = 0; $i < count($input); $i++) {
        if ($input[$i] < $pivot) {
            $l[] = $input[$i];
        } elseif ($input[$i] > $pivot) {
            $r[] = $input[$i];
        }
    }
    return array_merge($l, array($pivot), $r);
}

/*
$t = fgets(STDIN);
$string = fgets(STDIN);

echo implode(' ', partition(explode(' ', $string)));

function  partition( $input)
{
    $pivot = $input[0];
    $l = $r = array();
    for ($i = 0; $i < count($input); $i++) {
        if ($input[$i] < $pivot) {
            $l[] = $input[$i];
        } elseif ($input[$i] > $pivot) {
            $r[] = $input[$i];
        }
    }
    return array_merge($l, array($pivot), $r);
}
*/