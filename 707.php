<?php

// 707. 设计链表
// https://leetcode.cn/problems/design-linked-list/submissions/

class Node
{
    public $next = null;
    public $value = null;

    public function __construct($value)
    {
        $this->value = $value;
    }
}

class MyLinkedList
{
    private $length = 0;
    private $head = null;

    /**
     */
    public function __construct()
    {
        $this->head = new Node(0);
    }

    private function increaseLength()
    {
        $this->length += 1;
    }

    private function loseLength()
    {
        $this->length -= 1;
    }

    /**
     * @param Integer $index
     * @return Integer
     */
    public function get($index)
    {
        if (0 > $index || $index >= $this->length) {
            return -1;
        }

        $current = $this->head;

        for ($i = 0; $i <= $index; $i++) {
            $current = $current->next;
        }

        return $current->value;
    }

    /**
     * @param Integer $val
     * @return NULL
     */
    public function addAtHead($val)
    {
        $this->addAtIndex(0, $val);
    }

    /**
     * @param Integer $val
     * @return NULL
     */
    public function addAtTail($val)
    {
        $this->addAtIndex($this->length, $val);
    }

    /**
     * @param Integer $index
     * @param Integer $val
     * @return NULL
     */
    public function addAtIndex($index, $val)
    {
        if ($index > $this->length) {
            return;
        }

        $prev = $this->head;
        for ($i = 0; $i < $index; $i++) {
            $prev = $prev->next;
        }

        $newNode = new Node($val);
        $newNode->next = $prev->next;
        $prev->next = $newNode;

        $this->increaseLength();
    }

    /**
     * @param Integer $index
     * @return NULL
     */
    public function deleteAtIndex($index)
    {
        if ($index >= $this->length) {
            return null;
        }

        $prev = $this->head;
        for ($i = 0; $i < $index; $i++) {
            $prev = $prev->next;
        }

        $prev->next = $prev->next->next;

        $this->loseLength();
    }
}

/**
 * Your MyLinkedList object will be instantiated and called as such:
 * $obj = MyLinkedList();
 * $ret_1 = $obj->get($index);
 * $obj->addAtHead($val);
 * $obj->addAtTail($val);
 * $obj->addAtIndex($index, $val);
 * $obj->deleteAtIndex($index);
 */

$obj = new MyLinkedList();
var_export($obj->addAtHead(1)); // 1
var_export($obj->addAtTail(3)); // 1-> 3
var_export($obj->addAtIndex(1, 2)); // 1-> 2-> 3
var_export($obj->get(1)); // return 2
var_export($obj->deleteAtIndex(1)); // 1-> 3
var_export($obj->get(1)); // return 3

echo '</br>';

$obj = new MyLinkedList();
var_export($obj->addAtHead(2)); // 2
var_export($obj->deleteAtIndex(1)); // 2
var_export($obj->addAtHead(2)); // 2-> 2
var_export($obj->addAtHead(7)); // 7-> 2-> 2
var_export($obj->addAtHead(3)); // 3-> 7-> 2-> 2
var_export($obj->addAtHead(2)); // 2-> 3-> 7-> 2-> 2
var_export($obj->addAtHead(5)); // 5-> 2-> 3-> 7-> 2-> 2
var_export($obj->addAtTail(5)); // 5-> 2-> 3-> 7-> 2-> 2-> 5
var_export($obj->get(5)); // return 2
var_export($obj->deleteAtIndex(6)); // 5-> 2-> 3-> 7-> 2-> 2
var_export($obj->deleteAtIndex(4)); // 5-> 2-> 3-> 7-> 2
