<?php

/**
 * 归并排序
 * @Author: Admin
 * @Date:   2020-07-23 17:21:00
 * @Last Modified by:   Admin
 * @Last Modified time: 2020-07-28 20:54:19
 */
function mergeSort($array)
{
	$count = count($array);
	return mergeSort_c($array, 0, $count - 1);
}

function mergeSort_c(&$array, $p, $r)
{ 
	if ($p >= $r) return;

	$q = floor(($r + $p) / 2);

	mergeSort_c($array, $p, $q);
	mergeSort_c($array, $q+1, $r);

	return merge($array, $p, $q, $r);
}

function merge(&$array, $p, $q, $r)
{
	$tmpArray = [];
	$low = $p;
	$i = $p;
	$j = $q + 1;

	while ($i <= $q && $j <= $r) {
		if ($array[$i] < $array[$j]) {
			$tmpArray[$low++] = $array[$i++];
		} else {
			$tmpArray[$low++] = $array[$j++];
		}
	}

	while ($i <= $q) {
		$tmpArray[$low++] = $array[$i++];
	}
	while ($j <= $r) {
		$tmpArray[$low++] = $array[$j++];
	}

	for ($i = 0; $i < count($tmpArray); $i++) {
		$array[$i + $p] = $tmpArray[$i+$p];
	}

	return $array;
}

$array = [3,1,4,1,3,1,4,1];
print_r(mergeSort($array));