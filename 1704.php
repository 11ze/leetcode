<?php

// 1704. 判断字符串的两半是否相似
// https://leetcode.cn/problems/determine-if-string-halves-are-alike/

class Solution
{

    /**
     * @param String $s
     * @return Boolean
     */
    function halvesAreAlike($s)
    {
        $vowels = [
            'a' => 1,
            'e' => 1,
            'i' => 1,
            'o' => 1,
            'u' => 1,
            'A' => 1,
            'E' => 1,
            'I' => 1,
            'O' => 1,
            'U' => 1,
        ];

        $res = 0;

        $chars = str_split($s);
        $len = count($chars);

        for ($i = 0, $j = $len / 2; $j < $len; $i++, $j++) {
            $res += ($vowels[$chars[$i]] ?? 0);
            $res -= ($vowels[$chars[$j]] ?? 0);
        }

        return !$res;
    }
}
