<?php

//$inputFile = fopen("ciel_map.txt", "r") or die("Unable to open file!");
//
//$data = array();
//while (!feof($inputFile)) {
//    $data[] = fgets($inputFile);
//}
//fclose($inputFile);
//
//$points = array();
//for ($i = 2; $i < count($data); $i++) {
//    $points[] = trim($data[$i]);
//}


$t = fgets(STDIN);
while (--$t >=0 ) {
    $n = fgets(STDIN);
    $points = array();
    for ($i = 0; $i < $n; $i++) {
        $points[] = trim(fgets(STDIN));
    }
    echo long_distance($points);
}

function long_distance($points = array()) {
    if (count($points) == 4) {
        $max   = 0;
        for ($i = 0; $i < 4; $i++) {
            if ($i == 3) {
                $point1 = $i;
                $point2 = 0;
            } else {
                $point1 = $i;
                $point2 = $i+1;
            }

            $start = explode(' ', $points[$point1]);
            $end = explode(' ', $points[$point2]);

            $res = sqrt(pow(($start[0] - $end[0]),2) + pow(($start[1] - $end[1]),2));
            $max = max($res, $max);
        }

    } else {
        $max   = 0;
        for ($i = 0; $i < count($points); $i++) {
            for ($j = $i+1; $j < count($points); $j++) {
                $start = explode(' ', $points[$i]);
                $end = explode(' ', $points[$j]);

                $res = sqrt(pow(($start[0] - $end[0]),2) + pow(($start[1] - $end[1]),2));
                $max = max($res, $max);
            }
        }
    }
    return $max;
}

