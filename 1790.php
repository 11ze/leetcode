<?php

// 1790. 仅执行一次字符串交换能否使两个字符串相等
// https://leetcode.cn/problems/check-if-one-string-swap-can-make-strings-equal/

class Solution
{

    /**
     * @param String $s1
     * @param String $s2
     * @return Boolean
     */
    function areAlmostEqual($s1, $s2)
    {
        $diffCount = 0;

        $chars1 = str_split($s1);
        $chars2 = str_split($s2);

        $strLen = count($chars1);

        $diffCharsIndex = [];

        for ($i = 0; $i < $strLen; $i++) {
            if ($chars1[$i] !== $chars2[$i]) {
                $diffCount++;
                $diffCharsIndex[] = $i;

                if ($diffCount > 2) {
                    return false;
                }
            }
        }

        if ($diffCount === 0) {
            return true;
        }

        $idx1 = $diffCharsIndex[0];
        $idx2 = $diffCharsIndex[1];

        if (
            $chars1[$idx1] === $chars2[$idx2]
            && $chars1[$idx2] === $chars2[$idx1]
        ) {
            return true;
        }

        return false;
    }
}

$obj = new Solution();

echo '</br>';
$s1 = 'bank';
$s2 = 'kanb';
var_export($obj->areAlmostEqual($s1, $s2)); // true

echo '</br>';
$s1 = 'attack';
$s2 = 'defend';
var_export($obj->areAlmostEqual($s1, $s2)); // false

echo '</br>';
$s1 = 'kelb';
$s2 = 'kelb';
var_export($obj->areAlmostEqual($s1, $s2)); // true

echo '</br>';
$s1 = 'abcd';
$s2 = 'dcba';
var_export($obj->areAlmostEqual($s1, $s2)); // false

echo '</br>';
$s1 = 'caa';
$s2 = 'aaz';
var_export($obj->areAlmostEqual($s1, $s2)); // false
