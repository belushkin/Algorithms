<?php
class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    function findMedianSortedArrays($nums1, $nums2) {
        $result = [];
    if (count($nums1) == 0) {
        $result = $nums1;
    }
    if (count($nums2) == 0) {
        $result = $nums2;
    }

    $a = $b = [];
    if ($nums1[0] > $nums2[0]) {
        $a = $nums2;
        $b = $nums1;
    } elseif($nums1[0] == $nums2[0]) {
        if (count($nums1) > count($nums2)) {
            $a = $nums1;
            $b = $nums2;
        } else {
            $a = $nums2;
            $b = $nums1;
        }
    } else {
        $a = $nums1;
        $b = $nums2;
    }

    $j = 0;
    if($b[0] >= $a[count($a)-1]) {
        $result = array_merge($a, $b);
    }
//    print_r($a);
//    print_r($b);

    if (empty($result)) {
        $result[] = $a[0];
        for ($i = 1; $i < count($a); $i++) {
            while (isset($b[$j]) && $b[$j] <= $a[$i]) {
                $result[] = $b[$j];
                $j++;
            }
            echo $a[$i], "\n";
            $result[] = $a[$i];
        }
    }
    if ($j > -0)
        $result = array_merge($result, array_slice($b, $j));


    $count = count($result);
    $midd = floor(($count-1)/2);

    if($count % 2) { // odd number, middle is the median
        $median = $result[$midd];
    } else { // even number, calculate avg of 2 medians
        $low = $result[$midd];
        $high = $result[$midd+1];
        $median = (($low+$high)/2);
    }
//    print_r($result);
    return $median;
    }
}
