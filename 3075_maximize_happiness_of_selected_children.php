<?php

// 3075. Maximize Happiness of Selected Children
// https://leetcode.com/problems/maximize-happiness-of-selected-children/description

class Solution {

  /**
   * @param int[] $happiness
   * @param int $k
   * @return int
   */
  function maximumHappinessSum($happiness, $k) {
    rsort($happiness, SORT_NUMERIC);

    $result = 0;
    $n = 0;
    foreach ($happiness as $key => $value) {
        if ($n >= $k) {
            break;
        }

        $addNum = ($value - $n);
        $result += $addNum > 0 ? $addNum : 0;
        $n++;
    }

    return $result;
  }
}

$solution = new Solution();

// Test case 1
$happiness = [1,2,3];
$k = 2;
$result = $solution->maximumHappinessSum($happiness, $k);
var_export($result); // 4

// Test case 2
$happiness = [1,1,1,1];
$k = 2;
$result = $solution->maximumHappinessSum($happiness, $k);
var_export($result); // 1

// Test case 3
$happiness = [2,3,4,5];
$k = 1;
$result = $solution->maximumHappinessSum($happiness, $k);
var_export($result); // 5

// Test case 4
$happiness = [12, 1 ,42];
$k = 3;
$result = $solution->maximumHappinessSum($happiness, $k);
var_export($result); // 53
