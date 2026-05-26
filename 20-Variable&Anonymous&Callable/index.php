<?php

// ============================================================
// VARIABLE, ANONYMOUS & ARROW FUNCTIONS
// ============================================================


// ============================================================
// VARIABLE FUNCTIONS
// ============================================================
// A string containing a function name can be called as a function
// PHP checks if the string is callable before invoking it

function sum(int|float ...$numbers): int|float
{
    return array_sum($numbers);
}

$x = 'sum'; // string with the function name

// is_callable() checks if a value can be called as a function
if (is_callable($x)) {
    echo $x(1, 2, 3) . '<br />'; // calls sum(1, 2, 3) → 6
} else {
    echo 'x is not callable' . '<br />';
}


// ============================================================
// ANONYMOUS FUNCTIONS (Closures)
// ============================================================
// Functions without a name — assigned to a variable
// Can capture variables from the outer scope using 'use'

$y = 1;

$sum = function (int|float ...$numbers) use (&$y): int|float {
    // &$y — captured by reference, changes affect the outer variable
    $y = 15;
    echo $y . '<br />';
    return array_sum($numbers);
};

echo $sum(1, 2, 3) . '<br />'; // calls the closure → 15, then 6
echo $y . '<br />';             // 15 — outer $y was modified via reference


// ============================================================
// PASSING CLOSURES AS CALLBACKS
// ============================================================
// Functions can accept other functions as arguments (higher-order functions)
// The callable type hint accepts functions, closures, and variable functions

$sumWithCallback = function (callable $callback, int|float ...$numbers): int|float {
    return $callback(array_sum($numbers));
};

// Passing an anonymous function as the callback
echo $sumWithCallback(
    function ($element) {
        return $element * 2; // doubles the total sum
    },
    1, 2, 3, 4               // sum = 10, callback returns 20
) . '<br />';


// ============================================================
// ARROW FUNCTIONS (PHP 7.4+)
// ============================================================
// Shorter syntax for closures — ideal for simple one-line expressions
// Automatically captures variables from the outer scope (no 'use' needed)
// Always returns the expression — no return keyword required

$array  = [1, 2, 3, 4];

// fn($param) => expression
$array2 = array_map(fn($number) => $number * $number, $array);

echo '<pre>';
print_r($array2); // [1, 4, 9, 16]
echo '</pre>';


// ============================================================
// ANONYMOUS vs ARROW — KEY DIFFERENCES
// ============================================================
//
//  Feature               │ Anonymous (function)  │ Arrow (fn)
// ───────────────────────┼───────────────────────┼────────────────────────
//  Outer scope capture   │ explicit — use()      │ automatic
//  Capture by reference  │ use (&$var)           │ not supported
//  Multi-line body       │ yes                   │ no — single expression
//  return keyword        │ required              │ implicit
//  Best for              │ complex logic         │ simple transformations
