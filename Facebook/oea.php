<?php

//Implement method oneEditApart that return boolean:
//    true, if using one operations (insert or remove or replace) we can modify one string to get another.
//False otherwise.
//
//// Signature:
//boolean oneEditApart(String s1, String s2)
//    // Allowing operations
//    insert
//    remove
//    replace
//
//    Example:
//
//    oea("cat", "cut") => true // replace "u" -> "a"
//    oea("cat", "cuts") => false // no operations
//    oea("ca", "ca") => false // no operations
//    oea("cats", "cat") => true // remove "s"
//    oea("cat", "at") => true // insert "c"
//    oea("cat", "cbat") => true // remove "b"

// cbat cat
function oea($str1, $str2)
{
    if ($str1 == $str2) {
        return false;
    }

    $length1 = strlen($str1);
    $length2 = strlen($str2);

    if ($length2 > $length1) {
        return oea($str2, $str1);
    }

    $theSame = false;
    if ($length1 == $length2) {
        $theSame = true;
    }
    $i = 0;
    $bubble = null;
    while ($i < $length1) {
        if ($str1[$i] != @$str2[$i]) {
            if (!is_null($bubble)) {
                return false;
            }
            if (!$theSame) {
                $bubble = $str1[$i];
                $str1 = substr($str1, 0, $i) . substr($str1, $i + 1);
                $length1 = strlen($str1);
                continue;
            }
            $bubble = true;
        }
        $i++;
    }
    return true;
}

var_dump(oea('cat', 'cut'));
var_dump(oea('cat', 'cuts'));
var_dump(oea('ca', 'ca'));
var_dump(oea('cats', 'cat'));
var_dump(oea('cat', 'at'));
var_dump(oea('cat', 'cbat'));
