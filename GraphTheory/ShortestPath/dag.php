<?php

class G
{
    protected $_g = array(
        array(0, 2, 3, 0, 0, 0),
        array(0, 0, 4, 0, 5, 0),
        array(0, 0, 0, 6, 7, 0),
        array(0, 0, 0, 0, 0, 8),
        array(0, 0, 0, 0, 0, 9),
        array(0, 0, 0, 0, 0, 0)
    );
    protected $_list = array();
    protected $_ts   = array();
    protected $_len  = null;
    protected $_bg   = null;

    public function __construct()
    {
        $this->_len = count($this->_g);
        $this->_bg  = $this->_g;

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
                if ($vertex > 0) {
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
    }

    public function shortestPath()
    {
        $distance = array();
        foreach ($this->_ts as $key => $value) {
            if ($key == 0) {
                $distance[$value] = 0;
            } else {
                $distance[$value] = 10000000;
            }
        }

        foreach ($this->_ts as $i) {
            foreach ($this->_bg[$i] as $key => $vertex) { // $this->_g[$i] => u, v = $vertex
                if ($vertex != 0 && $distance[$key] > $distance[$i] + $vertex) {
                    $distance[$key] = $distance[$i] + $vertex;
                }
            }
        }
    }
}
$g = new G();
/*
Array
(
    [0] => 0
    [2] => 1
    [3] => 2
    [4] => 3
    [5] => 4
    [6] => 5
)*/
$g->topologicalSort();
$g->shortestPath();