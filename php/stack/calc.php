<?php

/**
 * 数学表达式
 * @Author: Admin
 * @Date:   2020-07-20 21:29:23
 * @Last Modified by:   Admin
 * @Last Modified time: 2020-07-22 21:36:45
 */
include 'stack.php';
class calc{
	// 运算符
	protected static $operate = [
		'+' => 1,
		'-' => 1,
		'*' => 2,
		'/' => 2,
	];
	// 
	protected $operateStack;
	protected $numberStack;

	public function __construct()
	{
		$this->operateStack = new Stack();
		$this->numberStack = new Stack();
	}

	public function run($expression)
	{
		$count = strlen($expression);
		for ($i = 0; $i < $count; $i++) {
			$element = $expression[$i];
			if ($this->isOperate($element)) {
				// 运算符
				$this->compareOperate($element);
				
			} else {
				// 数字
				$this->pushNumberStack($element);
			}
		}

		while (true) {
			$operate = $this->operateStack->pop();
			if ($operate == -1) {
				break;
			}
			$this->calculation($operate);
		};

		return $this->numberStack->pop();
	}

	/* 
 	 比较运算符
 	 1 当前运算符优先级 小于等于 运算符栈中第一个元素 -> 当前运算符入栈
 	 2 当前运算符优先级 小于等于 运算符栈中第一个元素 -> 根据当前运算符进行计算
	*/
	public function compareOperate($element)
	{
		while ($this->isLessThanFirstOperateStack($element)) {
			$operate = $this->operateStack->pop();
			$this->calculation($operate);
		}

		$this->operateStack->push($element);
	}

	// 计算步骤
	// 1 取出数字栈中的前两个
	// 2 没有传入运算符则去运算符栈的第一个
	public function calculation($operate)
	{
		$num1 = $this->numberStack->pop();
		$num2 = $this->numberStack->pop();

		echo $num1;echo $operate;echo $num2."\n";

		$result = eval('return ' . $num1 . $operate . $num2 . ';');

		$this->numberStack->push($result);
	}

	public function pushNumberStack($element)
	{
		$this->numberStack->push($element);
	}

	// 当前运算符是否小于等于栈内第一个
	public function isLessThanFirstOperateStack($operate)
	{
		return !$this->operateStack->isEmpty() && self::$operate[$operate] <= self::$operate[$this->operateStack->getHead()->val];
	}


	// 是否运算符
	public function isOperate($data)
	{
		return isset(self::$operate[$data]);
	}
}

$calc = new calc();
echo $calc->run('3+2+2*2+2');