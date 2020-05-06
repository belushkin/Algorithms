</php

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */

class Solution {

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2) {
        $v1 = $this->traverse($l1);
        $v2 = $this->traverse($l2);

        $max = max(count($v1), count($v2));

        if (count($v1) > count($v2)) {
            $result = $v1;
        } elseif (count($v2) > count($v1)) {
            $result = $v2;
        } else {
            $result = [];
        }


        $inc = 0;
        for ($i = 0; $i<$max; $i++) {

            $sum = @(int)$v1[$i] + @(int)$v2[$i] + $inc;

            if ($sum < 10) {
               $result[$i] = $sum;
               $inc = 0;
            } else {
                $result[$i] = $sum % 10;
                $inc = 1;
            }
            
            if (($i == $max-1) && $inc == 1) {
                $result[] = 1;
            }
        }

        $res = new ListNode($result[0]);
        $temp =& $res;
        for ($i = 1; $i < count($result); $i++) {
            $temp->next = new ListNode($result[$i]);
            $temp =& $temp->next;
        }
        return $res;
        
    }
    
    function traverse($l1, $acc = [])
    {
        $acc[] = $l1->val;
        if (empty($l1->next)) {
            return $acc;
        }
        return $this->traverse($l1->next, $acc);
    }
}