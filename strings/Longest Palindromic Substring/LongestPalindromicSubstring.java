/*
https://leetcode.com/problems/longest-palindromic-substring/

Given a string s, find the longest palindromic substring in s. You may assume that the maximum length of s is 1000.

Example 1:

Input: "babad"
Output: "bab"
Note: "aba" is also a valid answer.
Example 2:

Input: "cbbd"
Output: "bb"

*/

// Dynamic Programming

/*
dp[i][j] is true if s[i..j] is a palindrome. So if we know dp[i+1][j-1] to be true that is s[i+1..j-1] is a palindrome and we know s[i] == s[j], 
then we can extend it by adding s[i] at the front and s[j] at the back.
Maintain max such string seen so far. Also, current cell depends on next row, prev col, 
we need to scan from bottom-up and right-left.
*/

public String longestPalindrome(String s) {
    if(s.length() == 0) return s;
    int n = s.length();
    String str = "";
    boolean[][] dp = new boolean[n][n];
    
    for(int i=n-1; i >= 0; i--){
        for(int j=i; j < n; j++){
            if(s.charAt(i) == s.charAt(j) && (i+1 > j-1 || dp[i+1][j-1] == true) ) {
                if(str.length() < (j-i+1))
                    str = s.substring(i, j+1);
                dp[i][j] = true;
            }
        }
    }
    return str;
}
