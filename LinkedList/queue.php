<?php

// Using Linked list we implemented queue LILO

class Node {

    public $item;
    public $next;
}

class Queue {

    private $first = null;
    private $last = null;

    public function isEmpty() {
        return $this->first == null;
    }

    public function enqueue ($item) {
        $oldlast = $this->last;
        $this->last = new Node();
        $this->last->item = $item;
        $this->last->next = null;

        if ($this->isEmpty()) {
            $this->first = $this->last;
        } else {
            $oldlast->next = $this->last;
        }
    }

    public function dequeue() {
        $item = $this->first->item;
        $this->first = $this->first->next;
        if ($this->isEmpty()) {
            $this->last = null;
        }
        return $item;
    }

}

$list = new Queue();
$list->enqueue(1);
$list->enqueue(2);
$list->enqueue(3);

echo $list->dequeue();
echo $list->dequeue();
echo $list->dequeue();
