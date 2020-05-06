// https://leetcode.com/problems/minimum-size-subarray-sum/

/*
Given an array of n positive integers and a positive integer s, find the minimal length of a contiguous subarray of which the sum ≥ s. If there isn't one, return 0 instead.

Example: 

Input: s = 7, nums = [2,3,1,2,4,3]
Output: 2
Explanation: the subarray [4,3] has the minimal length under the problem constraint.
Follow up:
If you have figured out the O(n) solution, try coding another solution of which the time complexity is O(n log n). 
*/

// 2 pointers techniq

class Solution {
    public int minSubArrayLen(int s, int[] nums) {
       int left = 0;
		int right = 0;

		int sum = 0;
		int ans = Integer.MAX_VALUE;
		while (left < nums.length) {

			if (sum >= s) {
				ans = Math.min(ans, right - left);
				sum = sum - nums[left];
				left++;
			} else if (right < nums.length) {
				sum = sum + nums[right];
				right++;
			} else {
				left++;
			}

		}

		return ans == Integer.MAX_VALUE ? 0 : ans;
    }
}
