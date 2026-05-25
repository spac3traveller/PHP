<?php

// ============================================================
// EXPRESSIONS
// ============================================================
// An expression is anything that has a value — the fundamental
// building block of PHP. If it produces a value, it is an expression.


// ============================================================
// LITERAL EXPRESSIONS
// ============================================================
// The simplest value — a constant or variable

$x = 5;       // 5 is a literal expression
$y = 'hello'; // 'hello' is a literal expression
$z = true;    // true is a literal expression


// ============================================================
// ARITHMETIC EXPRESSIONS
// ============================================================

$a = 10 + 5;  // 15
$b = 10 - 5;  // 5
$c = 10 * 5;  // 50
$d = 10 / 5;  // 2
$e = 10 % 3;  // 1  — modulo (remainder of division)
$f = 10 ** 2; // 100 — exponentiation

echo $a . '<br />';
echo $f . '<br />';


// ============================================================
// COMPARISON EXPRESSIONS
// ============================================================
// Always return bool (true or false)

var_dump(5 == '5');   // true  — equal in value (with type coercion)
var_dump(5 === '5');  // false — equal in value AND type (no coercion)
var_dump(5 != 3);     // true  — not equal in value
var_dump(5 !== '5');  // true  — not equal in value OR type
var_dump(5 > 3);      // true
var_dump(5 < 3);      // false
var_dump(5 >= 5);     // true
var_dump(5 <= 4);     // false
echo '<br />';

// Spaceship operator — returns -1, 0 or 1
// useful for sorting
var_dump(1 <=> 2);  // int(-1) — left is smaller
var_dump(2 <=> 2);  // int(0)  — equal
var_dump(3 <=> 2);  // int(1)  — left is greater
echo '<br />';


// ============================================================
// LOGICAL EXPRESSIONS
// ============================================================
// Combine boolean conditions

$age      = 25;
$hasId    = true;
$isMember = false;

var_dump($age > 18 && $hasId);          // true  — AND: both true
var_dump($age > 18 || $isMember);       // true  — OR: at least one true
var_dump(!$isMember);                   // true  — NOT: inverts the value
var_dump($age > 18 and $hasId);         // true  — AND alternative (lower precedence)
var_dump($age > 18 or $isMember);       // true  — OR alternative (lower precedence)
echo '<br />';


// ============================================================
// ASSIGNMENT EXPRESSIONS
// ============================================================
// The assignment itself is an expression — it returns the assigned value

$n = 10;        // assigns 10 and the expression evaluates to 10
$n += 5;        // $n = $n + 5  → 15
$n -= 3;        // $n = $n - 3  → 12
$n *= 2;        // $n = $n * 2  → 24
$n /= 4;        // $n = $n / 4  → 6
$n %= 4;        // $n = $n % 4  → 2
$n **= 3;       // $n = $n ** 3 → 8

$str  = 'Hello';
$str .= ' World'; // concatenation — 'Hello World'

echo $n   . '<br />';
echo $str . '<br />';


// ============================================================
// INCREMENT / DECREMENT EXPRESSIONS
// ============================================================

$i = 5;
var_dump($i++); // int(5)  — returns BEFORE incrementing (post-increment)
var_dump($i);   // int(6)  — now it has been incremented
var_dump(++$i); // int(7)  — increments BEFORE returning (pre-increment)
var_dump($i--); // int(7)  — returns BEFORE decrementing
var_dump($i);   // int(6)
echo '<br />';


// ============================================================
// CONDITIONAL EXPRESSIONS
// ============================================================

$score = 75;

// Ternary — compact form of if/else
$result = $score >= 50 ? 'approved' : 'failed';
echo $result . '<br />';

// Elvis operator (?:) — returns the left side if truthy, otherwise the right
$name  = '';
$label = $name ?: 'Anonymous'; // '' is falsy → 'Anonymous'
echo $label . '<br />';

// Null coalescing (??) — returns the left side if not null
$username = null;
$display  = $username ?? 'Guest'; // null → 'Guest'
echo $display . '<br />';

// Chaining null coalescing
$config  = null;
$default = null;
$value   = $config ?? $default ?? 'fallback';
echo $value . '<br />';


// ============================================================
// FUNCTION EXPRESSIONS
// ============================================================
// A function call is also an expression — it returns a value

$length = strlen('Hello World'); // returns 11
$upper  = strtoupper('hello');   // returns 'HELLO'

echo $length . '<br />';
echo $upper  . '<br />';


// ============================================================
// OPERATOR PRECEDENCE
// ============================================================
// Defines the order in which expressions are evaluated
// Use parentheses to make the intent explicit

$result = 2 + 3 * 4;        // 14 — * has precedence over +
$result = (2 + 3) * 4;      // 20 — parentheses force the order
var_dump($result);
