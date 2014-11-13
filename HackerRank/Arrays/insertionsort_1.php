<?php

//insertionsort(array(1,3,5,9,13,22,27,35,46,51,55,83,87,23));
insertionsort(array(2,3,4,5,6,7,8,10,9,11));


function insertionsort(array $input)
{
    $t = $input[count($input) - 1];
    for ($i = count($input) - 1; $i >= 0; $i-- ) {
        if ($input[$i-1] > $t) {
            $input[$i] = $input[$i-1];
            echo implode(' ', $input) . "\n";
        } else {
            $input[$i] = $t;
            echo implode(' ', $input) . "\n";
            break;
        }
    }
}

/*
$t = fgets(STDIN);
$string = fgets(STDIN);

insertionsort(explode(' ', $string));

function insertionsort(array $input)
{
    $t = $input[count($input) - 1];
    for ($i = count($input) - 1; $i > 0; $i-- ) {
        if ($input[$i-1] > $t) {
           $input[$i] = $input[$i-1];
        } else {
           $input[$i] = $t;
        }
        echo implode(' ', $input) . "\n";
    }
}
*/