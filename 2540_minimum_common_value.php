<?php

class Solution {

  /**
  * @param int[] $nums1
  * @param int[] $nums2
  * @return int
  */
  function getCommon($nums1, $nums2) {

    foreach ($nums1 as $num1) {
      $startIndexOfNum2 = 0;
      for ($i = $startIndexOfNum2; $i < count($nums2); $i++, $startIndexOfNum2++) {
        if ($num1 == $nums2[$i]) {
          return $num1;
        }

        if ($num1 < $nums2[$i]) {
          break;
        }
      }

    }

    return -1;
  }
}

$solution = new Solution();

$nums1 = [1, 3, 5, 7, 9];
$nums2 = [2, 4, 6, 8, 10];

echo $solution->getCommon($nums1, $nums2); // -1

$nums1 = [1, 3, 5, 7, 9];
$nums2 = [2, 4, 6, 8, 9];

echo $solution->getCommon($nums1, $nums2); // 9

