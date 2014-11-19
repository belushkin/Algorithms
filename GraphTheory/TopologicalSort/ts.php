<?php

class G
{
    protected $_g = array(
        array(0, 1, 1, 0, 0, 0, 0),
        array(0, 0, 0, 1, 0, 0, 0),
        array(0, 0, 0, 0, 1, 0, 0),
        array(0, 0, 0, 0, 1, 0, 0),
        array(0, 0, 0, 0, 0, 0, 1),
        array(0, 0, 0, 0, 0, 0, 1),
        array(0, 0, 0, 0, 0, 0, 0),
    );
    protected $_list = array();
    protected $_ts   = array();
    protected $_len  = null;

    public function __construct()
    {
        $this->_len = count($this->_g);

        // finds the vertices with no predecessors
        $sum = 0;
        for ($i = 0; $i < $this->_len; $i++) {
            for ($j = 0; $j < $this->_len; $j++) {
                $sum += $this->_g[$j][$i];
            }

            if (!$sum) {
                // append to list
                array_push($this->_list, $i);
            }
            $sum = 0;
        }
    }

    public function topologicalSort()
    {
        while ($this->_list) {
            $t = array_shift($this->_list);
            array_push($this->_ts, $t);

            foreach ($this->_g[$t] as $key => $vertex) {
                if ($vertex == 1) {
                    $this->_g[$t][$key] = 0;

                    $sum = 0;
                    for ($i = 0; $i < $this->_len; $i++) {
                        $sum += $this->_g[$i][$key];
                    }

                    if (!$sum) {
                        array_push($this->_list, $key);
                    }
                }
                $sum = 0;
            }
        }

        print_r($this->_ts);
    }
}

$g = new G();
/*
Array
(
    [0] => 0
    [1] => 5
    [2] => 1
    [3] => 2
    [4] => 3
    [5] => 4
    [6] => 6
)*/
$g->topologicalSort();