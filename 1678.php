<?php

// 1678. 设计 Goal 解析器
// https://leetcode.cn/problems/goal-parser-interpretation/

class Solution
{

    /**
     * @param String $command
     * @return String
     */
    function interpret($command)
    {
        $mapping = [
            'G' => 'G',
            '()' => 'o',
            '(al)' => 'al',
        ];
        $res = '';
        $current = '';
        foreach (str_split($command) as $char) {
            $current .= $char;
            $goal = $mapping[$current] ?? '';
            if ($goal) {
                $res .= $goal;
                $current = '';
            }
        }

        return $res;
    }
}


$obj = new Solution();

echo '</br>';
$command = 'G()(al)';
var_export($obj->interpret($command)); // Goal

echo '</br>';
$command = 'G()()()()(al)';
var_export($obj->interpret($command)); // Gooooal

echo '</br>';
$command = '(al)G(al)()()G';
var_export($obj->interpret($command)); // alGalooG
