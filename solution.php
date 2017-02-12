<?php

/*/
Two non-negative numbers N and M are called similar if their decimal representations (without leading zeros)
can be obtained from each other by rearranging the digits. For example, in each of the following pairs one integer is similar to the other.

    123 and 321
    52832 and 22835
    12 and 21

Write a function such that given a non-negative integer N returns the number of non-negative integers similar to N.

For example, given N=1213 the function should return 12 because there are twelve integers similar to 1213 namely:

1123, 1132, 1213, 1231, 1312, 1321, 2113, 2131, 2311, 3112, 3121 and 3211.

If N = 0, it should return 1.
If N = 100, it should also return 1 as 010 or 001 is not valid.
//*/

$_uniqueIntStorage;

function recursiveIntGenerator($intString, $depth, $arrangement = array()) {
	$length = strlen($intString);
	for ($i = 0; $i < $length; $i++) {
		if (in_array($i, $arrangement)) {
			continue;
		}
		
		$newArrangement = $arrangement;
		$newArrangement[] = $i;
		if ($depth + 1 == strlen($intString) - 1) {
			$combined = '';
			foreach ($arrangement as $value) {
				$combined .= $intString[$value];
			}
			
			
			if (!in_array($combined, $GLOBALS['_uniqueIntStorage'])) {
				$GLOBALS['_uniqueIntStorage'][] = $combined;
			}
		} else {
			recursiveIntGenerator($intString, $depth + 1, $newArrangement);
		}
	}
	
}

function occupyStorage($intString) {
	for ($i = 0; $i < strlen($intString); $i++) {
		recursiveIntGenerator($intString, 0, array($i));
	}
}

function solution($N) {
	$GLOBALS['_uniqueIntStorage'] = array();
	$stringN = (string)$N;
	$strLength = strlen($stringN);
	
	if (intval($N) < 0) {
		die('Invalid value. Accepts only non-negative integers only.');
	}
	
	if ($strLength == 1) {
		return 1;
	}
	
	if ($strLength > 1 && $stringN[0] == '0') {
		die('Invalid integer.');
	}
	
	/*
	Given Int: 1234
	Uniqueness: 1234, 1243, 1324, 1342, 1423, 1432, 2134, 2143, 2314, 2341, 2413, 2431, 3124, 3142, 3214, 3241, 3412, 3421, 4123, 4132, 4213, 4231, 4312, 4321
	Total Unique: 24
	//*/
	
	occupyStorage($stringN);
	
	return count($GLOBALS['_uniqueIntStorage']);
}

var_dump(solution(0) == 1);
var_dump(solution(123) == 6);
var_dump(solution(1213) == 12);
var_dump(solution(1234) == 24);
var_dump(solution(11111) == 1);
var_dump(solution(11211) == 5);

// var_dump($_uniqueIntStorage);

?>