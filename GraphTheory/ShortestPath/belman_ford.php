<?php

define('INFINITY', 10000000);

class edge {
    public $u;
    public $v;
    public $w;
}

$matrix = array(
    0 => array( 0,  7,  0,  0,  0),
    1 => array( 0,  0,  7,  1,  0),
    2 => array( -8,  0,  0,  7,  0),
    3 => array( 0,  0,  0,  0,  7),
    4 => array( 0,  0,  0,  0,  0),
);

$len        = count($matrix);
$dist       = array();
$k          = 0;
$edges      = array();
for ($i = 0; $i < $len; $i++) {
    for ($j = 0; $j < $len; $j++) {
        if ($matrix[$i][$j] != 0) {
            $edge = new edge();
            $edge->u = $i;
            $edge->v = $j;
            $edge->w = $matrix[$i][$j];
            $edges[$k] = $edge;
            $k++;
        }
    }
}
$edgesCount = $k;

function bellman_ford($edges, &$dist, $start)
{
    global $len, $edgesCount;

    for ($i = 0; $i < $len; $i++) {
        $dist[$i] = INFINITY;
    }
    $dist[$start] = 0;

    for ($i = 0; $i < $len - 1; $i++) {
        for ($j = 0; $j < $edgesCount; $j++) {
            if ($dist[$edges[$j]->u] + $edges[$j]->w < $dist[$edges[$j]->v]) {
                $dist[$edges[$j]->v] = $dist[$edges[$j]->u] + $edges[$j]->w;
            }
        }
    }

    for ($i = 0; $i < $len - 1; $i++) {
        for ($j = 0; $j < $edgesCount; $j++) {
            if ($dist[$edges[$j]->u] + $edges[$j]->w < $dist[$edges[$j]->v]) {
                echo "Graph contains a negative-weight cycle\n";
                return false;
            }
        }
    }
}

bellman_ford($edges, $dist, 0);
print_r($dist);
