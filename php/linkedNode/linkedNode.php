<?php

/**
 * 单链表
 * Class LinkedNode
 */
class LinkedNode{
    protected $head;
    protected $size = 0;

    public function __construct()
    {
        $this->head = new Node(null);
    }

    public function add($val, $key)
    {
        if ($key > $this->size) {
            throw new \Exception('超过节点范围');
        }

        $node = $this->head;
        $i = 0;

        while ($i < $key) {
            if ($key == $i) {
                break;
            }
            $node = $node->next;
            $i++;
        }
        $newNode = new Node($val);
        // 新节点的next = 旧节点对应key的next
        $newNode->next = $node->next;
        // 旧节点next = 新节点
        $node->next = $newNode;

        $this->size++;
    }

    public function addFirst($val)
    {
        $node = new Node($val);
        $this->size = 1;
        $this->head = $node;
    }

    public function edit($val, $key)
    {
        if ($key > $this->size) {
            throw new \Exception('超过节点范围');
        }

        $node = $this->head->next;
        $i = 0;

        while ($i < $key) {
            if ($key == $i) {
                break;
            }
            $node = $node->next;
            $i++;
        }

        $node->val = $val;
    }

    public function del($key)
    {
        if ($key > $this->size - 1) {
            throw new \Exception('节点为空');
        }

        $node = $this->head;
        $i = 0;

        while ($i < $key) {
            // 返回待删除节点的上一个节点
            if ($key == $i) {
                break;
            }
            $node = $node->next;
            $i++;
        }

        $node->next = $node->next->next;

    }

    // 删除倒数第n个节点
    public function delLast($key)
    {
        if ($key > $this->size) {
            throw new \Exception('节点为空');
        }

        $node = $this->head;
        // 计算正数第几个
        $key = $this->size - $key;
        $i = 0;

        while ($i < $key) {
            if ($i == $key) {
                break;
            }
            $node = $node->next;
            $i++;
        }

        $node->next = $node->next->next;
    }

    public function mergeLink(LinkedNode $node)
    {
        $mergeNode = $node->getHead();
        $node = $this->head->next;

        while ($node->next != null) {
            $node = $node->next;
        }

        $node->next = $mergeNode;
    }

    public function select()
    {
        $node = $this->head->next;

        while ($node != null) {
            echo $node->val."\n";
            $node = $node->next;
        }
    }

    public function getHead()
    {
        return $this->head->next;
    }
}

class Node{
    public $val;
    public $next;

    public function __construct($val, $next = null)
    {
        $this->val = $val;
        $this->next = $next;
    }
}

function reversal($node)
{
    $prev = null;

    while ($node != null) {
        // 记录下一次的节点
        $next = $node->next;
        // 当前节点的下一节点是前面的节点
        $node->next = $prev;
        $prev = $node;
        $node = $next;
    }

    return $prev;
}

function middle($node)
{
    $slow = $node;
    $fast = $node;

    while ($fast->next != null && $fast->next->next != null) {
        $fast = $fast->next->next;
        $slow = $slow->next;
    }

    return $slow->val;
}

$linkedNode = new LinkedNode();
$linkedNode->add(10, 0);
$linkedNode->add(20, 1);
$linkedNode->add(30, 2);
$linkedNode->add(40, 3);
$linkedNode->add(50, 3);
// $linkedNode->select();
// 单链表反转
// reversal($linkedNode->getHead());

// 查询中心点
// echo middle($linkedNode->getHead());

// 删除倒数第n个节点
// $linkedNode->delLast(2);
// $linkedNode->select();

// 链表修改
//$linkedNode->edit(45, 3);
//$linkedNode->select();

// 链表删除
// $linkedNode->del(0);
// $linkedNode->select();

// 合并2个有序链表
// $linkedNode2 = new LinkedNode();
// $linkedNode2->add('a', 0);
// $linkedNode2->add('b', 1);
// $linkedNode->mergeLink($linkedNode2);
// $linkedNode->select();

