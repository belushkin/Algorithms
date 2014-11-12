<?php

$inputFile = fopen("anagram.txt", "r") or die("Unable to open file!");

$data = array();
while (!feof($inputFile)) {
    $data[] = fgets($inputFile);
}
fclose($inputFile);

for ($i = 1; $i < count($data); $i++) {
    echo anagram(trim($data[$i])) . "\n";
}

function anagram($word)
{
    $len        = strlen($word);
    $until      = ($len / 2);

    if ($len % 2 == 1) {
        return -1;
    }
    $str1 = substr($word, 0, $until);
    $str2 = substr($word, $until);

    $result = 0;
    for ($i = 0; $i < strlen($str1); $i++) {
        $index = strpos($str2, $str1[$i]);
        if ($index === false) {
            $result++;
        } else {
            $str2[$index] = null;
        }
    }
    return $result;
}
