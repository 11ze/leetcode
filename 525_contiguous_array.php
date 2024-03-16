<?php

class Solution {

  /**
   * @param int[] $nums
   * @return int
   */
  function findMaxLength($nums) {
    $map = [];
    $sum = 0;
    $subArrayLength = 0;

    for ($i = 0; $i < count($nums); $i++) {
      $sum += $nums[$i] === 0 ? -1 : 1;
      if ($sum === 0) {
        $subArrayLength = max($subArrayLength, $i + 1);
      }
      if (isset($map[$sum])) {
        $subArrayLength = max($subArrayLength, $i - $map[$sum]);
      } else {
        $map[$sum] = $i;
      }
    }

    return $subArrayLength;
  }
}

$solution = new Solution();

$nums = [0, 1];
var_dump($solution->findMaxLength($nums)); // 2

$nums = [0, 1, 0];
var_dump($solution->findMaxLength($nums)); // 2

$nums = [0, 1, 0, 1];
var_dump($solution->findMaxLength($nums)); // 4

$nums = [0, 1, 0, 1, 0];
var_dump($solution->findMaxLength($nums)); // 4

$nums = [0, 1, 1];
var_dump($solution->findMaxLength($nums)); // 2

$nums = [0, 0, 0, 1, 1, 1, 0];
var_dump($solution->findMaxLength($nums)); // 6
