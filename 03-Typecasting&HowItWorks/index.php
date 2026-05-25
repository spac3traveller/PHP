<?php

// ============================================================
// TYPING IN PHP
// ============================================================
// PHP is dynamically typed (weakly typed):
//   - a variable's type is determined at runtime
//   - the type can change during execution
//
// Strongly typed languages:
//   - the type is determined at compile time and cannot change


// ============================================================
// SCALAR TYPES
// ============================================================
// Store a single value

$completed = true;       // bool  — true or false
$score     = 10;         // int   — integer, no decimal
$price     = 9.99;       // float — number with decimal
$greeting  = 'Hello World'; // string — text

echo $completed . '<br />';
echo $score     . '<br />';
echo $price     . '<br />';
echo $greeting  . '<br />';

// gettype() returns the type as a string
echo gettype($score) . '<br />';

// var_dump() shows the type and value
var_dump($completed);


// ============================================================
// COMPOUND TYPES
// ============================================================

// array — collection of values of any type
$companies = [1, 2, 3, 0, 5, -9.2, 'A', 'b', true];
print_r($companies);

// object   — instance of a class
// callable — function or method that can be invoked
// iterable — array or object that implements Traversable


// ============================================================
// SPECIAL TYPES
// ============================================================

// resource — reference to an external resource (e.g.: file, DB connection)
// null     — variable with no assigned value


// ============================================================
// TYPE COERCION (Weak Typing)
// ============================================================
// Without strict_types, PHP automatically converts argument types

function sum(int $x, int $y): int
{
    var_dump($x, $y); // shows types after coercion
    echo '<br />';
    return $x + $y;
}

$sum = sum(2.5, '3'); // 2.5 → 2 (int), '3' → 3 (int)
echo $sum . '<br />';
var_dump($sum);
echo '<br />';


// ============================================================
// STRICT TYPES
// ============================================================
// With declare(strict_types=1) at the top of the file, PHP stops
// doing automatic coercion and throws a TypeError if the types
// do not match exactly

// declare(strict_types=1); // must be the first line of the file
//
// function sumStrict(float $x, float $y): float {
//     return $x + $y;
// }
//
// $sum = sumStrict(3, 2); // int is accepted for float even with strict_types
// echo $sum . '<br />';
// var_dump($sum);


// ============================================================
// TYPE CASTING (Explicit Conversion)
// ============================================================
// Forces the conversion of a value to a specific type

$x = (int) '2.5'; // '2.5' (string) → 2 (int), the decimal part is truncated
var_dump($x);
