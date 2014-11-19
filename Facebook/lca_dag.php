<?php

$dag = array(
    array(0, 1, 1, 0, 0, 0, 0),
    array(0, 0, 0, 1, 0, 0, 0),
    array(0, 0, 0, 0, 1, 0, 0),
    array(0, 0, 0, 0, 1, 0, 0),
    array(0, 0, 0, 0, 0, 0, 1),
    array(0, 0, 0, 0, 0, 0, 1),
    array(0, 0, 0, 0, 0, 0, 0),
);

function bfs(&$graph, $start, $visited)
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

function init(&$visited, &$graph)
{
    foreach ($graph as $key => $vertex) {
        $visited[$key] = 0;
    }
}

$visited = array();
init($visited, $dag);
bfs($dag,4,$visited);