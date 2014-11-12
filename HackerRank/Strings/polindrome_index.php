<?php

$inputFile = fopen("polindrome.txt", "r") or die("Unable to open file!");

$data = array();
while (!feof($inputFile)) {
    $data[] = fgets($inputFile);
}
fclose($inputFile);

for ($i = 1; $i < count($data); $i++) {
    echo palindrome(trim($data[$i]));
}

function palindrome($word)
{
    $len = strlen($word);
    $until = $len/2 - 1;
    $is_pal = true;

    for($i=0; $i<$until; ++$i)
    {
        if($word[$i]!=$word[$len-$i-1])
        {
            $is_pal=false;
            if($word[$len-$i-1]==$word[$i+1] && $word[$len-$i-2]==$word[$i+2])
            {
                echo $i;
                break;
            }

            else if($word[$i]==$word[$len-$i-2] && $word[$i+1]==$word[$len-$i-3])
            {
                echo ($len-$i-1);
                break;
            }
        }
    }

    if($is_pal)
        echo "-1";

}
