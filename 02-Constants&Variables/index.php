<?php

// ============================================================
// CONSTANTS
// ============================================================
// - Case sensitive
// - Immutable (cannot be changed after definition)
// - Convention: names in CAPS_SNAKE_CASE
// - Globally accessible without the $ symbol


// ============================================================
// define() vs const
// ============================================================
// define() — evaluated at runtime, can be used in any context
// const    — evaluated at compile time, cannot be used inside control structures

define('PI', 3.14159);
echo PI . '<br>';

// defined() checks whether a constant exists — returns 1 (true) or '' (false)
echo defined('PI') . '<br>';

const E = 2.71828;
echo E . '<br>';


// ============================================================
// define() INSIDE CONTROL STRUCTURES
// ============================================================
// const does not work here — only define() is allowed

if (true) {
    define('STATUS_UNPAID', 'unpaid');
}


// ============================================================
// DYNAMIC CONSTANTS
// ============================================================
// define() accepts expressions in the constant name

$paid = 'PAID';
define('STATUS_' . $paid, 4); // creates STATUS_PAID with value 4
echo STATUS_PAID . '<br>';


// ============================================================
// MAGIC CONSTANTS
// ============================================================
// Change depending on the context where they are used

echo __FILE__ . '<br>'; // absolute path of the current file
echo __LINE__ . '<br>'; // current line number
echo __DIR__  . '<br>'; // directory of the current file


// ============================================================
// PHP PREDEFINED CONSTANTS
// ============================================================

echo PHP_VERSION . '<br>'; // installed PHP version
echo PHP_OS      . '<br>'; // operating system where PHP runs


// ============================================================
// VARIABLE VARIABLES
// ============================================================
// $var contains the name of another variable
// $$var accesses the variable whose name is stored in $var

$var  = 'name';
$$var = 'John'; // equivalent to $name = 'John'

echo $var, $name . '<br>';       // prints: name, John
echo "$var, {$$var}" . '<br>';   // prints: name, John
