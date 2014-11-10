<?php

$a = array(1, 6, 3, 8, 2, 5, 4);

function heapify(&$a, &$i, &$heap_size)
{
    $l = $i*2 + 1;
    $r = $i*2 + 2;

    if ($l < $heap_size && $a[$i] < $a[$l]) {
        $largest = $l;
    } else {
        $largest = $i;
    }

    if ($r < $heap_size && $a[$largest] < $a[$r]) {
        $largest = $r;
    }

    if ($largest != $i) {
        $t = $a[$i];
        $a[$i] = $a[$largest];
        $a[$largest] = $t;

        heapify($a, $largest, $heap_size);
    }
}

function build_heap(&$a, &$heap_size)
{
    $len = floor($heap_size / 2);
    for ($i = $len; $i > -1; $i--) {
        heapify($a, $i, $heap_size);
    }
}

function heapsort(&$a)
{
    $heap_size = count($a);
    build_heap($a, $heap_size);

    while ($heap_size--) {
        $t = $a[$heap_size];
        $a[$heap_size] = $a[0];
        $a[0] = $t;
        build_heap($a, $heap_size);
    }
}

// 1 2 3 4 5 6 8
heapsort($a);
print_r($a);

