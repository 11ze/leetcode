<?php

// 870. 优势洗牌
// https://leetcode.cn/problems/advantage-shuffle/
// 看了官解下面的评论

class Solution
{

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer[]
     */
    public function advantageCount($nums1, $nums2)
    {
        $length = count($nums1);

        // 用于正确排序返回值
        $nums2Index = [];
        for ($i = 0; $i < $length; $i++) {
            $nums2Index[] = $i;
        }
        usort($nums2Index, function ($a, $b) use ($nums2) {
            return $nums2[$a] - $nums2[$b];
        });

        sort($nums1);

        $left = 0;
        $right = $length - 1;
        for ($i = 0; $i < $length; $i++) {
            // 若 num1 大于 num2，配对
            if ($nums1[$i] > $nums2[$nums2Index[$left]]) {
                $nums2[$nums2Index[$left]] = $nums1[$i];
                $left++;
                continue;
            }

            // 否则放到队尾
            $nums2[$nums2Index[$right]] = $nums1[$i];
            $right--;
        }

        return $nums2;
    }
}

$obj = new Solution();

echo '</br>';
$nums1 = [2, 7, 11, 15];
$nums2 = [1, 10, 4, 11];
var_export($obj->advantageCount($nums1, $nums2)); // [2, 11, 7, 15]

echo '</br>';
$nums1 = [12, 24, 8, 32];
$nums2 = [13, 25, 32, 11];
var_export($obj->advantageCount($nums1, $nums2)); // [24, 32, 8, 12]

echo '</br>';
$nums1 = [2, 0, 4, 1, 2];
$nums2 = [1, 3, 0, 0, 2];;
var_export($obj->advantageCount($nums1, $nums2)); // [2, 0, 2, 1, 4]
