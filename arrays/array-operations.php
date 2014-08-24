<?php
/**
 * ARRAY OPERATIONS
 *
 * Copyright © 2014 Lukas Hajdu <me@lukashajdu.com>
 * This work is free. You can redistribute it and/or modify it under the
 * terms of the Do What The Fuck You Want To Public License, Version 2,
 * as published by Sam Hocevar. See the COPYING file for more details.
 */

// UNION OF ARRAYS
print_r(array(1, 2, 3) + array('a' => 1, 'b' => 2, 5, 6));
// Outputs:
// Array
// (
//     [0] => 1
//     [1] => 2
//     [2] => 3
//     [a] => 1
//     [b] => 2
// )

print_r(array(1, 2, 3) + array('a' => 1, 'b' => 2, 5, 6, 7, 8));
// If the two arrays have common keys (either string or numeric), they would only appear once in the end result
// Outputs:
// Array
// (
//     [0] => 1
//     [1] => 2
//     [2] => 3
//     [a] => 1
//     [b] => 2
//     [3] => 8
// )

// COMPARING ARRAYS
$a = array(1, 2, 3);
$b = array(1 => 2, 2 => 3, 0 => 1);
$c = array('a' => 1, 'b' => 2, 'c' => 3);
$d = array('0' => 1, '1' => 2, '2' => 3);
$e = array('1', '2', '3');
var_dump($a == $b);     // Outputs: bool(true); returns true if both arrays have the same number of elements with the same values and keys, regardless of their order
var_dump($a === $b);    // Outputs: bool(false); returns true only if the array contains the same key/value pairs in the same order.
var_dump($a == $c);     // Outputs: bool(false)
var_dump($a == $d);     // Outputs: bool(true)
var_dump($a === $d);    // Outputs: bool(true)
var_dump($a == $e);     // Outputs: bool(true)
var_dump($a == $e);     // Outputs: bool(false)

// COUNTING, SEARCHING AND DELETING ELEMENTS
$a = array();
$b = array('a', 'b', 'c');
$c = 'Hello';

echo count($a);    // Outputs: 0
echo count($b);    // Outputs: 3
echo count($c);    // Outputs: 1; count() cannot be used to determine whether a variable contains an array - scalar value will return 1

echo is_array($b);       // Outputs: 1; The right way to tell whether a variable contains an array

$array = array('a' => 1, 'b' => null);
var_dump(isset($array['a']));   // Outputs: bool(true)
var_dump(isset($array['b']));   // Outputs: bool(false); isset() has the major drawback of considering an element whose value is NULL, which is perfectly valid

array_key_exists ('b', $array); // Returns: bool(true); correct way to determine existence of array
in_array(null, $array);         // Returns: bool(true); in_array allow to determine whether an element with a given value exists in an array

unset($array['b']);     // Delete value from array

// FLIPPING AND REVERSING
$array = array('a' => 10, 'b' => 20, 'c' => 30);
print_r(array_flip($array));    // Flip keys with values
// Outputs:
// Array
// (
//     [10] => a
//     [20] => b
//     [30] => c
// )
print_r(array_reverse($array));    // Reverse order of array values
// Outputs:
// Array
// (
//     [c] => 30
//     [b] => 20
//     [a] => 10
// )