<?php

class Solution {

    /**
     * @param String $s
     * @return String
     */
    function longestPalindrome($s) {
        $reverse = strrev($s);
    $palindromes = [];
    if ($s == strrev($s)) return $s;
    for ($i = 0; $i < strlen($s); $i++) {
        for ($j = 1; $j <= strlen($s); $j++) {
            $str = substr($s, $i, $j);
            if (strpos($reverse, $str) !== false) { // && $str == strrev($str)  && $str[0] == $str[strlen($str)-1]
                // echo $str, "\n";
                if ($str[0] == $str[strlen($str)-1]) {
                    $palindromes[strlen($str)] = $str;
                }
            } else {
                break;
            }
        }
    }
    ksort($palindromes);
    // print_r($palindromes);
    while ($element = array_pop($palindromes)) {
        if ($element == strrev($element)) return $element;
    }
    return ""; 
    }
}