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

function oea($str1, $str2)
{
    if (strlen($str1) > strlen($str2)) {
        $str = preg_replace("/[$str2]/", '', "$str1");
    } else {
        $str = preg_replace("/[$str1]/", '', "$str2");
    }

    if (strlen($str) == 1) {
        return true;
    }
    return false;
}

var_dump(oea('cat', 'cut'));
var_dump(oea('cat', 'cuts'));
var_dump(oea('ca', 'ca'));
var_dump(oea('cats', 'cat'));
var_dump(oea('cat', 'at'));
var_dump(oea('cat', 'cbat'));
