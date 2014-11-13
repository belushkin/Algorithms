<?php

quicksort(array(5,8,1,3,7,9,2));


function quicksort($input)
{
    if (empty($input)) {
        return $input;
    }
    $pivot = $input[0];
    $l = $r = array();
    for ($i = 1; $i < count($input); $i++) {
        if ($input[$i] < $pivot) {
            $l[] = $input[$i];
        } else {
            $r[] = $input[$i];
        }
    }

    $merged = array_merge(quicksort($l), array($pivot), quicksort($r));
    if (count($merged) > 1) {
        echo implode(' ', $merged), "\n";
    }
    return $merged;
}

/*
$t = fgets(STDIN);
$string = fgets(STDIN);

quicksort(explode(' ', $string));

function quicksort($input)
{
    if (empty($input)) {
        return $input;
    }
    $pivot = $input[0];
    $l = $r = array();
    for ($i = 1; $i < count($input); $i++) {
        if ($input[$i] < $pivot) {
            $l[] = $input[$i];
        } else {
            $r[] = $input[$i];
        }
    }

    $merged = array_merge(quicksort($l), array($pivot), quicksort($r));
    if (count($merged) > 1) {
        echo implode(' ', $merged), "\n";
    }
    return $merged;
}
*/