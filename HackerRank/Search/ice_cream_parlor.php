<?php

$inputFile = fopen("ice_cream_parlor.txt", "r") or die("Unable to open file!");

$data = array();
while (!feof($inputFile)) {
    $data[] = fgets($inputFile);
}
fclose($inputFile);

for ($i = 1; $i <= $data[0]*3; $i++) {
    if ($i % 3 == 0) {
        echo ice_cream_parlor(trim($data[$i-2]), explode(" ", trim($data[$i]))), "\n";
    }
}

function ice_cream_parlor($amount, $input)
{
    for ($i = 0; $i < count($input); $i++) {
        $result     = array();
        $t          = $amount - $input[$i];
        $result[]   = $i + 1;
        if ($t > 0 && in_array($t, $input)) {
            for ($j = 0; $j < count($input); $j++) {
                if ($input[$j] == $t && $j != $i) {
                    $result[] = $j + 1;
                    return implode(' ', $result);
                }
            }
        }
    }
    return false;
}