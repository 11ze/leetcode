<?php

// 1822. 数组元素积的符号
// https://leetcode.cn/problems/sign-of-the-product-of-an-array/

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function arraySign($nums)
    {
        $result = 1;

        foreach ($nums as $num) {
            if ($num === 0) {
                return 0;
            }

            if ($num < 0) {
                $result *= -1;
            }
        }

        return $result;
    }
}


$obj = new Solution();

echo '</br>';
$nums = [-1, -2, -3, -4, 3, 2, 1];
var_export($obj->arraySign($nums)); // 1

echo '</br>';
$nums = [1, 5, 0, 2, -3];
var_export($obj->arraySign($nums)); // 0

echo '</br>';
$nums = [-1, 1, -1, 1, -1];
var_export($obj->arraySign($nums)); // -1
