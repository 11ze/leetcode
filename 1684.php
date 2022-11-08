<?php

// 1684. 统计一致字符串的数目
// https://leetcode.cn/problems/count-the-number-of-consistent-strings/

class Solution
{

    /**
     * @param String $allowed
     * @param String[] $words
     * @return Integer
     */
    function countConsistentStrings($allowed, $words)
    {
        $allowedMapping = [];
        foreach (str_split($allowed) as $char) {
            $allowedMapping[$char] = 1;
        }

        $notIn = 0;

        foreach ($words as $word) {
            foreach (str_split($word) as $char) {
                $isIn = $allowedMapping[$char] ?? 0;
                if (!$isIn) {
                    $notIn++;
                    break;
                }
            }
        }

        return count($words) - $notIn;
    }
}
