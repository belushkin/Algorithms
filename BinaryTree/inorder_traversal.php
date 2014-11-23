<?php

function inorder($t) {
    $stack  = new SplStack();
    $result = array();
    $p      = $t;

    while($stack->valid() || $p) {
        if ($p) {
            $stack->push($p);
            $stack->rewind();
            $p = $p->left;
        } else {
            $t = $stack->pop();
            $result[] = $t->key;
            $stack->rewind();
            $p = $t->right;
        }
    }

    return $result;
}