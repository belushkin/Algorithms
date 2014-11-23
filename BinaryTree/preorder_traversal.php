<?php

/*
Preorder binary tree traversal is a classic interview problem about trees.
The key to solve this problem is to understand the following:

    What is preorder? (parent node is processed before its children)
    Use Stack from Java Core library

It is not obvious what preorder for some strange cases. However, if you draw a stack and manually execute the program,
how each element is pushed and popped is obvious.

The key to solve this problem is using a stack to store left and right children,
and push right child first so that it is processed after the left child.
*/

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

$t = new Tree('F');
$n1 = new Tree('B');
$n2 = new Tree('G');
$n3 = new Tree('A');
$n4 = new Tree('D');
$n5 = new Tree('C');
$n6 = new Tree('E');
$n7 = new Tree('I');
$n8 = new Tree('H');

$t->insert($n1);
$t->insert($n2);
$t->insert($n3);
$t->insert($n4);
$t->insert($n5);
$t->insert($n6);
$t->insert($n7);
$t->insert($n8);

function preorder($tree) {
    if (!$tree->left && !$tree->right) {
        return $tree;
    }

    if ($tree->left) {
        echo $tree->left->key, " ";
        preorder($tree->left);
    }

    if ($tree->right) {
        echo $tree->right->key, " ";
        preorder($tree->right);
    }
}

echo "preorder\n";
echo "F ";
preorder($t);
//echo "\npostorder\n";
//$traversal = postorder($t);
//echo implode(' ', $traversal);
//echo "\ninorder\n";
//$traversal = inorder($t);
//echo implode(' ', $traversal), "\n";
