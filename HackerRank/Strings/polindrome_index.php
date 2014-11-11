<?php

$inputFile = fopen("polindrome.txt", "r") or die("Unable to open file!");

$data = array();
while(!feof($inputFile)) {
    $data[] = fgets($inputFile);
}
fclose($inputFile);

for ($i = 1; $i < count($data); $i++) {
    echo reverse(trim($data[$i])) . "\n";
    exit();
}


function polindrome($str)
{
    if ($str == "") {
        return 0;
    }
    if (reverse($str) == $str) {
        return -1;
    }

    for ($i = 0; $i < strlen($str); $i++) {
        $chars = str_split($str);
        unset($chars[$i]);
        $substr = implode($chars,'');
        if (reverse($substr) == $substr) {
            return $i;
        }
    }
}

// http://eddmann.com/posts/reversing-a-string-in-php/
function reverse($str)
{
    if (strlen($str) < 2) {
        return $str;
    }

    $mid = (int) strlen($str) / 2;
    $lft = substr($str, 0, $mid);
    $rgt = substr($str, $mid);

    return reverse($rgt) . reverse($lft);
}

//function reverse($str)
//{
//    if (strlen($str) < 2) {
//        return $str;
//    }
//    return reverse(substr($str, 1)) . $str[0];
//}

//function isPolindrome($str)
//{
//    for ($k = 0, $j = strlen($str)-1; $k < strlen($str), $j > 0; $k++, $j--) {
//        if ($str[$k] != $str[$j]) {
//            return false;
//        }
//    }
//    return true;
//}

