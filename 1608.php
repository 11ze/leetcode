<?php

class Solution
{

    /**
     * 1608. 特殊数组的特征值
     * https://leetcode.cn/problems/special-array-with-x-elements-greater-than-or-equal-x/
     * @param Integer[] $nums
     * @return Integer
     */
    public function specialArray($nums)
    {
        rsort($nums);
        $len = count($nums);

        // 因为是非负整数数组，所以从 1 开始
        for ($i = 1; $i < $len + 1; $i++) {
            if (
                // 至少要有 $i 个数大于等于 $i
                $nums[$i - 1] >= $i
                // 检查剩余条件
                // 1：$i === $len 刚好数组末尾
                // 2：否则，下一个数不能大于 $i
                 && ($i === $len || $nums[$i] < $i)
            ) {
                return $i;
            }
        }

        return -1;
    }
}
