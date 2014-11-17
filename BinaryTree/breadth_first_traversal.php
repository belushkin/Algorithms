<?php

/**
 * Breadth-First Traversal of a Binary Tree in PHP
 * by Adrian Statescu <adrian@thinkphp.ro>
 * MIT Style License
 */
class Node
{

    public $info;
    public $left;
    public $right;
    public $level;

    public function __construct($info)
    {

        $this->info = $info;
        $this->left = NULL;
        $this->right = NULL;
        $this->level = NULL;
    }

    public function __toString()
    {
        return "$this->info";
    }
}

function BFS($node)
{
    $node->level = 1;

    $queue = array($node);

    $current_level = $node->level;

    $output = array();

    while (count($queue) > 0) {

        $current_node = array_shift($queue);

        if ($current_node->level > $current_level) {
            $current_level++;
            array_push($output, "\n");
        }

        array_push($output, $current_node->info . " ");

        if ($current_node->left != NULL) {
            $current_node->left->level = $current_level + 1;
            array_push($queue, $current_node->left);
        }

        if ($current_node->right != NULL) {
            $current_node->right->level = $current_level + 1;
            array_push($queue, $current_node->right);
        }
    }

    return join("", $output);
}

/*
           9                  9
         2   4         =>     2 4
       1  3 5  7              1 3 5 7

 */
$root = new Node(9);
$root->left = new Node(2);
$root->right = new Node(4);
$root->left->left = new Node(1);
$root->left->right = new Node(3);
$root->right->left = new Node(5);
$root->right->right = new Node(7);
echo BFS($root);
