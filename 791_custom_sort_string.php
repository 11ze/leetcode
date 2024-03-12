<?php

class Solution {

  /**
   * @param string $order
   * @param string $s
   * @return string
   */
  function customSortString($order, $s) {
    $mapping  = [];

    foreach (str_split($order) as $charOfOrder) {
      $mapping[$charOfOrder] = 0;
    }

    $result = '';

    foreach (str_split($s) as $charOfS) {
      if (isset($mapping[$charOfS])) {
        $mapping[$charOfS]++;
      } else{
        $result .= $charOfS;
      }
    }

    foreach ($mapping as $char => $count) {
      while ($count > 0) {
        $result .= $char;
        $count--;
      }
    }

    return $result;
  }
}

$solution = new Solution();

$order = "cba";
$s = "abcd";
var_dump($solution->customSortString($order, $s)); // Output: "cbad"

$order = "kqep";
$s = "pekeq";
var_dump($solution->customSortString($order, $s)); // Output: "kqeep"

