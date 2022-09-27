<?php

// 面试题 01.02. 判定是否互为字符重排
// https://leetcode.cn/problems/design-linked-list/submissions/

// 另一种思路是将两个字符串排序，只需要遍历一次

class Solution
{

    /**
     * @param String $s1
     * @param String $s2
     * @return Boolean
     */
    public function CheckPermutation($s1, $s2)
    {
        $strlen = strlen($s1);
        if ($strlen !== strlen($s2)) {
            return false;
        }
        $s1List = str_split($s1);
        $s2List = str_split($s2);

        $saved = []; // char => count
        for ($i = 0; $i < $strlen; $i++) {
            $char = $s1List[$i];
            $count = $saved[$char] ?? 0;
            $saved[$char] = $count + 1;
        }

        for ($i = 0; $i < $strlen; $i++) {
            $char = $s2List[$i];
            $count = $saved[$char] ?? 0;
            $count -= 1;
            if ($count < 0) {
                return false;
            }
            $saved[$char] = $count;
        }

        return true;
    }
}

$obj = new Solution();

$s1 = 'abc';
$s2 = 'bca';
var_export($obj->CheckPermutation($s1, $s2));

$s1 = 'abc';
$s2 = 'bad';
var_export($obj->CheckPermutation($s1, $s2));
