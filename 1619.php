<?php

// 1619. 删除某些元素后的数组均值
// https://leetcode.cn/problems/mean-of-array-after-removing-some-elements/

class Solution
{

    /**
     * @param Integer[] $arr
     * @return Float
     */
    public function trimMean($arr)
    {
        sort($arr);

        $count = count($arr);
        $deleteCount = $count * 0.05;
        if ($deleteCount < 1) {
            $deleteCount = 1;
        }

        $arr = array_slice($arr, $deleteCount, ($count - $deleteCount * 2));
        return array_sum($arr) / count($arr);
    }
}
