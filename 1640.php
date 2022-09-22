<?php

// 1640. 能否连接形成数组
// https://leetcode.cn/problems/check-array-formation-through-concatenation/

class Solution
{

    /**
     * @param Integer[] $arr
     * @param Integer[][] $pieces
     * @return Boolean
     */
    public function canFormArray($arr, $pieces)
    {
        $used = []; // piecesIndex => boolean;

        for ($i = 0; $i < count($arr);) {
            $toReturn = true;

            for ($j = 0; $j < count($pieces); $j++) {
                if ($used[$j] ?? false) {
                    continue;
                }

                $piecesItem = $pieces[$j];

                if ($arr[$i] !== $piecesItem[0]) {
                    continue;
                }
                $itemCount = count($piecesItem);
                if (count($arr) < $i + $itemCount) {
                    return false;
                }
                if ($arr[$i + $itemCount - 1] !== $piecesItem[$itemCount - 1]) {
                    if ($i + $itemCount === count($arr)) {
                        return false;
                    }
                    continue;
                }

                $i += $itemCount;
                $used[$j] = true;

                $toReturn = false;
            }

            if ($i === count($arr)) {
                return true;
            }

            if ($toReturn) {
                return false;
            }
        }

        return false;
    }
}

$arr = [15, 88];
$pieces = [[88], [15]];
var_export((new Solution())->canFormArray($arr, $pieces)); // true

$arr = [49, 18, 16];
$pieces = [[16, 18, 49]];
var_export((new Solution())->canFormArray($arr, $pieces)); // false

$arr = [91, 4, 64, 78];
$pieces = [[78], [4, 64], [91]];
var_export((new Solution())->canFormArray($arr, $pieces)); // true

$arr = [91, 2, 4, 64, 5, 78, 12, 9];
$pieces = [[78, 12, 3], [4, 64, 5], [91, 2]];
var_export((new Solution())->canFormArray($arr, $pieces)); // false

$arr = [3, 4, 8];
$pieces = [[3], [5, 8]];
var_export((new Solution())->canFormArray($arr, $pieces)); // false
