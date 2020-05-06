<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s) {
    $len = min(strlen($s), 195);
    if (empty($s)) return 0;
    for ($i = $len; $i > 0; $i--) { // goes down from the length
        $amount = $len - $i + 1;
        //echo "\n", $i, " ", $amount, "\n";
        for ($j = 0; $j < $amount; $j++) { // amount of frames
            $str = substr($s, $j, $i);

            $res = array_flip(str_split($str));
//            print_r($res);
            if (count($res) == strlen($str)) {
//                echo "\n", $str, "\n";
                return count($res);
            }
        }
    }
    }
}