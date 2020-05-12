// https://leetcode.com/problems/two-city-scheduling/submissions/
/*
There are 2N people a company is planning to interview. The cost of flying the i-th person to city A is costs[i][0], and the cost of flying the i-th person to city B is costs[i][1].

Return the minimum cost to fly every person to a city such that exactly N people arrive in each city.
*/
class Solution {
    public int twoCitySchedCost(int[][] costs) {
        Arrays.sort(costs, Comparator.comparingInt(ints -> (ints[0] - ints[1])));
        int res = 0;
        for (int i = 0; i <costs.length; i++) {
            if (i < costs.length/2) {
                res += costs[i][0];
            } else {
                res += costs[i][1];
            }
        }
        return res;
    }
}