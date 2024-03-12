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

    $unOrderMapping = [];

    foreach (str_split($s) as $charOfS) {
      if (isset($mapping[$charOfS])) {
        $mapping[$charOfS]++;
      } else{
        $unOrderMapping[] = $charOfS;
      }
    }

    $result = '';

    foreach ($mapping as $char => $count) {
      while ($count > 0) {
        $result .= $char;
        $count--;
      }
    }

    foreach ($unOrderMapping as $item) {
      $result .= $item;
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

