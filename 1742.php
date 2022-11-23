<?php

// 1742. 盒子中小球的最大数量
// https://leetcode.cn/problems/maximum-number-of-balls-in-a-box/

class Solution
{

    /**
     * @param Integer $lowLimit
     * @param Integer $highLimit
     * @return Integer
     */
    function countBalls($lowLimit, $highLimit)
    {
        $countTable = [];

        $max = 0;
        for ($i = $lowLimit; $i <= $highLimit; $i++) {
            $num = $this->sumNum($i);
            $count = $countTable[$num] ?? 0;
            $countTable[$num] = $count + 1;
            $max = $max < $count + 1 ? $count + 1 : $max;
        }

        return $max;
    }

    private function sumNum($num)
    {
        $numList = str_split($num . '');
        return array_sum($numList);
    }
}


$obj = new Solution();

echo '</br>';
$lowLimit = 1;
$highLimit = 10;
var_export($obj->countBalls($lowLimit, $highLimit)); // 2

echo '</br>';
$lowLimit = 5;
$highLimit = 15;
var_export($obj->countBalls($lowLimit, $highLimit)); // 2

echo '</br>';
$lowLimit = 19;
$highLimit = 28;
var_export($obj->countBalls($lowLimit, $highLimit)); // 2
