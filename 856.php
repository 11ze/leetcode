<?php

// 856. 括号的分数
// https://leetcode.cn/problems/score-of-parentheses/

class Solution
{
    /**
     * @param String $s
     * @return Integer
     */
    function scoreOfParentheses($s)
    {
        $stack = [];

        foreach (str_split($s) as $char) {

            if ($char === '(') {
                $stack[] = 0;
                continue;
            }

            $stackLen = count($stack);
            // 上一个字符刚好是左括号，加一分
            if ($stack[$stackLen - 1] === 0) {
                $stack[$stackLen - 1] = 1;
                continue;
            }

            // 否则将上一个左括号之间的分数取出 * 2，且弹出左括号，再把分数放回栈中
            $sum = 0;
            while (true) {
                $last = array_pop($stack);
                $sum += $last;
                if ($last === 0) {
                    break;
                }
            }
            $stack[] = $sum * 2;
        }

        return array_sum($stack);
    }
}

$obj = new Solution();

echo '</br>';
$s = '()';
var_export($obj->scoreOfParentheses($s)); // 1

echo '</br>';
$s = '(())';
var_export($obj->scoreOfParentheses($s)); // 2

echo '</br>';
$s = '()()';
var_export($obj->scoreOfParentheses($s)); // 2

echo '</br>';
$s = '(()(()))';
var_export($obj->scoreOfParentheses($s)); // 6
