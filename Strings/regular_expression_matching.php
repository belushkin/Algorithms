<?php

/*
'.' Matches any single character.
'*' Matches zero or more of the preceding element.

The matching should cover the entire input string (not partial).

The function prototype should be:
bool isMatch(const char *s, const char *p)

Some examples:
isMatch("aa","a") return false
isMatch("aa","aa") return true
isMatch("aaa","aa") return false
isMatch("aa", "a*") return true
isMatch("aa", ".*") return true
isMatch("ab", ".*") return true
isMatch("aab", "c*a*b") return true
*/

function isMatch($s, $p)
{
    if ($s == $p) {
        return true;
    }
    if (empty($p)) {
        return ($s == '');
    }
    if (@$p[1] != '*') {
        return (($s[0] == $p[0]) || ($p[0] == '.' && isset($s[0]))) && isMatch(substr($s,1), substr($p,1));
    }
    $i = 0;
    while((@$s[$i] == $p[0]) || ($p[0] == '.' && isset($s[$i]))) {
        if (isMatch($s, substr($p,2))) {
            return true;
        }
        $i++;
    }
    return isMatch(substr($s, $i), substr($p,2));
}

var_dump(isMatch("aa", "a")); // false
var_dump(isMatch("aa", "aa")); // true
var_dump(isMatch("aa", "ab")); // false
var_dump(isMatch("aa", "aaaaa")); // false
var_dump(isMatch("aaa", "aa")); // false
var_dump(isMatch("aaaaa", "a*")); //true
var_dump(isMatch("aaaaa", ".*")); //true
var_dump(isMatch("ab", ".*")); //true
var_dump(isMatch("aab", "c*a*b*")); //true
var_dump(isMatch("a", ".")); //true
var_dump(isMatch("ab", ".b")); //true
