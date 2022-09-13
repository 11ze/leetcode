<?php

class Solution
{

    /**
     * @param Integer $num
     * @return Integer
     */
    public function maximumSwap($num)
    {
        $numList = str_split($num . '');

        $maxIndex = count($numList) - 1;
        $resultMaxIndex = count($numList) - 1;
        $resultMinIndex = count($numList) - 1;

        for ($i = count($numList) - 1; $i >= 0; $i--) {
            if ($numList[$maxIndex] < $numList[$i]) {
                $maxIndex = $i;
            } elseif ($numList[$maxIndex] > $numList[$i]) {
                $resultMinIndex = $i;
                $resultMaxIndex = $maxIndex;
            }
        }

        if ($resultMaxIndex < $resultMinIndex) {
            return $num;
        }

        list($numList[$resultMaxIndex], $numList[$resultMinIndex]) =
            [$numList[$resultMinIndex], $numList[$resultMaxIndex]];

        return implode($numList) * 1;
    }
}
