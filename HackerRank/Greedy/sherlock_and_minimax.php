<?php

$inputFile = fopen("sherlock_and_minimax.txt", "r") or die("Unable to open file!");

$data = array();
while(!feof($inputFile)) {
    $data[] = trim(fgets($inputFile));
}
fclose($inputFile);

echo greedy($data[0], $data[1], $data[2]), "\n";

function greedy($n, $a, $pq)
{
    $t = explode(" ", $pq);
    $p = $t[0];
    $q = $t[1];
    $a = explode(" ", $a);
    $result = array();

    if ($n != 1) {
        sort($a);

        for ($i = 0; $i < $n - 1; $i++) {
            $diff = $a[$i+1] - $a[$i];

            $val = $a[$i] + $diff / 2;
            if (valid($p, $q, $val)) {
                $result[] = $val;
            }

            $val = $a[$i+1] - $diff / 2;
            if (valid($p, $q, $val)) {
                $result[] = $val;
            }
        }

        $result[] = $p;
        $result[] = $q;
        sort($result);

        $sz = count($result);
        $best = -1;
        $bestval = 0;

        for ($i=0; $i < $sz; $i++) {
            $val = 2147483647;
            for ($j = 0; $j < $n; $j++) {
                if (abs($a[$j] - $result[$i]) < $val) {
                    $val = abs($a[$j] - $result[$i]);
                }
            }
            if ($val > $best) {
                $best = $val;
                $bestval = $result[$i];
            }
        }
        return $bestval;
    }

    $val1 = abs($a[0] - $p);
    $val2 = abs($a[0] - $q);
    return ($val1 >= $val2) ? $p : $q;
}

function valid($p, $q, $val)
{
    if ($p <= $val && $val <= $q) {
        return true;
    }
    return false;
}



//6.5

//3
//5 8 14
//4 9

//69

//5
//38 50 60 30 48
//23 69
