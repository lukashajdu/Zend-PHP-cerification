<?php
/**
 * OOP FUNDAMENTALS
 *
 * Copyright © 2014 Lukas Hajdu <me@lukashajdu.com>
 * This work is free. You can redistribute it and/or modify it under the
 * terms of the Do What The Fuck You Want To Public License, Version 2,
 * as published by Sam Hocevar. See the COPYING file for more details.
 */

namespace fundamentals;

class a {
    // Functions in class scope are called methods. Methods are declared just like traditional functions
    function test() {
        echo "a::test called\n";
    }

    function func() {
        echo "a::func called\n";
    }

    function callTest() {
        // $this - special variable defined within an object's scope, always points to the object itself
        $this->test();
    }
}

class b extends a {
    // Overrides method test() in class 'a'
    function test() {
        echo "b::test called\n";
    }
}

class c extends b {
    // Overrides method test() in class 'b'
    function test() {
        // Parent method accessed
        parent::test();
    }
}

// In PHP 5, an object is always passed by reference (by handle in reality)
$a = new a();
$b = new b();
$c = new c();

// From outside the scope of a class, its methods are called using the indirection operator '->'
$a->test();     // Outputs: "a::test called" and a new line
$a->callTest(); // Outputs: "a::test called" and a new line
$b->test();     // Outputs: "b::test called" and a new line
$b->func();     // Outputs: "a::func called" and a new line
$c->test();     // Outputs: "b::test called" and a new line
