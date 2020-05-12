<?php

class Solution {

    /**
     * @param Integer[] $A
     * @return Integer
     */
    function minIncrementForUnique($A) {
        if (empty($A)) {
            return 0;
        }

        $diff = 0;
        $duplicates = array_unique( array_diff_assoc( $A, array_unique( $A ) ) );
        $count      = array_count_values($A);
        $B          = array_flip($A);

        foreach ($duplicates as $value) {
            if ($count[$value] > 2) {
                $fill = array_fill(0, $count[$value] - 2, $value);
                $duplicates = array_merge($duplicates, $fill);
            }
        }

        sort($duplicates);
        $max = 0;
        foreach ($duplicates as $item) {
            while (isset($B[$item])) {
                if ($item < $max) {
                    $diff = $diff + ($max - $item);
                    $item = $item + ($max - $item);
                    continue;
                }
                $diff++;
                $item++;
            }
            $B[$item] = 0;
            $max = $item;
        }
        return $diff;
    }
}