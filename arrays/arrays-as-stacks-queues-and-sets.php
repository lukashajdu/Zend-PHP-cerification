<?php
/**
 * ARRAYS AS STACKS, QUEUES AND SETS
 *
 * Copyright © 2014 Lukas Hajdu <me@lukashajdu.com>
 * This work is free. You can redistribute it and/or modify it under the
 * terms of the Do What The Fuck You Want To Public License, Version 2,
 * as published by Sam Hocevar. See the COPYING file for more details.
 */

// ARRAYS AS STACKS
$stack = array();                       // Must be initialized before use
array_push($stack, 'orange', 'banana'); // Array used as a stack - Last In, First Out, or LIFO
array_push($stack, 'apple');
array_push($stack, 'raspberry');

$last_in = array_pop($stack);   // Last inserted value will be assigned to $last_in and item will be removed from array
var_dump($last_in);             // Outputs: string(9) "raspberry"

// ARRAYS AS QUEUES
$stack = array('orange', 'banana', 'apple', 'raspberry');
$first_element = array_shift($stack);           // Remove elements from the beginning; Array used as a queue (FIFO)
var_dump($stack);

array_unshift($stack, 'cherry');    // Add elements at the beginning
var_dump($stack);

// SET FUNCTIONALITY
$array1 = array(10 => 'orange', 20 => 'banana', 50 => 'apple', 100 => 'raspberry');
$array2 = array('banana', 50 => 'apple');
$array3 = array('orange');

print_r(array_diff($array1, $array2));              // Computes the difference of arrays; keys are ignored
// Outputs:
// Array
// (
//     [10] => orange
//     [100] => raspberry
// )

print_r(array_diff($array1, $array2, $array3));     // More arrays can be compared at once
// Outputs:
// Array
// (
//     [100] => raspberry
// )

print_r(array_diff_assoc($array1, $array2));        // Difference computed based on key-value pairs
// Outputs:
// Array
// (
//     [10] => orange
//     [20] => banana
//     [100] => raspberry
// )
// User-defined callback version of function available: array_diff_uassoc()

print_r(array_diff_key($array1, $array2));          // Difference computed based by keys alone
// Outputs:
// Array
// (
//     [10] => orange
//     [20] => banana
//     [100] => raspberry
// )
// User-defined callback version of function available: array_diff_ukey()

print_r(array_intersect($array1, $array2));         // compute the intersection between two arrays
// Outputs:
// Array
// (
//     [20] => banana
//     [50] => apple
// )
// array_intersect_key(), array_intersect_assoc(), array_intersect_ukey() and array_intersect_uassoc() variants available