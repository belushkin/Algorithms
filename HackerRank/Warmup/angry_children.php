<?php

$inputFile = fopen("angry_children.txt", "r") or die("Unable to open file!");

$data = array();
while(!feof($inputFile)) {
    $data[] = trim(fgets($inputFile));
}
fclose($inputFile);

echo angry_children($data[1], array_slice($data,2)), "\n";

function angry_children($step, Array $data)
{
    $result = array();
    $count  = count($data);
    sort($data);
    for ($i = 0; $i < $count - $step + 1; $i++) {
        $result[] = $data[$step+$i-1] - $data[$i];
    }
    return min($result);
}

//9665150