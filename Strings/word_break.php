<?php

// Naive solution

//$string = 'programcreek';
//$dict   = array('programcree', 'program', 'creek');
//
//function word_break($string, $dict, $start)
//{
//    if ($start == strlen($string)) {
//        return true;
//    }
//
//    foreach ($dict as $item) {
//        $end = $start + strlen($item);
//        if (substr($string, $start, $end) == $item) {
//            return word_break($string, $dict, $end);
//        }
//    }
//
//    return false;
//}

//$count = count($dict);
//array_unshift($dict, 0);
//for ($i = 0; $i < $count; $i++) {
//    array_shift($dict);
//    var_dump(word_break($string, $dict, 0));
//}


// Dynamic programming solution

//$string = 'leetcode';
//$dict   = array('leet', 'code');

$string = 'programcreek';
$dict   = array('programcree', 'program', 'creek');

function word_break($string, $dict)
{
    $result = array();
    $end   = 0;
    for ($i = 0; $i < strlen($string); $i++) {
        if ($i < $end) {
            continue;
        }
        foreach ($dict as $item) {
            $len = strlen($item);
            $t = $i + $len;
            if ($t > strlen($string)) {
                continue;
            }
            if (substr($string, $i, $t) == $item) {
                echo $item, "\n";
                $result[] = 1;
                $end = $t;
            }
        }
    }
    return $result;
}

print_r(word_break($string, $dict));
