<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function threeSum($nums) {
        sort($nums);
        $plus  = [];
        $minus = [];

        for ($i = 0; $i < count($nums); $i++) {
            if ($nums[$i] >= 0) {
                $plus[] = $nums[$i];
            } else {
                $minus[] = $nums[$i];
            }
        }

        $result = [];
        if (count($plus) >= 3 && (($plus[0]+$plus[1]+$plus[2]) == 0)) {
            $result[] = [0,0,0];
        }

        $first = $second = $third = [];
        for ($i = 0; $i < count($plus); $i++) { // go over plus
            for ($j = 0; $j < count($minus); $j++) { // go over minus
                $absent = $plus[$i] + $minus[$j];
                if ($absent >= 0) {
                    $absent = 0 - $absent;
                } else {
                    $absent = -$absent;
                }

    //            echo "minus: ", $plus[$i], " ", $minus[$j], " ", $absent, "\n";
                if ($absent >= 0) {
                    $t          = $plus[$i];
                    $plus[$i]   = 999999999999999999999;

                    if (in_array($absent, $plus)) {
                        $plus[$i]   = $t;
                        $before = [$minus[$j], $absent, $plus[$i]];
                        if (isset($result[implode('_', [$minus[$j], $plus[$i], $absent])])) continue;
                        if (isset($result[implode('_', [$absent, $minus[$j], $plus[$i]])])) continue;
                        $result[implode('_', $before)] = $before;
                    }
                    $plus[$i]   = $t;
                } else {
                    $t          = $minus[$j];
                    $minus[$j]  = 999999999999999999999;

                    if (in_array($absent, $minus)) {
                        $minus[$j] = $t;
                        $before = [$minus[$j], $absent, $plus[$i]];
                        if (isset($result[implode('_', [$minus[$j], $plus[$i], $absent])])) continue;
                        if (isset($result[implode('_', [$absent, $minus[$j], $plus[$i]])])) continue;
                        $result[implode('_', $before)] = $before;
                    }
                    $minus[$j] = $t;
                }
            }
        }

        return array_values($result);
    }
}

