<?php

$inputFile = fopen("snakes_and_ladders.txt", "r") or die("Unable to open file!");

$data = array();
while (!feof($inputFile)) {
    $data[] = fgets($inputFile);
}
fclose($inputFile);

define('INFINITY', 10000000);

$i = 0;
$j = 2;
$g = build_graph();
initial_fill_graph($g);
$len = count($g);

while ($i < $data[0]) {
    $dist       = array();
    $t          = $g;
    $ladders    =  $data[$j];
    $snakes     =  $data[$j+1];
    //fill_ladders($t, explode(" ", $ladders));
    //fill_snakes($t, explode(" ", $snakes));

    print_r(dijkstra($t, 0, 99));
    exit();
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

//function fill_graph(&$graph = array(), $range = array())
//{
//    foreach ($range as $key => $value) {
//        $t = explode(',', $value);
//        foreach ($graph[$t[0]-1] as $key => $value) {
//            $graph[$t[0]-1][$key] = 0;
//        }
//        $graph[$t[0]-1][$t[1]-1] = 1;
//    }
//}

function fill_snakes(&$graph = array(), $range = array())
{
    $snakes = array();
    foreach ($range as $key => $value) {
        $t = explode(',', $value);
        $snakes[trim($t[0])] = trim($t[1]);
    }

    asort($snakes);
    $weight = -1;
    foreach ($snakes as $k => $v) {
        foreach ($graph[$k-1] as $key => $value) {
            $graph[$k-1][$key] = 0;
        }
        $graph[$k-1][$v-1] = $weight;
        $weight--;
    }
}

function fill_ladders(&$graph = array(), $range = array())
{
    $ladders = array();
    foreach ($range as $key => $value) {
        $t = explode(',', $value);
        $ladders[trim($t[0])] = trim($t[1]);
    }

    asort($ladders);
    $weight = 1;
    foreach ($ladders as $k => $v) {
        foreach ($graph[$k-1] as $key => $value) {
            $graph[$k-1][$key] = 0;
        }
        $graph[$k-1][$v-1] = $weight;
        $weight++;
    }
}

function dijkstra( array $g, $start, $end = null )
{
    $d = array();
    $p = array();
    $q = array( 0 => $start );

    foreach( $q as $v )
    {
        $d[$v] = $q[$v];
        if( $v == $end )
            break;

        foreach( $g[$v] as $w )
        {
            $vw = $d[$v] + $g[$v][$w];

            if( in_array( $w, $d ))
            {
                if( $vw < $d[$w]) {
                    throw new Exception('Dijkstra: found better path to already-final vertex');
                }

            }
            elseif( $vw < $q[$w] )
            {
                $q[$w] = $vw;
                $p[$w] = $v;
            }
        }

        return array( $d, $p );
    }
}
