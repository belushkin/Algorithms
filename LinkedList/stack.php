<?php

// Using Linked list we implemented stack LIFO

class Node {

    public $item;
    public $next;
}

class Stack {

    private $first = null;

    public function isEmpty() {
        return $this->first == null;
    }

    public function push ($item) {
        $oldfirst = $this->first;
        $this->first = new Node();
        $this->first->item = $item;
        $this->first->next = $oldfirst;
    }

    public function pop() {
        $item = $this->first->item;
        $this->first = $this->first->next;
        return $item;
    }

}

$list = new Stack();
$list->push(1);
$list->push(2);
$list->push(3);

echo $list->pop();
echo $list->pop();
echo $list->pop();
