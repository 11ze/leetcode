<?php

// 2487. Remove Nodes From Linked List
// https://leetcode.com/problems/remove-nodes-from-linked-list/description

class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
class Solution {

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function removeNodes($head) {
        if (is_null($head)) {
            return null;
        }

        $head->next = $this->removeNodes($head->next);
        if (is_null($head->next) || $head->val >= $head->next->val) {
            return $head;
        }

        return $head->next;
    }
}

// Test case 1
$head = new ListNode(5, new ListNode(2, new ListNode(13, new ListNode(1, new ListNode(8)))));
$head = (new Solution())->removeNodes($head);

// Output: 13 8
while ($head !== null) {
    echo $head->val . PHP_EOL;
    $head = $head->next;
}
