<?php
/**
 * SORTING ARRAYS
 *
 * Copyright © 2014 Lukas Hajdu <me@lukashajdu.com>
 * This work is free. You can redistribute it and/or modify it under the
 * terms of the Do What The Fuck You Want To Public License, Version 2,
 * as published by Sam Hocevar. See the COPYING file for more details.
 */

$array = array('a' => 'foo', 'b' => 'bar', 'c' => 'baz');
sort($array);       // Compare items normally (don't change types); sort($array) is same as sort($array, SORT_REGULAR)
                    // Latter is passed by reference; function assigns new keys to the elements in array. It will remove any existing keys that may have been assigned, rather than just reordering the keys.
print_r($array);
// Outputs:
// Array
// (
//     [0] => bar
//     [1] => baz
//     [2] => foo
// )

$array = array('a' => 'foo', 'b' => 'bar', 'c' => 'baz');
asort($array);      // Save key associations - key values are saved
print_r($array);
// Outputs:
// Array
// (
//     [b] => bar
//     [c] => baz
//     [a] => foo
// )

$array = array('a' => '10foo', 'b' => '2bar', 'c' => '300baz');
asort($array, SORT_NUMERIC);      // Convert each element to a numeric value for sorting purposes
print_r($array);
// Outputs:
// Array
// (
//     [b] => 2bar
//     [a] => 10foo
//     [c] => 300baz
// )


$array = array('a' => '10foo', 'b' => '2bar', 'c' => 'baz');
asort($array, SORT_STRING);      // Compare items as strings
print_r($array);
// Outputs:
// Array
// (
//     [a] => 10foo
//     [b] => 2bar
//     [c] => baz
// )

$array = array('Orange1', 'orange2', 'Orange3', 'orange20');
sort($array, SORT_NATURAL | SORT_FLAG_CASE);    // case-insensitive natural ordering; can be combined (bitwise OR) with SORT_STRING or SORT_NATURAL
print_r($array);
// Outputs:
// Array
// (
//     [0] => Orange1
//     [1] => orange2
//     [2] => Orange3
//     [3] => orange20
// )

// DESCENDING ORDER
$array = array('a' => 'foo', 'b' => 'bar', 'c' => 'baz');
rsort($array);  // Use for descending sort

$array = array('a' => 'foo', 'b' => 'bar', 'c' => 'baz');
arsort($array); // Use for descending sort

// NATURAL SORT
$array = array('10t', '2t', '3t');
natsort($array);    // should be used to prevent "unnatural" sorting order, thus sort() is doing byte-by-byte comparison of strings values. Function saves key values.
print_r($array);
// Outputs:
// Array
// (
//     [1] => 2t
//     [2] => 3t
//     [0] => 10t
// )

// SORT BY KEY
$array = array('a' => 300, 'b' => 100, 'c' => 200);
ksort($array);  // sort array by key; same sort_flags as in sort(), asort() can be used
print_r($array);
// Outputs:
// Array
// (
//     [a] => 300
//     [b] => 100
//     [c] => 200
// )

// CUSTOM SORT
function myCmp ($left, $right)
{
    // Sort according to the length of the value.
    // If the length is the same, sort normally
    $diff = strlen ($left) - strlen ($right);
    if (!$diff) {
        return strcmp ($left, $right);
    }
    return $diff;
}

$array = array ('three', '2two', 'one', 'two');
usort($array, 'myCmp');     // Sort an array by values using a user-defined comparison function
print_r($array);
// Outputs:
// Array
// (
//     [0] => one
//     [1] => two
//     [2] => 2two
//     [3] => three
// )
// All key-value associations are lost and renumbered just like in sort() function do
// Use uasort() to preserve key-value associations. uksort() can be used for user defined sort by key.

// ANTI-SORTING
$array = array ('one', 'two', 'three');
shuffle($array);    // Randomizes the order of the elements of the array. The key-value association is lost.
print_r($array);
// Outputs:
// Array
// (
//     [0] => two
//     [1] => three
//     [2] => one
// )
// The result of this script will be different every time

$array = array ('a' => 10, 'b' => 12, 'c' => 13);
$keys = array_keys($array);
shuffle($keys);

foreach ($keys as $key) {
    echo $key . " - " . $array[$key] . "\n";    // Outputs values by randomized keys
}

$array = array ('a' => 10, 'b' => 12, 'c' => 13);
$random_item = array_rand($array);      // Returns random key
$random_items = array_rand($array, 2);  // Returns 2 random keys.