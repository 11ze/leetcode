<?php

class Solution {

  /**
   * @param int[] $nums1
   * @param int[] $nums2
   * @return int[]
   */
  function intersection($nums1, $nums2) {
    $num1Mapping = [];

    foreach ($nums1 as $num1) {
      $num1Mapping[$num1] = true;
    }

    $intersection = [];
    $num2Mapping = [];
    foreach ($nums2 as $num2) {
      if (isset($num1Mapping[$num2]) && !isset($num2Mapping[$num2])) {
        $intersection[] = $num2;
        $num2Mapping[$num2] = true;
      }
    }

    return $intersection;
  }
}

$solution = new Solution();

var_dump($solution->intersection([1, 2, 2, 1], [2, 2])); // [2]
var_dump($solution->intersection([4, 9, 9, 5], [9, 4, 9, 8, 4])); // [9, 4]
