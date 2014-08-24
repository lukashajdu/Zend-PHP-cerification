<?php
/**
 * REGULAR EXPRESSIONS - Perl Compatible Regular Expressions (PCRE)
 *
 * Copyright © 2014 Hello World! <me@lukashajdu.com>
 * This work is free. You can redistribute it and/or modify it under the
 * terms of the Do What The Fuck You Want To Public License, Version 2,
 * as published by Sam Hocevar. See the COPYING file for more details.
 */

// DELIMITERS
preg_match('/[a-zA-z]+/', 'Hello World!');   // Returns: int(1); pattern match; RegExp is always delimited by a starting and ending character
preg_match('/[0-9]+/', 'Hello World!');      // Returns: int(0); pattern doesn't match
preg_match('~[a-zA-z]+~', 'Hello World!');   // Any character can be used for delimiting as long as the beginning and ending delimiter match
preg_match('D[a-zA-z]+D', 'Hello World!');   // Returns: bool(false); error occurred; Delimiter must not be alphanumeric or backslash

// META CHARACTERS
preg_match('/./', 'Hello World!');      // Returns: int(1); (.) match any character; every meta character represents a single character in the matched expression
preg_match('/^/', 'Hello World!');      // Returns: int(1); (^) match the start of the string
preg_match('/$/', 'Hello World!');      // Returns: int(1); ($) match the end of the string
preg_match('/\s/', 'Hello World!');     // Returns: int(1); (\s) match any whitespace character
preg_match('/\d/', 'Hello World!');     // Returns: int(0); (\d) match any digit
preg_match('/\w/', 'Hello World!');     // Returns: int(1); (\w) match any "word" character

preg_match('/\D/', 'Hello World!');     // Returns: int(1); capitalization indicates absence

preg_match('/ca[pt]/', 'My cat');       // Returns: int(1); meta characters can also be expressed using grouping expressions.
preg_match('/ca[pt]/', 'My cap');       // Returns: int(1); should match "cat" and "cap"
preg_match('/ca[p-t]/', 'My cap');      // Returns: int(1); ranges can be defined; should match "cap", "car", "cas" and "cat"

// QUANTIFIERS
preg_match('/\w*/', 'Hello World!');        // Returns: int(1); * indicates that the character can appear zero or more times
preg_match('/\w+/', 'Hello World!');        // Returns: int(1); + indicates that the character can appear one or more times
preg_match('/\w?/', 'Hello World!');        // Returns: int(1); ? indicates that the character can appear zero or one times
preg_match('/\w{2,4}/', 'Hello World!');    // Returns: int(1); {n,m} indicates that the character can appear at least n times, and no more than m

// MATCH WITH SUBPATTERNS AND CAPTURE
$matches = [];  // $matches[0] will contain the text that matched the full pattern, $matches[1] will have the text that matched the first captured parenthesized subpattern, and so on.
preg_match('/^\w+\s\w+/', 'Hello World!', $matches);        // If matches is provided, then it is filled with the results of search.

preg_match('/^(\w+)\s(\w+)/', 'Hello World!', $matches);    // Sub-expressions can be used as capturing patterns
// Returns:
// array(3) {
// [0]=>
//   string(11) "Hello World"
//   [1]=>
//   string(5) "Hello"
//   [2]=>
//   string(5) "World"
// }
// First element of the array contains the entire matched string, the second element (index 1) contains the first captured subpattern,
// and the third element contains the second matched subpattern.

// PERFORMING MULTIPLE MATCHES
preg_match_all ('/(\w)\d/', 'H3llo c4uel w0rld!', $matches);    // allows you to perform multiple matches on a given string based on a single regular expression.

// REPLACE STRINGS
preg_replace('@\[b\](.+)\[/b\]@', '<b>$1</b>', '[b]Make Me Bold![/b]');    // Returns: "<b>Make Me Bold!</b>"; first captured subpattern ($1) replaced
preg_replace(array('@\[b\](.+)\[/b\]@', '@\[i\](.+)\[/i\]@'), array('<b>$1</b>', '<i>$1</i>'), 'This is [b]bold[/b] and this [i]italic[/i]');   // Works with arrays just like str_replace()