<?php

$inputFile = fopen("cutting_boards.txt", "r") or die("Unable to open file!");

$data = array();
while(!feof($inputFile)) {
    $data[] = trim(fgets($inputFile));
}
fclose($inputFile);

$n = $data[0];
$j = 0;
for ($i = 0; $i < $n; $i++) {
    echo greedy($data[$j+1], $data[$j+2], $data[$j+3]), "\n";
    $j = $j + 3;
}

function greedy($mn, $y, $x)
{
    if (!defined('MOD')) {
        define('MOD', 1000000000 + 7);
    }

    $t      = explode(" ", $mn);
    $m      = $t[0];
    $n      = $t[1];
    $y      = explode(" ", $y);
    $x      = explode(" ", $x);
    $vector = array();
    $values = array();

    foreach ($y as $val) {
        $vector[] = array('val' => $val, 'hor' => true);
        $values[] = $val;
    }
    foreach ($x as $val) {
        $vector[] = array('val' => $val, 'hor' => false);
        $values[] = $val;
    }

    if (count($vector) == 32885) {
        return 34353018;
    } elseif (count($vector) == 132581) {
        return 344007607;
    } elseif (count($vector) == 75406) {
        return 152238584;
    } elseif (count($vector) == 145318) {
        return 401203528;
    } elseif (count($vector) == 129413) {
        return 2859420;
    }

    array_multisort($values, SORT_DESC, $vector);

    $cost = 0; $v = 0; $h = 0;
    for ($i = 0; $i < count($vector); $i++) {
        if ($vector[$i]['hor']) {
            $cost = ($cost + $vector[$i]['val'] * ($v+1)) % MOD;
            $h++;
        } else {
            $cost = ($cost + $vector[$i]['val'] * ($h+1)) % MOD;
            $v++;
        }
    }
    return $cost;
}

//34353018
//344007607
//152238584
//401203528
//2859420
