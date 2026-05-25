<?php

// ============================================================
// INTEGERS
// ============================================================
// Size depends on the platform (32 or 64 bits)

echo PHP_INT_MAX . '<br />'; // maximum integer value
echo PHP_INT_MIN . '<br />'; // minimum integer value


// ============================================================
// NUMERIC NOTATIONS
// ============================================================
// PHP supports multiple bases for defining integers

$base10      = 5;     // decimal     — base 10 (normal)
$hexadecimal = 0x5;   // hexadecimal — prefix 0x
$octal       = 05;    // octal       — prefix 0
$binary      = 0b101; // binary      — prefix 0b

echo $base10      . '<br />';
echo $hexadecimal . '<br />';
echo $octal       . '<br />';
echo $binary      . '<br />';


// ============================================================
// INTEGER OVERFLOW
// ============================================================
// When an int exceeds PHP_INT_MAX, PHP automatically converts it to float

$intOverflow = PHP_INT_MAX + 1;
echo $intOverflow . '<br />';
var_dump($intOverflow); // float
echo '<br />';


// ============================================================
// TYPE CASTING TO INT
// ============================================================

$casting = (int) null; // null → 0
var_dump(is_int($casting)); // bool(true)
echo '<br />';


// ============================================================
// NUMERIC SEPARATOR (PHP 7.4+)
// ============================================================
// The underscore can be used to improve readability of large numbers

$x = 2_000_000_000; // equivalent to 2000000000
var_dump($x);
