// https://leetcode.com/problems/median-of-two-sorted-arrays/

/*

There are two sorted arrays nums1 and nums2 of size m and n respectively.

Find the median of the two sorted arrays. The overall run time complexity should be O(log (m+n)).

You may assume nums1 and nums2 cannot be both empty.

Example 1:

nums1 = [1, 3]
nums2 = [2]

The median is 2.0
Example 2:

nums1 = [1, 2]
nums2 = [3, 4]

The median is (2 + 3)/2 = 2.5
*/

class Solution {
public double findMedianSortedArrays(int[] n1, int[] n2) {

    int[] list = new int[n1.length + n2.length];
    
    for(int i=0,m=0,k=0 ; i<list.length ; i++)
    {
        if(i < n1.length)
        {
            list[i] = n1[m];
            ++m;
            continue;
        }
        else
        {
            list[i] = n2[k];
            ++k;
        }
    }
    Arrays.sort(list);      //Sorting the array
    double median;
    if(list.length % 2 == 0)
    {
        int a = list[list.length / 2];             
        int b = list[(list.length / 2) - 1];
        median = a  + b;
        median = median / 2;
    }
    else
    {
        median = list[list.length / 2];
    }
    return median;
}
}
