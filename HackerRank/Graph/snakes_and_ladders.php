<?php

$inputFile = fopen("snakes_and_ladders.txt", "r") or die("Unable to open file!");

$data = array();
while (!feof($inputFile)) {
    $data[] = fgets($inputFile);
}
fclose($inputFile);

class vertex
{
    public $key         = null;
    public $visited     = 0;
    public $distance    = 1000000;  // infinite
    public $parent      = null;
    public $path        = null;

    public function __construct($key)
    {
        $this->key  = $key;
    }
}

class PriorityQueue extends SplPriorityQueue
{
    public function compare($a, $b)
    {
        if ($a === $b) return 0;
        return $a > $b ? -1 : 1;
    }
}

$i = 0;
$j = 2;
$g = build_graph();
initial_fill_graph($g);

while ($i < $data[0]) {
    $t          = $g;
    $min        = array();
    $ladders    =  explode(" ", $data[$j]);
    $snakes     =  explode(" ", $data[$j+1]);
    foreach ($ladders as $k => $v) {
        $min[] = get_result($t, array_slice($ladders, $k), $snakes);
    }
    echo min($min), "\n";
    $j = $j + 3;
    $i++;
}

function get_result($t, $ladders, $snakes)
{
    fill_graph($t, $ladders);
    fill_graph($t, $snakes);

    $len        = count($t);
    $vertices   = array();
    for ($k = 0; $k < $len; $k++) {
        $vertices[$k] = new vertex($k);
    }
    $adjacencyList = array();
    for ($u = 0; $u < $len; $u++) {
        $list = new SplDoublyLinkedList();
        for ($v = 0; $v < $len; $v++) {
            if ($t[$u][$v] != 0) {
                $list->push(array('vertex' => $vertices[$v], 'distance' => $t[$u][$v]));
            }
        }
        $list->rewind();
        $adjacencyList[] = $list;
    }
    calcShortestPaths($vertices[0], $adjacencyList);
    $path = end($vertices)->path;
    $result = $p = 0;
    for ($n = 0; $n < count($path); $n++) {
        $p++;
        if ((@$path[$n+1] - $path[$n]) != 1) {
            $result = $result + ceil(($p - 1)/ 6);
            $p = 0;
        }
    }

    //echo "[" . implode(', ', $path) . "]\n\n";
    return $result;
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
    $ls = array();
    foreach ($range as $key => $value) {
        $t = explode(',', $value);
        $ls[trim($t[0])] = trim($t[1]);
    }
    foreach ($ls as $k => $v) {
        $graph[$k-1][$v-1] = 1;
    }
}

function calcShortestPaths(vertex $start, &$adjLists)
{
    // define an empty queue
    $q = new PriorityQueue();
    // push the starting vertex into the queue
    $q->insert($start, 0);
    $q->rewind();
    // mark the distance to it 0
    $start->distance = 0;
    // the path to the starting vertex
    $start->path = array($start->key);
    while ($q->valid()) {
        $t = $q->extract();
        $t->visited = 1;
        $l = $adjLists[$t->key];
        while ($l->valid()) {
            $item = $l->current();
            if (!$item['vertex']->visited) {
                if ($item['vertex']->distance > $t->distance + $item['distance']) {
                    $item['vertex']->distance = $t->distance + $item['distance'];
                    $item['vertex']->parent = $t;
                }
                $item['vertex']->path = array_merge($t->path, array($item['vertex']->key));
                $q->insert($item["vertex"], $item["vertex"]->distance);
            }
            $l->next();
        }
        $q->recoverFromCorruption();
        $q->rewind();
    }
}


//3
//3,7
//32,62 42,68 12,98
//95,13 97,25 93,37 79,27 75,19 49,47 67,17
//5,8
//32,62 44,66 22,58 34,60 2,90
//85,7 63,31 87,13 75,11 89,33 57,5 71,15 55,25
//4,9
//8,52 6,80 26,42 2,72
//51,19 39,11 37,29 81,3 59,5 79,23 53,7 43,33 77,21

//3
//3
//5

//3
//1,4
//22,54
//79,17 67,7 89,25 69,23
//14,11
//28,64 24,98 14,76 4,56 54,92 18,90 20,68 46,84 8,80 48,88 44,60 26,96 52,66 34,72
//61,43 87,3 95,33 69,27 71,19 57,47 81,39 73,5 89,45 97,13 99,37
//5,7
//42,96 44,84 8,74 12,70 18,78
//61,11 99,15 91,43 75,45 93,33 67,9 59,51

//12
//5
//7

//8
//11,5
//8,80 32,76 40,92 12,78 22,68 42,94 44,58 52,74 26,98 2,60 24,88
//81,53 71,47 73,11 63,29 75,27
//6,3
//24,72 30,56 20,46 14,96 26,84 4,40
//95,19 55,27 47,29
//5,12
//26,90 44,92 34,80 46,94 18,82
//75,11 95,31 67,3 77,41 81,19 73,17 65,37 83,51 79,35 91,13 89,23 59,9
//10,11
//2,86 34,58 30,92 10,82 16,62 28,52 12,96 26,90 18,98 4,46
//43,5 53,23 67,21 55,27 71,37 57,35 45,39 69,7 81,29 49,25 79,31
//9,11
//2,52 28,76 50,98 16,78 46,64 24,92 6,54 26,68 40,86
//99,39 91,47 87,49 95,27 53,31 59,5 73,7 63,43 51,15 75,29 89,19
//14,4
//10,58 22,64 4,82 24,72 32,96 20,86 48,94 38,84 16,60 56,68 50,62 26,88 44,80 12,70
//93,9 85,35 59,57 91,41
//11,11
//48,68 12,98 54,88 30,62 22,96 20,80 8,84 52,78 34,66 2,72 46,64
//93,3 85,47 67,43 91,27 59,45 73,25 57,11 63,23 83,37 75,29 79,19
//13,9
//4,96 12,94 36,88 10,72 28,56 6,76 14,70 18,52 38,92 26,68 30,82 8,48 24,98
//91,7 63,9 65,11 97,15 49,25 73,17 89,27 59,39 53,3

//6
//4
//6
//3
//6
//4
//3
//2