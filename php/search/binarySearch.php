<?php

/**
 * @Author: Admin
 * @Date:   2020-08-01 15:57:51
 * @Last Modified by:   Admin
 * @Last Modified time: 2020-08-03 12:32:39
 */
class BinarySearch
{
	public function simple($array, $value)
	{
		$count = count($array);
		$low = 0;
		$high = $count - 1;

		while ($low <= $high) {
			$mid = $low + (($high - $low) >> 1);
			if ($array[$mid] == $value) {
				return $mid;
			}
			if ($array[$mid] < $value) {
				$low = $mid + 1;
			} else {
				$high = $mid - 1;
			}
		}

		return -1;
	}

	// 第一个等于给定值的元素
	public function firstIndex($array, $value)
	{
		$count = count($array);
		$low = 0;
		$high = $count - 1;

		while ($low <= $high) {
			$mid = $low + (($high - $low) >> 1);
			if ($array[$mid] < $value) {
				$low = $mid + 1;
			} else {
				$high = $mid - 1;
			}
		}

		if ($array[$low] == $value) return $low;
		return -1;
	}
	public function firstIndex1($array, $value)
	{
		$count = count($array);
		$low = 0;
		$high = $count - 1;

		while ($low <= $high) {
			$mid = $low + (($high - $low) >> 1);
			if ($array[$mid] < $value) {
				$low = $mid + 1;
			} elseif ($array[$mid] > $value) {
				$high = $mid - 1;
			} else {
				if ($mid == 0 || $array[$mid - 1] < $value) return $mid;
				else $high = $mid - 1; 
			}
		}

		return -1;
	}

	// 最后一个等于给定值的元素
	public function lastIndex($array, $value)
	{
		$count = count($array);
		$low = 0;
		$high = $count - 1;

		while ($low <= $high) {
			$mid = $low + (($high - $low) >> 1);
			if ($array[$mid] < $value) {
				$low = $mid + 1;
			} elseif ($array[$mid] > $value) {
				$high = $mid - 1;
			} else {
				if ($mid == $count - 1 || $array[$mid + 1] > $value) return $mid;
				else $low = $mid + 1;
			}
		}

		return -1;
	}

	// 第一个大于等于给定值的元素
	public function firstGtOrEqIndex($array, $value)
	{
		$count = count($array);
		$low = 0;
		$high = $count - 1;

		if ($array[$high] < $value) {
			return $high;
		}

		while ($low <= $high) {
			$mid = $low + (($high - $low) >> 1);
			if ($array[$mid] >= $value && ($mid == 0 || $array[$mid - 1] < $value)) {
				return $mid;
			} elseif ($array[$mid] < $value) {
				$low = $mid + 1;
			} elseif ($array[$mid] >= $value) {
				$high = $mid - 1;
			} 
		}

		return -1;
	}

	// 最后一个小于等于给定值的元素
	public function firstLtOrEqIndex($array, $value)
	{
		$count = count($array);
		$low = 0;
		$high = $count - 1;

		if ($array[$low] > $value) {
			return $low;
		}

		while ($low <= $high) {
			$mid = $low + (($high - $low) >> 1);
			if ($array[$mid] <= $value && ($mid == $high || $array[$mid + 1] > $value)) {
				return $mid;
			} elseif ($array[$mid] <= $value) {
				$low = $mid + 1;
			} elseif ($array[$mid] > $value) {
				$high = $mid - 1;
			} 
		}

		return -1;
	}
}

$array = [1,2,3,5,6,6,6,6,7,8,8,8,9,9];
$binarySearch = new BinarySearch();
echo $binarySearch->simple($array, 3);
echo $binarySearch->firstIndex1($array, 1);
echo $binarySearch->lastIndex($array, 6);
echo $binarySearch->firstGtOrEqIndex($array, 99);
echo $binarySearch->firstLtOrEqIndex($array, -1);
