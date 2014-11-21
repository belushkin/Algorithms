<?php
/*
Given two words (start and end), and a dictionary, find the length of shortest transformation sequence from start to end,
such that:

Only one letter can be changed at a time
Each intermediate word must exist in the dictionary
For example,

    Given:
    start = "hit"
end = "cog"
dict = ["hot","dot","dog","lot","log"]
As one shortest transformation is "hit" -> "hot" -> "dot" -> "dog" -> "cog",
return its length 5.

Note:
Return 0 if there is no such transformation sequence.
All words have the same length.
All words contain only lowercase alphabetic characters.
*/

$start  = 'hit';
$end    = 'cog';
$dict   = array('hot', 'dog', 'lot', 'dot', 'log');

function isMatch($str1, $str2) {
    $result = 0;
    for ($i=0; $i<strlen($str1); $i++) {
        if ($str1[$i] != $str2[$i]) {
            $result++;
        }
    }
    return ($result == 1) ? true : false;
}

function ladderLength($start, $end, $dict) {
    $visited = array($start);
    for ($i = 0; $i < count($dict); $i++) {
        foreach($dict as $key => $value) {
            if (isMatch($start, $value) && !in_array($value, $visited)) {
                $visited[] = $value;
                $start = $value;
                if (isMatch($start, $end)) {
                    $visited[] = $end;
                    return $visited;
                }
            }
        }
    }
    return $visited;
}

print_r(ladderLength($start, $end, $dict));
