<?php
/*
The problem:

    Given a singly linked list L: L0→L1→ ... →Ln-1→Ln,
    reorder it to: L0→Ln→L1→Ln-1→L2→Ln-2→...

For example, given {1,2,3,4,5}, reorder it to {1,5,2,4,3}. You must do this in-place without altering the nodes' values.

This problem is not straightforward, because it requires "in-place" operations.
That means we can only change their pointers, not creating a new list.
*/

class Node
{

    public $info;
    public $next;

    public function __construct($info)
    {
        $this->info = $info;
    }
}

$node = new Node(1);
$node->next = new Node(2);
$node->next->next = new Node(3);
$node->next->next->next = new Node(4);
$node->next->next->next->next = new Node(5);
$node->next->next->next->next->next = new Node(6);
$node->next->next->next->next->next->next = new Node(7);
$node->next->next->next->next->next->next->next = new Node(8);
$node->next->next->next->next->next->next->next->next = new Node(9);
$node->next->next->next->next->next->next->next->next->next = new Node(10);


out($node);
insertAfter($node, 0, list_count($node));
reverseSecondPart($node);
out($node);

function out($node) {
    while($node) {
        echo $node->info, " -> ";
        $node = $node->next;
    }
    echo "\n";
}

function reverseSecondPart($list) {
    $count = list_count($list);
    $start = 2;
    for ($i = $count; $i > 3; $i--) {
        insertAfter($list, $start, $count);
        $start++;
    }
}

function insertAfter($list, $leftIndex, $nodeIndex) {
    $left   = get($list, $leftIndex);
    $right  = get($list, $leftIndex+1);
    $node   = get($list, $nodeIndex);
    $last   = get($list, $nodeIndex-1);
    $node->next = $right;
    $left->next = $node;
    $last->next = null;
}

function list_count($node) {
    $i = 0;
    while($node) {
        if ($node->next) {
            $i++;
        }
        $node = $node->next;
    }
    return $i;
}

function get($node, $index) {
    $i = 0;
    while($node) {
        if ($i == $index) {
            return $node;
        }
        $node = $node->next;
        $i++;
    }
    return false;
}
