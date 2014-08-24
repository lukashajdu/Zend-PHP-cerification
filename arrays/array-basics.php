<?php
/**
 * ARRAY BASICS
 *
 * Copyright © 2014 Lukas Hajdu <me@lukashajdu.com>
 * This work is free. You can redistribute it and/or modify it under the
 * terms of the Do What The Fuck You Want To Public License, Version 2,
 * as published by Sam Hocevar. See the COPYING file for more details.
 */

$array = array();   // creating empty array
$array = [];        // creating empty array

$array = array(1, 2, 3);                       // auto-incremented keys
$array = array('a' => 1, 'b' => 2, 'c' => 3);  // alphanumeric keys
$array = array('a' => 1, 'b' => 2, 3, 4);      // mix of keys

$array['a'] = 1;    // Other method of defining array; same as $array = array('a' => 1);
$array[] = 1;       // [] provides a much higher degree of control than array()

// PRINTING ARRAYS
$array = array('Hello', 'World');
echo $array;        // Outputs: "Array"; echo has limitation to displaying content of arrays
print_r($array);    // recursively print out the contents of composite value as a string
var_dump($array);   // recursively print out the contents of composite value with data types of each value; capable of outputting the value of more than one variable at the same time

// ARRAY KEYS
$a = array(2 => 5); // The keys of an array do not determine the order of its elements
$a[] = 10;          // When an element is added to an array without specifying a key, PHP automatically assigns a numeric one that is equal to the greatest numeric key already in existence in the array, plus one

// MULTI-DIMENSIONAL ARRAYS
$multi_array = array(                               // capable of storing practically any value, including other arrays
    array('foo', 'bar'),
    array('cat', 'dog')
);

// UNRAVELLING ARRAYS
list($month, $day, $year) = array('January', '1',  '2014'); // assigning array values to individual variables