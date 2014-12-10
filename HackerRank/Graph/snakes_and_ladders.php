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

$len        = count($g);

while ($i < $data[0]) {
    $t          = $g;
    $vertexes   = 1;
    $ladders    =  $data[$j];
    $snakes     =  $data[$j+1];
    fill_graph($t, explode(" ", $ladders));
    fill_graph($t, explode(" ", $snakes));

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
    echo "[" . implode(", ", end($vertices)->path) . "] \n";
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
