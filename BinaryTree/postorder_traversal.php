<?php

// PSEUDO CODE
function postorder($tree) {
    $lst = array();

    if (!$tree) {
        return $lst;
    }

    $stack = new SplStack();
    $stack->push($tree);
    $stack->rewind();

    $prev = null;
    while($stack->valid()) {
        $curr = $stack->current();
        // go down the tree.
        //check if current node is leaf, if so, process it and pop stack,
        //otherwise, keep going down
        if (!$prev || @$prev->left->key == @$curr->key || @$prev->right->key == @$curr->key) {
            //prev == null is the situation for the root node
            if ($curr->left) {
                $stack->push($curr->left);
                $stack->rewind();
            } else if ($curr->right) {
                $stack->push($curr->right);
                $stack->rewind();
            } else {
                $stack->pop();
                $stack->rewind();
                $lst[] = $curr->key;
            }

            //go up the tree from left node
            //need to check if there is a right child
            //if yes, push it to stack
            //otherwise, process parent and pop stack
        } else if (@$curr->left->key == @$prev->key) {
            if (@$curr->right->key) {
                $stack->push($curr->right);
                $stack->rewind();
            } else {
                $stack->pop();
                $stack->rewind();
                $lst[] = $curr->key;
            }
        } else if (@$curr->right->key == @$prev->key) {
            $stack->pop();
            $stack->rewind();
            $lst[] = $curr->key;
        }
        $prev = $curr;
    }
    return $lst;
}