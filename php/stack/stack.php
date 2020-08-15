<?php
/**
 * 链式栈（先进后出，后进先出）
 * @Author: Admin
 * @Date:   2020-07-20 18:54:40
 * @Last Modified by:   Admin
 * @Last Modified time: 2020-07-22 19:53:49
 */
class Stack
{
	// 栈指针（指向栈头）
	protected $head;

	public function __construct()
	{
		$this->head = new Node(null);
	}

	// 入栈
	public function push($value)
	{
		$node = new Node($value);
		$node->next = $this->head;
		$this->head = $node;
	}

	// 出栈
	public function pop()
	{
		if ($this->isEmpty()) {
			return -1;
		}

		$value = $this->head->val;
		$this->head = $this->head->next;

		return $value;
	}

	public function isEmpty()
	{
		return $this->head->val == null;
	}

	public function getHead()
	{
		return $this->head;
	}
}

class Node
{
	public $val;
	public $next;

	public function __construct($val)
	{
		$this->val = $val;
	}
}

// $stack = new Stack();
// $stack->push('1');
// $stack->push('2');
// $stack->push('3');
// $stack->push('6');
// $stack->push('4');
// echo $stack->pop();
// echo $stack->pop();
// echo $stack->pop();
// echo $stack->pop();
// echo $stack->pop();
// echo $stack->pop();
// echo $stack->pop();