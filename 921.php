<?php

// 921. 使括号有效的最少添加
// https://leetcode.cn/problems/minimum-add-to-make-parentheses-valid/

class Solution
{

    /**
     * @param String $s
     * @return Integer
     */
    public function minAddToMakeValid($s)
    {
        $returnCount = 0;

        $leftCount = 0;
        foreach (str_split($s) as $char) {
            if ($char === '(') {
                $leftCount += 1;
                continue;
            }

            if ($leftCount > 0) {
                // 匹配成功
                $leftCount -= 1;
            } else {
                // 没有左括号，需要添加一个
                $returnCount += 1;
            }
        }

        // 加上没有被匹配的左括号个数
        $returnCount += $leftCount;

        return $returnCount;
    }
}

$obj = new Solution();

$s = '())';
var_export($obj->minAddToMakeValid($s)); // 1

$s = '(((';
var_export($obj->minAddToMakeValid($s)); // 3

$s = '()))((';
var_export($obj->minAddToMakeValid($s)); // 4

$s = '(()())((';
var_export($obj->minAddToMakeValid($s)); // 2
