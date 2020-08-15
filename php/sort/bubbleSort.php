<?php

/**
 * 冒泡排序
 * @Author: Admin
 * @Date:   2020-07-23 17:21:00
 * @Last Modified by:   Admin
 * @Last Modified time: 2020-07-23 20:27:47
 */
function bubbleSort($array)
{
	$count = count($array);

	for ($i = 0; $i < $count; $i++) {
		$replace = false;
		for ($j = 0; $j < $count - $i - 1; $j++) {
			if ($array[$j] > $array[$j+1]) {
				$temp = $array[$j];
				$array[$j] = $array[$j+1];
				$array[$j+1] = $temp;
				$replace = true;
			}
		}
		// 如果一轮冒泡没有经过交换，则数据已经排序完成
		if ($replace == false) {
			break;
		}
	}

	return $array;
}

$array = [3,1,4,1,2,10,9];
print_r(bubbleSort($array));