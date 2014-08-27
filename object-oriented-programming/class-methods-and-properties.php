<?php
/**
 * CLASS METHODS AND PROPERTIES
 *
 * Copyright © 2014 Lukas Hajdu <me@lukashajdu.com>
 * This work is free. You can redistribute it and/or modify it under the
 * terms of the Do What The Fuck You Want To Public License, Version 2,
 * as published by Sam Hocevar. See the COPYING file for more details.
 */

namespace methods;

class b {
    function test() {
        echo "b::test called";
    }
}

class c extends b {
    // Magic __constructor() method is called on each newly-created object;
    // Useful for initializing an object’s properties, or for performing start-up procedures
    function __construct() {
        // __METHOD__ constant is replaced with current class method at compilation time
        echo __METHOD__ . PHP_EOL;
    }
    // PHP 4 style constructor is called when the __construct() method is not found
    function c() {
        // PHP 4 style constructor
    }

    // Overrides method test() in class 'b'
    function test() {
        // Parent method accessed
        parent::test();
        echo ' within ' ,__METHOD__ , PHP_EOL;
    }
}

class d extends c {
    function __construct() {
        // Call parent constructor; parent constructor is not called implicitly if the child class defines a constructor
        parent::__construct();
        echo __METHOD__ . PHP_EOL;
    }
}

class e {
    // Will be called as soon as there are no other references to a particular object, or in any order during the shutdown sequence.
    // Called right before an object is destroyed; works like a mirror image of __construct();
    // Useful for performing cleanup procedures; Occurs when all references to an object are gone;
    // Will be called even if script execution is stopped using exit().
    function __destruct() {
        // Parent destructor can be explicitly called by parent::__destruct()
        echo 'Destroying: ' . __CLASS__ . PHP_EOL;
        // Throwing exception from destructor causes a fatal error.
    }
}

$c = new c();
$d = new d();
$e = new e();

// Outputs: "methods\c::__construct" and new line; constructor called from 'c' class
// Outputs: "methods\c::__construct" and new line; parent constructor called from 'd' class
// Outputs: "methods\d::__construct" and new line; constructor called from 'd' class

$c->test(); // Outputs: "b::test called within methods\c::test"


// VISIBILITY - often referred to as "PPP"
class Food {
    // Variables within the class scope are called properties
    // Properties are declared in PHP using one of the PPP operators, followed by their name.
    public $fruit = 'banana';           // public - can be accessed from any scope
    protected $vegetable = 'carrot';    // protected - can only be accessed from within the class where it is defined and its descendants
    private $dairy = 'milk';            // private - can only be accessed from within the class where it is defined.

    // Variable cannot be initialized by calling function
    //public $food = $this->getFood();  This is not permitted; causes "Parse error"

    function __construct() {
        echo __METHOD__ . PHP_EOL;
        print_r(get_object_vars($this));
    }

    // final method is accessible from any scope, but cannot be overridden in descendant classes.
    final function getFood() {
        echo __METHOD__ . PHP_EOL;
        print_r(get_object_vars($this));
    }
}

class Kitchen extends Food {
    function __construct() {
        echo __METHOD__ . PHP_EOL;
        print_r(get_object_vars($this));
    }
}

// Classes that are declared as final cannot be extended.
final class Stuff {
    protected $stuff = array('fork', 'spoon', 'knife');

    function __construct() {
        echo __METHOD__ . PHP_EOL;
        $foo = new Food();
        print_r(get_object_vars($foo));
    }

    function getCutlery() {
        echo 'Cutlery: ', implode(', ', $this->stuff), PHP_EOL;
    }
}

new Food();
// Outputs:
// methods\Food::__construct
// Array
// (
//     [fruit] => banana
//     [vegetable] => carrot
//     [dairy] => milk
// )

new Kitchen();
// Outputs:
// methods\Kitchen::__construct
// Array
// (
//     [fruit] => banana
//     [vegetable] => carrot
// )

$stuff = new Stuff();
// Outputs:
// methods\Stuff::__construct
// methods\Food::__construct
// Array
// (
//     [fruit] => banana
//     [vegetable] => carrot
//     [dairy] => milk
// )
// Array
// (
//     [fruit] => banana
// )

$stuff->getCutlery();   // Outputs: "Cutlery: fork, spoon, knife" and new line

// Outputs: "Destroying: e" and new line