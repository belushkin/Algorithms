<?php

$inputFile = fopen("snakes_and_ladders.txt", "r") or die("Unable to open file!");

$data = array();
while (!feof($inputFile)) {
    $data[] = fgets($inputFile);
}
fclose($inputFile);

$i = 0;
$j = 2;
$g = build_graph();
initial_fill_graph($g);

while ($i < $data[0]) {
    $t = $g;
    $ladders    =  $data[$j];
    $snakes     =  $data[$j+1];
    fill_graph($t, explode(" ", $ladders));
    fill_graph($t, explode(" ", $snakes));
    $bg = $t;
    $list = find_vertices($t);
    $ts = topological_sort($t, $list);
    $distance = shortest_path($bg,$ts);
//    print_r($distance);
    $j = $j + 3;
    $i++;
}

function build_graph()
{
    $g = array();
    for ($i = 0; $i < 100; $i++) {
        for ($j = 0; $j < 100; $j++) {
            $g[$i][$j] = 0;
        }
    }
    return $g;
}

function initial_fill_graph(&$graph = array())
{
    $range = array_combine(range(0,99),range(1,100));
    foreach ($range as $key => $value) {
        if ($value != 100) {
            $graph[$key][$value] = 1;
        }
    }
}

function fill_graph(&$graph = array(), $range = array())
{
    foreach ($range as $key => $value) {
        $t = explode(',', $value);
        foreach ($graph[$t[0]-1] as $key => $value) {
            $graph[$t[0]-1][$key] = 0;
        }
        $graph[$t[0]-1][$t[1]-1] = 1;
    }
}

function find_vertices($g = array())
{
    $list   = array();
    $len    = count($g);

    // finds the vertices with no predecessors
    $sum = 0;
    for ($i = 0; $i < $len; $i++) {
        for ($j = 0; $j < $len; $j++) {
            $sum += $g[$j][$i];
        }

        if (!$sum) {
            // append to list
            array_push($list, $i);
        }
        $sum = 0;
    }
    return $list;
}

function topological_sort($g = array(), $list = array())
{
    $ts     = array();
    $len    = count($g);

    while ($list) {
        $t = array_shift($list);
        array_push($ts, $t);

        foreach ($g[$t] as $key => $vertex) {
            if ($vertex == 1) {
                $g[$t][$key] = 0;

                $sum = 0;
                for ($i = 0; $i < $len; $i++) {
                    $sum += $g[$i][$key];
                }

                if (!$sum) {
                    array_push($list, $key);
                }
            }
            $sum = 0;
        }
    }
    return $ts;
}

function shortest_path($g, $ts)
{
    $distance = array();
    foreach ($ts as $key => $value) {
        if ($key == 0) {
            $distance[$value] = 0;
        } else {
            $distance[$value] = 10000000;
        }
    }

    foreach ($ts as $i) {
        foreach ($g[$i] as $key => $vertex) { // $this->_g[$i] => u, v = $vertex
            if ($vertex != 0 && $distance[$key] > $distance[$i] + $vertex) {
                $distance[$key] = $distance[$i] + $vertex;
            }
        }
    }
    return $distance;
}
