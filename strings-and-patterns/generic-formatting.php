<?php
/**
 * GENERIC FORMATTING
 *
 * Copyright © 2000 Lukas Hajdu <me@lukashajdu.com>
 * This work is free. You can redistribute it and/or modify it under the
 * terms of the Do What The Fuck You Want To Public License, Version 2,
 * as published by Sam Hocevar. See the COPYING file for more details.
 */

// FORMATTING FUNCTIONS
var_dump(sprintf('[Hello %s]', 'World'));   // Outputs: string(13) "[Hello World]"; returns string
var_dump(printf('[Hello %s]', 'World'));    // Outputs: [Hello World]int(13); prints string and returns string length
var_dump(vprintf("[%04d-%02d-%02d]", array(1988, 8, 1)));   // Outputs: [1988-08-01]int(12); prints string and returns string length
var_dump(vsprintf("[%04d-%02d-%02d]", array(1988, 8, 1)));  // Outputs: string(12) "[1988-08-01]"; As sprint() with arg in array

var_dump(sscanf('Hello World', 'Hello %s')); // Outputs: string(5) "World", input analog of printf()
list($month, $day, $year) = sscanf('January 01 2000', '%s %d %d');

// ARGUMENT SWAPPING
$s=$d='';
printf("There are %d monkeys on the %s.\n", 5, 'Tree');     // Outputs: "There are 5 monkeys on the Tree."
printf("%2$s contains %1$d monkeys.\n", 5, 'tree');         // Outputs: "contains monkeys."; Swapped arguments can be used only with a single quotes
printf('%2$s contains %1$d monkeys.', 5, 'Tree');           // Outputs: "Tree contains 5 monkeys."

// Conversion specification - sign specifier that forces a sign (- or +) to be used on a number
printf("Positive number test: %d \n", 1);       // Outputs: Positive number test: 1
printf("Positive number test: %d \n", +1);      // Outputs: Positive number test: 1
printf("Positive number test: %+d \n", +1);     // Outputs: Positive number test: +1
printf("Negative number test: %-d \n", 1);      // Outputs: Negative number test: 1
printf("Negative number test: %-d \n", -1);     // Outputs: Negative number test: -1

// Conversion specification - padding specifier; basic usage with zero 0 or space (default); alternate padding character to be prefixed with a single quote (')
printf("[%10s]\n", "Test");     // Outputs: [      Test]; number 10 defines length of string; default prefix with a space
printf("[%010s]\n", "Test");    // Outputs: [000000Test]; prefixed with zeros
printf("[%'#10s]\n", "Test");   // Outputs: [######Test]; custom prefix with # character
printf("[%#10s]\n", "Test");    // Outputs: [10s]; wrong format specification
printf("[%'*10s]\n", "T");      // Outputs: [*********T]
printf("[%'*10s]\n", "Te");     // Outputs: [********Te]
printf("[%'*10s]\n", "Tes");    // Outputs: [*******Tes]
printf("[%'*10s]\n", "Test");   // Outputs: [******Test]

// Conversion specification - alignment specifier; says if the result should be left-justified or right-justified (default)
printf("[%-'#10s]\n", "Left");  // Outputs: [Left######]; left-justified string
printf("[%'#10s]\n", "Right");  // Outputs: [#####Right]; right-justified string
printf("[%+'#10d]\n", 1);       // Outputs: [########+1]; justified string with specified sign
printf("[%+-'#10d]\n", 1);      // Outputs: [+1########]
printf("[%-'#10d]\n", 1);       // Outputs: [1#########]
printf("[%'#10d]\n", -1);       // Outputs: [########-1]
printf("[%-'#10d]\n", -1);      // Outputs: [-1########]
printf("[%--'#10d]\n", -1);     // Outputs: [-1########]

// Conversion specification - width specifier
printf("[Day: %d-th of August]\n", 8);      // Outputs: [Day: 8-th of August]
printf("[Day: %02d-th of August]\n", 8);    // Outputs: [Day: 08-th of August]; string width set to 2 and prefixed with 0
printf("[Day: %04d-th of August]\n", 8);    // Outputs: [Day: 0008-th of August]; string width set to 4 and prefixed with 0

// Conversion specification - precision specifier
printf("[%.1s]\n", 0.0001);     // Outputs: [0]; string length for type %s
printf("[%.4s]\n", 0.0001);     // Outputs: [0.00]; string length for type %s
printf("[%.4s]\n", 120.0001);   // Outputs: [120.]; string length for type %s
printf("[%.2d]\n", 0.0001);     // Outputs: [0]; decimal - period truncated
printf("[%.2f]\n", 0.0001);     // Outputs: [0.00]
printf("[%.4f]\n", 0.0001);     // Outputs: [0.0001]
printf("[%.6f]\n", 0.0001);     // Outputs: [0.000100]
printf("[%.f]\n", 0.0001);      // Outputs: [0.000100]

// Conversion specifier - type specifier
printf("[%%b = '%b']\n", 100);      // Outputs: [%b = '1100100']; binary representation
printf("[%%c = '%c']\n", 65);       // Outputs: [%c = 'A']; ascii character, same as chr() function; ASCII 65 is 'A'
printf("[%%d = '%d']\n", 10000);    // Outputs: [%d = '10000']; standard integer
printf("[%%e = '%e']\n", 10000);    // Outputs: [%e = '1.000000e+4']; scientific notation
printf("[%%f = '%f']\n", 12.54);    // Outputs: [%f = '12.540000']; float
printf("[%%f = '%f']\n", 12);       // Outputs: [%f = '12.000000']; float
printf("[%%o = '%o']\n", 12);       // Outputs: [%o = '14']; octal representation
printf("[%%s = '%s']\n", 12.12);    // Outputs: [%s = '12.12']; string representation
printf("[%%x = '%x']\n", 158);      // Outputs: [%x = '9e']; hexadecimal representation (lower-case)
printf("[%%X = '%X']\n", 158);      // Outputs: [%X = '9E']; hexadecimal representation (upper-case)