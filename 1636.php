<?php

// 1636. 按照频率将数组升序排序
// https://leetcode.cn/problems/sort-array-by-increasing-frequency/

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    public function frequencySort($nums)
    {
        $saved = []; // num => count
        foreach ($nums as $num) {
            $count = $saved[$num] ?? 0;
            $saved[$num] = $count + 1;
        }

        $countList = array_unique(array_values($saved));
        sort($countList);

        $result = [];

        foreach ($countList as $count) {
            $findNums = array_keys($saved, $count);
            rsort($findNums);

            foreach ($findNums as $num) {
                for ($i = 0; $i < $count; $i++) {
                    $result[] = $num;
                }
            }
        }

        return $result;
    }
}
