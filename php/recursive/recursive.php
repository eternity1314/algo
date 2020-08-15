<?php

/**
 * @Author: Admin
 * @Date:   2020-07-22 21:42:11
 * @Last Modified by:   Admin
 * @Last Modified time: 2020-07-22 21:49:32
 */
class recursive
{
	public function f($n)
	{
		if ($n == 1) return 1;
		return $this->f($n - 1) + 1;
	}

	public function f1($n)
	{
		if ($n == 1) return 1;
		if ($n == 2) return 2;
		return $this->f1($n - 1) + $this->f1($n - 2);
	}
}

$recursive = new recursive();
echo $recursive->f(10);
echo $recursive->f1(10);