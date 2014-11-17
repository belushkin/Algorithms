<?php

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

$v0 = new vertex(0);
$v1 = new vertex(1);
$v2 = new vertex(2);
$v3 = new vertex(3);
$v4 = new vertex(4);
$v5 = new vertex(5);

$list0 = new SplDoublyLinkedList();
$list0->push(array('vertex' => $v1, 'distance' => 3));
$list0->push(array('vertex' => $v3, 'distance' => 1));
$list0->rewind();

$list1 = new SplDoublyLinkedList();
$list1->push(array('vertex' => $v0, 'distance' => 3));
$list1->push(array('vertex' => $v2, 'distance' => 7));
$list1->rewind();

$list2 = new SplDoublyLinkedList();
$list2->push(array('vertex' => $v1, 'distance' => 7));
$list2->push(array('vertex' => $v3, 'distance' => 8));
$list2->push(array('vertex' => $v4, 'distance' => 12));
$list2->rewind();

$list3 = new SplDoublyLinkedList();
$list3->push(array('vertex' => $v0, 'distance' => 1));
$list3->push(array('vertex' => $v2, 'distance' => 8));
$list3->rewind();

$list4 = new SplDoublyLinkedList();
$list4->push(array('vertex' => $v2, 'distance' => 12));
$list4->push(array('vertex' => $v5, 'distance' => 3));
$list4->rewind();

$list5 = new SplDoublyLinkedList();
$list5->push(array('vertex' => $v4, 'distance' => 3));
$list5->rewind();

$adjacencyList = array(
    $list0,
    $list1,
    $list2,
    $list3,
    $list4,
    $list5,
);

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

calcShortestPaths($v0, $adjacencyList);

// The path from node 0 to node 5
// [0, 1, 2, 4, 5]
echo '[' . implode(', ', $v5->path) . ']';