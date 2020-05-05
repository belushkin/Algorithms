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