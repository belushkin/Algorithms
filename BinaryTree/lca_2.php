<?php

class Tree
{
    public $key;

    public $parent = null;
    public $left = null;
    public $right = null;

    public function __construct($key)
    {
        $this->key = $key;
    }

    public function insert(Tree $n)
    {
        if ($this->key < $n->key) {
            if ($this->right == null) {
                // insert
                $this->right = $n;
                $n->parent = $this;
            } else {
                $this->right->insert($n);
            }
        }
        if ($this->key > $n->key) {
            if ($this->left == null) {
                // insert
                $this->left = $n;
                $n->parent = $this;
            } else {
                $this->left->insert($n);
            }
        }
    }
}

$t = new Tree(10);

$n1 = new Tree(20);
$n2 = new Tree(5);
$n3 = new Tree(7);
$n4 = new Tree(13);

$t->insert($n1);
$t->insert($n2);
$t->insert($n3);

function find_common($node1, $node2, $tree)
{
    if ($node1->key < $tree->key && $node2->key > $tree->key) {
        return $tree;
    } else if ($node1->key < $tree->key && $node2->key < $tree->key) {
        find_common($node1, $node2, $tree->left);
    } else if ($node1->key > $tree->key && $node2->key > $tree->key) {
        find_common($node1, $node2, $tree->right);
    }
}

$node = find_common($n3, $n4, $t);