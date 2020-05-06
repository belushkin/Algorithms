/*
The idea is to make use of a set which will help us in maintaing a window of unique elements and we take two pointers and we check if the value of the 
character at right pointer exists in the array we remove the left pointers character from the set as it won't be helping us to calculate the longest 
substring between these two pointers. The answer is basically the maximum number of elements in the set.
*/

// two pointers techniq, sliding window

public int lengthOfLongestSubstring(String s) {
        if(s.length() == 0) return 0;
        HashSet<Character> set = new HashSet<>();
        int left = 0 , right = 0 , ans = 0;
        while(left < s.length() && right < s.length()){
            if(!set.contains(s.charAt(right))){
                set.add(s.charAt(right++));
                ans = Math.max(ans,right - left);
            }else{
                set.remove(s.charAt(left++));
            }
        }
        return ans;
    }
