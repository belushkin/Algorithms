class Solution {
    public int minSubArrayLen(int s, int[] nums) {
        if (nums.length == 0) {
            return 0;
        }
        int m = Integer.MAX_VALUE;
        
        for (int i = 1; i < nums.length; i++) {
            if (nums[i] >= s) {
                m = 1;
            }
            nums[i] += nums[i-1];
        }

        if (nums[0] >= s || m == 1) {
            return 1;
        } else if (nums[nums.length-1] < s) {
            return 0;
        } else {
            for (int i = nums.length-1; i >= 0; i--) {
                if (nums[i] < s) {
                    break;
                } else if (m == 1) {
                    break;
                }
                m = Math.min(m, i+1);

                for (int j = 0; j < i; j++) {
                    if (nums[i] - nums[j] >= s) {
                        m = Math.min(m, i - j);
                    } else {
                        break;
                    }
                }
            }
            return m;
        }
    }
}