<?php

class Node
{

    public $info;
    public $left;
    public $right;
    public $hd; // horizontal distance

    public function __construct($info)
    {
        $this->info     = $info;
        $this->left     = null;
        $this->right    = null;
        $this->hd       = 0;
    }

    public function __toString()
    {
        return "$this->info";
    }

}

$root = new Node(5);
$root->left = new Node(4);
$root->right = new Node(3);
$root->left->left = new Node(6);
$root->left->right = new Node(7);
$root->right->left = new Node(8);
$root->right->right = new Node(9);

function bfs(Node $node)
{
    $queue          = array($node);
    $node->hd       = 0;
    $output         = array();

    while (count($queue) > 0) {
        $current_node = array_shift($queue);
        $output[$current_node->hd][] = $current_node->info;

        if ($current_node->left != null) {
            $current_node->left->hd = $current_node->hd + 1;
            array_push($queue, $current_node->left);
        }

        if ($current_node->right != NULL) {
            $current_node->right->hd = $current_node->hd - 1;
            array_push($queue, $current_node->right);
        }
    }
    return $output;

}

$result = bfs($root);
$keys = array_keys($result);
arsort($keys);
foreach ($keys as $key) {
    echo implode(' ', $result[$key]), "\n";
}
