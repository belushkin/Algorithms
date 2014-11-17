<?php

class Tree
{
    public $node = null;
    public $id = null;
    public $parent = null;
    public $children = array();

    public function __construct($node, $id = null)
    {
        $this->node = $node;
        $this->id = $id;
    }

    public function addChild(Node &$n)
    {
        $n->parent = $this;
        $this->children[] = $n;
    }

    /**
     * Returns an element by its id
     *
     * @param mixed $id
     * @return Node
     */
    public function search($id)
    {
        if ($this->id == $id) {
            return $this;
        }

        $a = false;

        // search all the children starting from the left-most
        foreach ($this->children as $child) {
            $a = $child->search($id);
        }

        return $a;
    }

    /**
     * Finds a path from the root to the
     * item and returns it as a list
     *
     * @param mixed $id
     * @return array
     */
    public function find_path($id, &$path)
    {
        array_push($path, $this->id);

        if ($this->id == $id) {
            return 1;
        }

        foreach ($this->children as $child) {
            if (1 == $child->find_path($id, $path)) return 1;
            array_pop($path);
        }
    }

    public function __toString()
    {
        return $this->node . ' ' . $this->id . "\n";
    }
}

$dom = new Tree('DOM', 'ROOT');

$body = new Tree('BODY', 1);
$div1 = new Tree('DIV', 'div-1');
$div2 = new Tree('DIV', 'my-id');

$a = new Tree("A", 'some-link');

$dom->addChild($body);
$body->addChild($div1);
$body->addChild($div2);
$div2->addChild($a);

$path1 = $path2 = array();
$dom->find_path('div-1', $path1);
$dom->find_path('some-link', $path2);
