<?php

/**
 * @Author: Admin
 * @Date:   2020-07-31 10:49:37
 * @Last Modified by:   Admin
 * @Last Modified time: 2020-07-31 11:01:14
 */
function arraySort($array) {
	$count = count($array);
	$small = ['a','b','c'];
	$big = ['A','B','C'];
	$number = [1,2,3];

	$smallIndex = 0;
	$numberIndex = 0;
	$i = 0;

	for ($i; $i <= $count - 1; $i++) {
		if (in_array($array[$i], $small)) {
			$tmp = $array[$smallIndex];
			$array[$smallIndex] = $array[$i];
			$array[$i] = $tmp;
			$smallIndex++;
		}
		if (in_array($array[$i], $small)) {
			$tmp = $array[$numberIndex];
			$array[$numberIndex] = $array[$i];
			$array[$i] = $tmp;
			$smallIndex++;
			$numberIndex++;
		}
	}

	return $array;
}

$array = ['A','a','b'];
print_r(arraySort($array));