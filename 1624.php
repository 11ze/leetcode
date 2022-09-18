<?php

// 1624. 两个相同字符之间的最长子字符串
// https://leetcode.cn/problems/largest-substring-between-two-equal-characters/

class Solution
{

    /**
     * @param String $s
     * @return Integer
     */
    public function maxLengthBetweenEqualCharacters($s)
    {
        $saved = []; // [key => [max, index]];
        $max = -1;

        foreach (str_split($s) as $index => $char) {
            $savedItem = $saved[$char] ?? null;

            if (is_null(($savedItem))) {
                $saved[$char] = [
                    'max' => -1,
                    'index' => $index,
                ];
                continue;
            }

            $size = $index - $savedItem['index'] - 1;

            if ($savedItem['max'] < $size) {
                $savedItem['max'] = $size;
                $max = $max < $size ? $size : $max;
            }
            $savedItem['index'] = $index;
        }

        return $max;
    }
}
