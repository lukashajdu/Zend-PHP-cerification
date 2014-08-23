<?php
/**
 * String Basics
 *
 * @author: Lukas Hajdu
 */

/**
 * GENERIC FORMATTING
 *
 * Copyright © 2000 Lukas Hajdu <me@lukashajdu.com>
 * This work is free. You can redistribute it and/or modify it under the
 * terms of the Do What The Fuck You Want To Public License, Version 2,
 * as published by Sam Hocevar. See the COPYING file for more details.
 */

// VARIABLE INTERPOLATION
$who = "World";
echo "Hello $who\n";    // Outputs: "Hello World" followed by a newline
echo 'Hello $who\n';    // Outputs: "Hello $who\n"

echo print('Hello World!');     // Outputs: "Hello World!1"; print always returns int(1)
echo printf('Hello World!');    // Outputs: "Hello World!12"; print always returns length of string

$who = 'other';
$names = array ('Tesla', 'Einstein', 'Maxwell');
echo "Only a life lived for {$who}s is a life worthwhile.";   // Outputs: "Only a life lived for others is a life worthwhile."; braces help append a hard-coded letter 's'
echo "Citation: {$names[1]}[1920]"; // Outputs: "Citation: Einstein[1920]"; without braces, the parser would interpret $names[1][1920], which is string on position 1920 of the array value with index 1
echo $names[1][2];  // Outputs: 'n'; letter on position 2 of the string 'Einstein'; individual characters of a string can be accessed as if they were members of an array.

// ESCAPING LITERAL VALUES
echo 'This is \'my\' string'; // Outputs: "This is 'my' string"; escaping single-quote strings

$variable = 10;
echo "The value of \$a is \"$variable\"."; // Outputs: The value of $a is "10"; escaping dollar sign and double-quoted string

echo "Here’s a literal brace + dollar sign: {\$";   // Outputs: "Here's a literal brace + dollar sign: {$"; Brace cannot be escaped
echo "Here’s a literal brace + dollar sign: \{$"; // Outputs: "Here's a literal brace + dollar sign: \{$"; un-escaped dollar sign
// echo "Here’s a literal brace + dollar sign: {$"; // Outputs: Parse error

// SUBSTRINGS
substr("abcdef", 1);    // Returns: "bcdef"; starts at position 1; counted from 0
substr("abcdef", -1);   // Returns: "f"; starts character from the end of string
substr("abcdef", -2);   // Returns: "ef"

substr("abcdef", 0, 0);     // Returns: ""; empty string
substr("abcdef", 0, 2);     // Returns: "abcde"; limited with legth of the string
substr("abcdef", 0, -2);     // Returns: "abcd"; length omitted from end of the string
substr("abcdef", 4, -4);    // Returns: false
substr("abcdef", 2, -1);    // Returns: "cde"

// LOCATING STRINGS
strpos('Find needle in haystack', 'needle');    // Returns: int(5); position of the first occurrence of a substring in a string
strpos('Find needle in haystack', 'nothing');   // Returns: bool(false); false returned when not found
strpos('Find needle in haystack', 'F');         // Returns: int(0); need to use identical operator (===) for comparison
strpos('123123', '123');                        // Returns: int(0);
strpos('123123', '123', 1);                     // Returns: int(3); starts to find at specific position

var_dump(strpos('Find needle in haystack', 'F') == false);  // Output: bool(true); beacause the 'F' is on position 0
var_dump(strpos('Find needle in haystack', 'F') === false); // Output: bool(false); identical operator need to be used for comparison

strpos('Find needle in haystack', 'Needle');    // Returns: bool(false); strpos() is case-sensitive
stripos('Find needle in haystack', 'Needle');   // Returns: int(5); case-insensitive location

strrpos('Find needle in haystack', 'a');        // Returns: int(20); position of the last occurance

strstr('Find needle in haystack', 'needle');    // Returns: string(18) "needle in haystack"; returns part of haystack string starting from and including the first occurrence of needle to the end of haystack

// COMPARING STRINGS
var_dump(0 == "0");         // Output: bool(true); comparison including data type conversion
var_dump(0 === "0");        // Output: bool(false); data type check
var_dump('123aa' == 123);   // Outputs: bool(true); beware type-juggling problems with the use of identity operator ===

strcmp('Hello', 'Hello');       // Returns: int(0); Case-sensitive comparison
strcmp('Hello', 'hello');       // Returns: int(-32)

strcasecmp('Hello', 'Hello');   // Returns: int(0); 0 means that strings equal
strcasecmp('Hello', 'hello');   // Returns: int(0); Case-insensitive comparison
strcasecmp('Hell', 'Hello');    // Returns: int(-1); number < 0 means that string1 is less than str2
strcasecmp('Helloo', 'Hello');  // Returns: int(1); number > 0  means that string1 is greater than str2

strncasecmp('Abc123', 'abc', 2);    // Returns: int(0); case-insensitive string comparison of the first n characters
strncasecmp('Abc123', 'abc', 4);    // Returns: int(1); returns < 0 if str1 is less than str2; > 0 if str1 is greater than str2, and 0 if they are equal.

similar_text('Hello', 'Hello'); // Returns: int(5); number of matching chars
similar_text('Hello', 'hello');  // Returns: int(4); number of matching chars

// COUNTING STRINGS
strlen('Hello World!');                     // Returns: int(12); length of the string; binary-safe function - all characters in the string are counted, regardless of their value.

str_word_count('Hello cruel World!');       // Returns: int(3); returns the number of words found
str_word_count('Hello cruel World!', 0);    // Returns: int(3); returns the number of words found
str_word_count('Hello cruel World!', 1);    // Returns: array(3); returns an array containing all the words found inside the string
str_word_count('Hello cruel World!', 2);    // Returns: array(3); returns an associative array, where the key is the numeric position of the word inside the string and the value is the actual word itself

// TRANSLATE CHARACTERS
strtr(123, '1', 'a');   // Returns: "a23"; single character version - bytes (single characters) are replaced
strtr(123, '13', 'one');    // Returns: "o2n";

$trans = array("h" => "-", "hello" => "hi", "hi" => "hello");
strtr("hi all, I said hello", $trans); // Returns: "hello all, I said hi"; multiple-character version; "h" is not picked because there are longer matches

// MATCHING AGAINST MASK
strspn('1122334556abcdef', '12345');    // Returns: int(9); returns the length of the initial segment of subject that contains only characters from mask.
strspn('1122334556abcdef', '123');      // Returns: int(6)
strspn ('1abc234', 'abc', 1, 4);        // Returns: int(3);

strcspn('hello', 'l');          // Returns: int(2); returns the length of initial segment not matching mask
strcspn('hello', 'world');      // Returns: int(2)

// SIMPLE SEARCH AND REPLACE OPERATIONS
str_replace("%body%", "black", "<body text='%body%'>"); // Returns: <body text='black'>; case-sensitive replace
str_ireplace("%BODY%", "black", "<body text='%body%'>"); // Returns: <body text='black'>; case-insensitive replace

str_replace(array("Hello", "World"), array("Ahoj", "Svet"), "Hello World"); // Returns: "Ahoj Svet"
str_replace(array("Hello", "World"), "Bye", "Hello World");     // Returns: "Bye Bye"; both search terms are replaced by the same string

$count = 0;                                                     // Variable initialization
str_ireplace("Hello", "Bye", "Hello, hello, hello!", $count);   // Returns: "Bye, Bye, Bye!"
echo $count;                                                    // Outputs: "3"; number of substitutions made

substr_replace("Hello World", "Reader", 6); // Returns: "Hello Reader"; Replace text within a portion of a string
substr_replace("Hello World", "Reader", 5); // Returns: "HelloReader"
substr_replace("Hello World", "Reader", 4); // Returns: "HellReader"

substr_replace("Hello World", "Reader", 6, 0); // Returns: "Hello ReaderWorld"; length parameter used
substr_replace("Hello World", "Reader", 6, 1); // "Hello Readerorld"
substr_replace("Hello World", "Reader", 6, -2); // "Hello Readerld"

// FORMATTING STRINGS
number_format(120000.05555);        // Returns: string(7) "120,000"; formatted without decimals, but with a comma (",") between every group of thousands.
number_format(120000.05555, 2);     // Returns: string(10) "120,000.06"; formatted with 2 decimals with a dot (".") in front, and a comma (",") between every group of thousands.
number_format(120000.05555, 3, ',', ' '); // Returns: string(11) "120 000,056"; number/decimals/dec_point/thousands_sep

setlocale(LC_MONETARY, "en_US");
echo money_format('%.2n', 120000.05555);    // Returns: "$120,000.06"; Money format depends on set locale
echo money_format('%.2i', 120000.05555);    // Returns: "USD120,000.06"; using the international notation

setlocale(LC_MONETARY, "ja_JP.UTF-8");
echo money_format('%.2n', 120000.05555);    // Returns: "¥120,000.06"; Japan locale
echo money_format('%.2i', 120000.05555);    // Returns: "JPY120,000.06"; using the international notation