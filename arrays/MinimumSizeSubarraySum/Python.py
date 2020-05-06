class Solution:
    def minSubArrayLen(self, s: int, nums: List[int]) -> int:

        if not len(nums):
            return 0

        i = 0
        j = 1
        res = nums[i]
        m = 10000000000000
        
        while i < len(nums):
            
            while res < s and j < len(nums):
                
                res += nums[j]
                j += 1

            if res < s:
                if m == 10000000000000:
                    return 0
                return m

            m = min(m, j-i)

            res -= nums[i]
            i += 1

            # print('i', i)
            # print('j', j)
            # print('m', m)

        return m
