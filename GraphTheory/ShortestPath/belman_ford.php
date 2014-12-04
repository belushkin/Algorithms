<?php

define('INFINITY', 10000000);

define('INFINITY', 10000000);

$len = count($matrix);

$dist = array();

function BellmanFord(&$matrix, &$dist, $start)
{
    global $len;

    foreach (array_keys($matrix) as $vertex) {
        $dist[$vertex] = INFINITY;
        if ($vertex == $start) {
            $dist[$vertex] = 0;
        }
    }

    for ($k = 0; $k < $len - 1; $k++) {
        for ($i = 0; $i < $len; $i++) {
            for ($j = 0; $j < $len; $j++) {
                if ($dist[$i] > $dist[$j] + $matrix[$j][$i]) {
                    $dist[$i] = $dist[$j] + $matrix[$j][$i];
                }
            }
        }
    }

    for ($i = 0; $i < $len; $i++) {
        for ($j = 0; $j < $len; $j++) {
            if ($dist[$i] > $dist[$j] + $matrix[$j][$i]) {
                echo 'The graph contains a negative cycle!';
            }
        }
    }
}

BellmanFord($matrix, $dist, 0);

// [0, 2, 4]
print_r($dist);