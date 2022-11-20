<?php

// 1732. 找到最高海拔
// https://leetcode.cn/problems/find-the-highest-altitude/

class Solution
{

    /**
     * @param Integer[] $gain
     * @return Integer
     */
    function largestAltitude($gain)
    {
        $max = 0;
        $cur = 0;

        foreach ($gain as $subGain) {
            $cur += $subGain;
            $max = $cur > $max ? $cur : $max;
        }

        return $max;
    }
}

$obj = new Solution();

echo '</br>';
$gain = [-5, 1, 5, 0, -7];
var_export($obj->largestAltitude($gain)); // 1

echo '</br>';
$gain = [-4, -3, -2, -1, 4, 3, 2];
var_export($obj->largestAltitude($gain)); // 0
