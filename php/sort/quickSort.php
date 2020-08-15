<?php

/**
 * 快速排序
 * @Author: Admin
 * @Date:   2020-07-23 17:21:00
 * @Last Modified by:   Admin
 * @Last Modified time: 2020-07-30 16:44:36
 */
function quickSort($array)
{
	$count = count($array);
	quickSort_c($array, 0, $count - 1);

	return $array;
}

function quickSort_c(&$array, $p, $r)
{
	if ($p >= $r) return;

	$i = partition($array, $p, $r);

	quickSort_c($array, $p, $i-1);
	quickSort_c($array, $i+1, $r);
}

function findMaxByIndex($array, $n)
{
	$count = count($array);
	findMaxByIndex_c($array, 0, $count - 1, $n);

	return $array[$n-1];
}

function findMaxByIndex_c(&$array, $p, $r, $n)
{
	$i = partition($array, $p, $r);
	if ($n == $i + 1) {
		return;
	}

	if ($n > $i + 1) {
		findMaxByIndex_c($array, $i+1, $r, $n);
	} elseif ($n < $i + 1) {
		findMaxByIndex_c($array, $p, $i-1, $n);
	}
}

function partition(&$array, $p, $r)
{
	$i = $p;
	$j = $p;
	$tmp = $array[$r];

	for ($j; $j < $r; $j++) {
		if ($array[$j] < $tmp) {
 			$tmpVal = $array[$i];
 			$array[$i] = $array[$j];
 			$array[$j] = $tmpVal;
 			$i++;
		}
	}

	$array[$r] = $array[$i];
	$array[$i] = $tmp;

	return $i;
}

$array = [3,1,4,1,2,10,9];
// print_r(quickSort($array));

// 利用快排查找第n大元素
echo (findMaxByIndex($array, 7));