<?php

// ============================================================
// OPERATORS IN PHP
// ============================================================


// ============================================================
// ARITHMETIC (+ - * / % **)
// ============================================================

$x = -10;
$y = 2;

var_dump($x + $y);  // int(-8)  — addition
var_dump($x - $y);  // int(-12) — subtraction
var_dump($x * $y);  // int(-20) — multiplication
var_dump($x / $y);  // int(-5)  — division
var_dump($x % $y);  // int(0)   — modulo (remainder of division)
var_dump($x ** $y); // int(100) — exponentiation
echo '<br />';

// Unary negation — converts a numeric string to a negative int/float
$x = '15';
var_dump(-$x); // int(-15)
echo '<br />';

// fdiv() — division by zero returns INF, -INF or NAN instead of an error
$x = 10;
$y = 0;
var_dump(fdiv($x, $y)); // float(INF)
echo '<br />';

// fmod() — modulo for floats (% truncates to int)
$x = 10.5;
$y = 2.9;
var_dump(fmod($x, $y)); // float(1.8)
echo '<br />';


// ============================================================
// ASSIGNMENT (= += -= *= /= %= **=)
// ============================================================

// Chained assignment — $x and $y both get 10
$x = $y = 10;
var_dump($x); // int(10)
echo '<br />';

// Assignment inside an expression
// $y receives 10, then $x receives ($y + 5) = 15
$x = (($y = 10) + 5);
var_dump($x, $y); // int(15), int(10)
echo '<br />';

// Compound assignment operators
$x += $x; // $x = $x + $x → 30
var_dump($x);
echo '<br />';


// ============================================================
// STRING (. .=)
// ============================================================

$x = 'Hello';
echo $x . ' World' . '<br />';  // simple concatenation — $x is not changed
echo $x .= ' World' . '<br />'; // .= concatenates and reassigns — $x becomes 'Hello World'


// ============================================================
// COMPARISON (== === != <> !== < > <= >= <=> ?? ?:)
// ============================================================

$x = 5;
$y = '5';

var_dump($x == $y);   // true  — equal in value (type coercion)
var_dump($x === $y);  // false — equal in value AND type
var_dump($x != $y);   // false — not equal in value
var_dump($x <> $y);   // false — alias for !=
var_dump($x !== $y);  // true  — not equal in value OR type
var_dump($x < $y);    // false
var_dump($x > $y);    // false
var_dump($x <= $y);   // true
var_dump($x >= $y);   // true
var_dump($x <=> $y);  // int(0) — spaceship: -1 smaller, 0 equal, 1 greater

// ?? — null coalescing: returns the left side if not null
var_dump($x ?? $y);   // int(5) — $x is not null, returns $x

// ?: — elvis: returns the left side if truthy, otherwise the right
var_dump($x ?: $y);   // int(5) — $x is truthy, returns $x
echo '<br />';


// ============================================================
// ERROR CONTROL (@)
// ============================================================
// @ suppresses errors/warnings — use sparingly, it makes debugging harder

$x = @file('file.txt'); // without @ it would emit a warning if the file does not exist


// ============================================================
// INCREMENT / DECREMENT (++ --)
// ============================================================

$x = 5; $y = 5; $z = 5; $w = 5;

echo ++$x . '<br />'; // 6 — pre-increment:  increments BEFORE returning
echo $y++ . '<br />'; // 5 — post-increment: returns BEFORE incrementing
echo --$z . '<br />'; // 4 — pre-decrement:  decrements BEFORE returning
echo $w-- . '<br />'; // 5 — post-decrement: returns BEFORE decrementing


// ============================================================
// LOGICAL (&& || ! and or xor)
// ============================================================
// && and || have higher precedence than 'and' and 'or'
// Always use && and || to avoid unexpected behaviour

$a = true;
$b = false;

var_dump($a && $b);  // false — both must be true
var_dump($a || $b);  // true  — at least one is true
var_dump(!$a);       // false — negation
var_dump($a xor $b); // true  — one is true but not both
echo '<br />';


// ============================================================
// BITWISE (& | ^ ~ << >>)
// ============================================================
// Operate bit by bit — used in flags, permissions, cryptography

var_dump(6 & 3);  // int(2) — AND:         110 & 011 = 010
var_dump(6 | 3);  // int(7) — OR:          110 | 011 = 111
var_dump(6 ^ 3);  // int(5) — XOR:         110 ^ 011 = 101
var_dump(~6);     // int(-7)— NOT:         inverts all bits
var_dump(6 << 1); // int(12)— shift left:  multiplies by 2
var_dump(6 >> 1); // int(3) — shift right: divides by 2
echo '<br />';


// ============================================================
// ARRAY (+ == === != <> !==)
// ============================================================

$a = ['x' => 1, 'y' => 2];
$b = ['x' => 1, 'y' => 2, 'z' => 3];

var_dump($a + $b);    // union — keeps left-side keys in case of conflict
var_dump($a == $b);   // false — same key/value pairs (regardless of order)
var_dump($a === $b);  // false — same pairs, same types AND same order
var_dump($a != $b);   // true
var_dump($a !== $b);  // true
echo '<br />';


// ============================================================
// EXECUTION (``)
// ============================================================
// Executes operating system commands — equivalent to shell_exec()

$output = `ls -la`;
echo nl2br($output);
echo '<br />';


// ============================================================
// TYPE (instanceof)
// ============================================================
// Checks whether an object is an instance of a class

class User {}
$user = new User();

var_dump($user instanceof User); // bool(true)
echo '<br />';


// ============================================================
// NULLSAFE — PHP 8 (?->)
// ============================================================
// Avoids errors when chaining methods/properties that may be null
// If any part of the chain is null, returns null instead of an error

class Order {
    public ?User $user = null;
}

$order = new Order();
var_dump($order->user?->getName()); // NULL — no error, even if $user is null
