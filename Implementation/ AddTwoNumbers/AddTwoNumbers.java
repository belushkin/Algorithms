/**
 * Definition for singly-linked list.
 * public class ListNode {
 *     int val;
 *     ListNode next;
 *     ListNode(int x) { val = x; }
 * }
 */

// https://leetcode.com/problems/add-two-numbers/
/*
You are given two non-empty linked lists representing two non-negative integers. The digits are stored in reverse order and each of their nodes contain a single digit. Add the two numbers and return it as a linked list.

You may assume the two numbers do not contain any leading zero, except the number 0 itself.

Example:

Input: (2 -> 4 -> 3) + (5 -> 6 -> 4)
Output: 7 -> 0 -> 8
Explanation: 342 + 465 = 807.
*/

class Solution {
    public ListNode addTwoNumbers(ListNode l1, ListNode l2) {
        ListNode result = new ListNode(-1);
        ListNode main_result = result;
        int carry = 0;
        while(l1 != null || l2 != null){
            int sum = carry + (l1 != null ? l1.val : 0) + (l2 != null ? l2.val : 0); 
            carry = (sum >= 10) ? 1 : 0;
            sum = sum%10;
            result.next = new ListNode(sum);
            if(l1 != null){
                l1 = l1.next;
            }
            if(l2 != null){
                l2 = l2.next;
            }
            result = result.next;
        }
        if(carry > 0){
            result.next = new ListNode(carry);
        }
        return main_result.next;
    }

}
