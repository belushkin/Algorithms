<?php

$g = array(
    0 => array(0, 1, 1, 0, 0, 0),
    1 => array(1, 0, 0, 1, 0, 0),
    2 => array(1, 0, 0, 1, 0, 0),
    3 => array(0, 1, 1, 0, 1, 0),
    4 => array(0, 0, 0, 1, 0, 1),
    5 => array(0, 0, 0, 0, 1, 0),
);

function init(&$visited, &$graph)
{
    foreach ($graph as $key => $vertex) {
        $visited[$key] = 0;
    }
}

function breadth_first(&$graph, $start, $visited)
{
    // create an empty queue
    $q = array();

    // initially enqueue only the starting vertex
    array_push($q, $start);
    $visited[$start] = 1;
    echo $start . "\n";

    while (count($q)) {
        $t = array_shift($q);

        foreach ($graph[$t] as $key => $vertex) {
            if (!$visited[$key] && $vertex == 1) {
                $visited[$key] = 1;
                array_push($q, $key);
                echo $key . "\t";
            }
        }
        echo "\n";
    }
}

$visited = array();
init($visited, $g);
breadth_first($g, 2, $visited);