<?php

// http://eddmann.com/posts/reversing-a-string-in-php/
function reverse($str)
{
    if (strlen($str) < 2) {
        return $str;
    }

    $mid = (int)strlen($str) / 2;
    $lft = substr($str, 0, $mid);
    $rgt = substr($str, $mid);

    return reverse($rgt) . reverse($lft);
}