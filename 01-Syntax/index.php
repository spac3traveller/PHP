<?php

// ============================================================
// OUTPUT — echo vs print
// ============================================================

// echo: accepts multiple arguments separated by commas, with no return value
echo 'echo simples' . '<br>';
echo ('echo com parênteses') . '<br>';
echo 'Hello', ' ', 'World', '!' . '<br>';

// Escape single quotes with a backslash
echo 'Joe\'s Invoice' . '<br>';

// Double quotes allow variable interpolation (see below)
echo "echo com aspas duplas" . '<br>';

// print: similar to echo but always returns 1
// This allows it to be used in expressions (e.g.: echo print '...')
echo print 'print retorna 1️⃣';
echo '<br>';
print('print com parênteses') . '<br>';


// ============================================================
// VARIABLES
// ============================================================
// - Case sensitive ($name !== $Name)
// - Start with $ followed by a letter or underscore
// - No special characters
// - $this is reserved
// - By default, assigned by value (copy)

$name = 'Joe';
echo $name . '<br>';

// Assignment by value — $y is an independent copy of $x
$x = 1;
$y = $x;
$x = 3;
echo $y . '<br>'; // prints 1 (was not affected by the change to $x)

// Assignment by reference — $z points to the same value as $i
$i = 1;
$z = &$i;
$i = 3;
echo $z . '<br>'; // prints 3 (they share the same value)


// ============================================================
// INTERPOLATION AND CONCATENATION
// ============================================================

$firstName = 'Tiago';

// Simple interpolation (inside double quotes)
echo "Hello $firstName" . '<br>';

// Interpolation with curly braces — useful when the variable is adjacent to text
echo "Hello {$firstName}" . '<br>';

// Concatenation with the . operator
echo "Hello " . $firstName . '<br>';
