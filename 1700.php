<?php

// 1700. 无法吃午餐的学生数量
// https://leetcode.cn/problems/number-of-students-unable-to-eat-lunch/

class Solution
{

    /**
     * @param Integer[] $students
     * @param Integer[] $sandwiches
     * @return Integer
     */
    function countStudents($students, $sandwiches)
    {
        foreach ($sandwiches as $sandwich) {

            $notMatch = [];
            $studentCount = count($students);

            while (count($students)) {
                $student = array_shift($students);
                if ($student === $sandwich) {
                    break;
                }
                $notMatch[] = $student;
            }

            if (count($notMatch) === $studentCount) {
                return $studentCount;
            }

            $students = array_merge($students, $notMatch);
        }

        return 0;
    }
}


$obj = new Solution();

echo '</br>';
$students = [1, 1, 0, 0];
$sandwiches = [0, 1, 0, 1];
var_export($obj->countStudents($students, $sandwiches)); // 0

echo '</br>';
$students = [1, 1, 1, 0, 0, 1];
$sandwiches = [1, 0, 0, 0, 1, 1];
var_export($obj->countStudents($students, $sandwiches)); // 3
