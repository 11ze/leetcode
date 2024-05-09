<?php

// 506. Relative Ranks
// https://leetcode.com/problems/relative-ranks/description

class Solution
{

    /**
     * @param Integer[] $score
     * @return String[]
     */
    function findRelativeRanks($score)
    {
        $sortedScore = [];

        $snapshot = $score;

        sort($score);
        $score = array_reverse($score);

        foreach ($score as $key => $value) {
            if ($key === 0) {
                $sortedScore[$value] = 'Gold Medal';
                continue;
            }
            if ($key === 1) {
                $sortedScore[$value] = 'Silver Medal';
                continue;
            }
            if ($key === 2) {
                $sortedScore[$value] = 'Bronze Medal';
                continue;
            }
            $sortedScore[$value] = (string)($key + 1);
        }

        $result = [];
        foreach ($snapshot as $key => $value) {
            $result[$key] = $sortedScore[$value];
        }

        return $result;
    }
}

$solution = new Solution();

// Test case 1
$score = [5, 4, 3, 2, 1];
$result = $solution->findRelativeRanks($score);
var_export($result); // ["Gold Medal","Silver Medal","Bronze Medal","4","5"]

// Test case 2
$score = [10, 3, 8, 9, 4];
$result = $solution->findRelativeRanks($score);
var_export($result); // ["Gold Medal","5","Bronze Medal","Silver Medal","4"]
