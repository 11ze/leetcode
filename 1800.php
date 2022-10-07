<?php

// 1800. 最大升序子数组和
// https://leetcode.cn/problems/maximum-ascending-subarray-sum/

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    public function maxAscendingSum($nums)
    {
        $max = 0;

        $currentSum = 0;

        $prev = 0;

        foreach ($nums as $num) {
            if ($num <= $prev) {
                if ($max < $currentSum) {
                    $max = $currentSum;
                }
                $currentSum = 0;
            }

            $currentSum += $num;
            $prev = $num;
        }

        if ($max < $currentSum) {
            $max = $currentSum;
        }

        return $max;
    }
}

$obj = new Solution();

echo '</br>';
$nums = [10, 20, 30, 5, 10, 50];
var_export($obj->maxAscendingSum($nums)); // 65

echo '</br>';
$nums = [10, 20, 30, 40, 50];
var_export($obj->maxAscendingSum($nums)); // 150

echo '</br>';
$nums = [12, 17, 15, 13, 10, 11, 12];
var_export($obj->maxAscendingSum($nums)); // 33

echo '</br>';
$nums = [100, 10, 1];
var_export($obj->maxAscendingSum($nums)); // 100

echo '</br>';
$nums = [3, 6, 10, 1, 8, 9, 9, 8, 9];
var_export($obj->maxAscendingSum($nums)); // 19
