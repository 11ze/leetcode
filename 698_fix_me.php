<?php

// 698. 划分为k个相等的子集
// https://leetcode.cn/problems/partition-to-k-equal-sum-subsets/

// 没做出来，看了题解
// 提交时运行超时，待优化

class Solution
{

    private $used = []; // indexOfNums => boolean

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Boolean
     */
    public function canPartitionKSubsets($nums, $k)
    {
        if (count($nums) < $k) {
            return false;
        }

        $sum = array_sum($nums);
        if ($sum % $k !== 0) {
            return false;
        }

        $per = $sum / $k;

        sort($nums);

        if ($nums[count($nums) - 1] > $per) {
            return false;
        }

        return $this->backtrack($nums, $k, $per, 0, 0);
    }

    private function backtrack($nums, $k, $per, $startedAtNums, $currentSize)
    {
        if ($k === 0) {
            return true;
        }

        if ($currentSize === $per) {
            return $this->backtrack($nums, $k - 1, $per, 0, 0);
        }

        for ($i = $startedAtNums; $i < count($nums); $i++) {
            if ($this->used[$i] ?? false) {
                continue;
            }

            if ($nums[$i] + $currentSize > $per) {
                continue;
            }

            $this->used[$i] = true;
            $currentSize += $nums[$i];

            if ($this->backtrack($nums, $k, $per, $i + 1, $currentSize)) {
                return true;
            }

            $this->used[$i] = false;
            $currentSize -= $nums[$i];
        }

        return false;
    }
}
