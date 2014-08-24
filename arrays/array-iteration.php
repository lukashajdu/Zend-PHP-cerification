<?php
/**
 * ARRAY ITERATION
 *
 * Copyright © 2014 Lukas Hajdu <me@lukashajdu.com>
 * This work is free. You can redistribute it and/or modify it under the
 * terms of the Do What The Fuck You Want To Public License, Version 2,
 * as published by Sam Hocevar. See the COPYING file for more details.
 */

$array = array('foo' => 'bar', 'baz', 'bat' => 2, null => 'bak');

reset($array);                                          // reset the pointer to its initial position
while(key($array) !== null) {                           // loop over an array
    echo key($array) .": " .current($array) . PHP_EOL;  // current - display value of current key
    next($array);                                       // advance an array pointer
}
// Outputs:
// foo: bar
// 0: baz
// bat: 2
// : bak

end($array);                                            // reset array to the bottom of the array
while(key($array) !== null) {                           // back-and-forth loop over an array
    echo key($array) .": " .current($array) . PHP_EOL;
    prev($array);                                       // go back to beginning
}

// EASIER WAY TO ITERATE
$array = array('foo' => 'bar', 'baz', 'bat' => 2, null => 'bak');
foreach($array as $key => $value) {     // foreach operates on a copy of the array itself => changes made to the array inside the loop are not reflected in the iteration
    echo "$key: $value" . PHP_EOL;
}
unset($key, $value);


$array = array(1, 2, 3);
foreach ($array as $key => &$value) {       // value assigned by reference
    $value += 1;                            // modifying the contents of the array
}
unset($key, $value); // Variables should be always unset it is used in by-reference foreach loops

// PASSIVE ITERATION
function uppercase(&$value)
{
    $value = strtoupper($value);
}

$data_to_upper = array('hello', 'world');
array_walk($data_to_upper, 'uppercase');  // Apply a user function to every member of an array
print_r($data_to_upper);                  // Outputs: each array values are transformed to uppercase

$type = array('internal', 'custom');
$format = array(
    array('rss', 'html', 'xml'),
    array('csv', 'json')
);
$map = array_combine($type, $format);       // Creates an array by using one array for keys and another for its values
array_walk_recursive($map, 'uppercase');    // Apply a user function recursively to every member of an array; calls user-defined function on scalar values
print_r($map);                              // Output: each array values are transformed to uppercase, keys ('internal', 'custom') none