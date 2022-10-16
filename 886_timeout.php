<?php

// 886. 可能的二分法
// https://leetcode.cn/problems/possible-bipartition/

class Solution
{

    /**
     * @param Integer $n
     * @param Integer[][] $dislikes
     * @return Boolean
     */
    function possibleBipartition($n, $dislikes)
    {
        $color = [];
        $g = [];
        for ($i = 1; $i <= $n; $i++) {
            $color[$i] = 0;
            $g[$i] = [];
        }

        foreach ($dislikes as $dislike) {
            $g[$dislike[0]][] = $dislike[1];
            $g[$dislike[1]][] = $dislike[0];
        }

        for ($i = 1; $i <= $n; $i++) {
            if ($color[$i] === 0 && !$this->dfs($i, 1, $color, $g)) {
                return false;
            }
        }

        return true;
    }

    protected function dfs($curNode, $nowColor, $color, $g)
    {
        $color[$curNode] = $nowColor;
        foreach ($g[$curNode] as $nextNode) {
            if ($color[$nextNode] !== 0 && $color[$nextNode] === $color[$curNode]) {
                return false;
            }
            // 3 ^ $nowColor: $nowColor === 1 ? 2 : 1;
            if ($color[$nextNode] === 0 && !$this->dfs($nextNode, 3 ^ $nowColor, $color, $g)) {
                return false;
            }
        }
        return true;
    }
}


$obj = new Solution();

echo '</br>';
$n = 4;
$dislikes = [[1, 2], [1, 3], [2, 4]];
var_export($obj->possibleBipartition($n, $dislikes)); // true

echo '</br>';
$n = 3;
$dislikes = [[1, 2], [1, 3], [2, 3]];
var_export($obj->possibleBipartition($n, $dislikes)); // false

echo '</br>';
$n = 5;
$dislikes = [[1, 2], [2, 3], [3, 4], [4, 5], [1, 5]];
var_export($obj->possibleBipartition($n, $dislikes)); // false

echo '</br>';
$n = 10;
$dislikes = [[1, 2], [3, 4], [5, 6], [6, 7], [8, 9], [7, 8]];
var_export($obj->possibleBipartition($n, $dislikes)); // true
