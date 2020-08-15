<?php

/**
 * 插入排序
 * @Author: Admin
 * @Date:   2020-07-23 17:22:05
 * @Last Modified by:   Admin
 * @Last Modified time: 2020-07-28 20:51:44
 */
// 插入排序
function insertSort($array)
{
	$count = count($array);
	$k = 1;
	for ($i = 1; $i < $count; $i++) {
		$value = $array[$i];
		$j = $i - 1;
		for ($j; $j >= 0; $j--) {
			if ($array[$j] > $value) {$k++;
				$array[$j+1] = $array[$j];
			} else {
				break;
			}
		}
		$array[$j+1] = $value;
	}
echo $k;
	return $array;
}

// 希尔排序
function shellSort($array)
{
	$count = count($array);
	// 增量
	$d = intval($count / 2);
$k = 1;
	while ($d >= 1) {
		for ($i = $d; $i < $count; $i++) {
			$value = $array[$i];
			$j = $i - $d;
			for ($j; $j >= 0; $j-=$d) {
				if ($array[$j] > $value) {$k++;
					$array[$j+$d] = $array[$j];
				} else {
					break;
				}
			}
			$array[$j+$d] = $value;
		}
		$d = intval($d / 2);
	}
echo $k;
	return $array;
}

$array = [3,1,4,1,2,10,9,3,1,4,1,2,10,9,3,1,4,1,2,10,9];
// print_r(insertSort($array));
print_r(shellSort($array));
