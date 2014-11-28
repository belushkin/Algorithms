<?php

$inputFile = fopen("even_tree.txt", "r") or die("Unable to open file!");

$data = array();
while (!feof($inputFile)) {
    $data[] = fgets($inputFile);
}
fclose($inputFile);

$t  = explode(' ', trim($data[0]));
$n  = $t[0];
$m  = $t[1];

$g = array();
for ($i = 0; $i < $n; $i++) {
    for ($j = 0; $j < $n; $j++) {
        $g[$i][$j] = 0;
    }
}
foreach ($data as $key => $value) {
    if ($key == 0) {
        continue;
    }
    $vertex = explode(' ', trim($value));
    $g[$vertex[0]-1][$vertex[1]-1] = 1;
    $g[$vertex[1]-1][$vertex[0]-1] = 1;
}

function pre_order($graph, $start, &$visited)
{
    $result = array();
    $visited[$start] = 1;
    foreach ($graph[$start] as $key => $vertex) {
        if (!$visited[$key] && $vertex == 1) {
            $visited[$key] = 1;
            $result[$key] =  pre_order($graph, $key, $visited, $result);
        }
    }
    return $result;
}

function getChildren($tree)
{
    $children = 1;
    if(!is_null($tree)) {
        foreach($tree as $node) {
            $children = $children + getChildren($node);
        }
    }
    return $children;
}

function getNumberOfTrees($tree)
{
    $result = 0;
    foreach ($tree as $value) {
        if ((getChildren($value)) % 2 == 0)  {
            $result++;
        }
        $result = $result + getNumberOfTrees($value);
    }
    return $result;
}

$visited = array();
foreach ($g as $key => $vertex) {
    $visited[$key] = 0;
}
$orderedTree = pre_order($g, 0, $visited);
echo getNumberOfTrees($orderedTree);


// 2
//10 9
//2 1
//3 1
//4 3
//5 2
//6 1
//7 2
//8 6
//9 8
//10 8

// 4
//20 19
//2 1
//3 1
//4 3
//5 2
//6 5
//7 1
//8 1
//9 2
//10 7
//11 10
//12 3
//13 7
//14 8
//15 12
//16 6
//17 6
//18 10
//19 1
//20 8

//11
//30 29
//2 1
//3 2
//4 3
//5 2
//6 4
//7 4
//8 1
//9 5
//10 4
//11 4
//12 8
//13 2
//14 2
//15 8
//16 10
//17 1
//18 17
//19 18
//20 4
//21 15
//22 20
//23 2
//24 12
//25 21
//26 17
//27 5
//28 27
//29 4
//30 25
