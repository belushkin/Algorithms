<?php

$notation   = '12 2 3 4 * 10 5 / + * +';
$stack      = array();
$exploded   = explode(' ', $notation);

while (!empty($exploded)) {
    $element = array_shift($exploded);
    if (is_numeric($element)) {
        array_unshift($stack, $element);
    } else {
        $first  = array_shift($stack);
        $second = array_shift($stack);

        eval('$result = ' . "$first $element $second;");
        array_unshift($stack, $result);
    }
    print_r($stack);
}
