<?php

// ============================================================
// OPERATOR PRECEDENCE AND ASSOCIATIVITY
// ============================================================
// Precedence    — defines WHICH operator is evaluated first
// Associativity — defines the DIRECTION when operators have the same precedence


// ============================================================
// PRECEDENCE
// ============================================================
// Similar to mathematics — multiplication before addition

$result = 2 + 3 * 4;    // 14 — * has higher precedence than +
$result = (2 + 3) * 4;  // 20 — parentheses force the order

echo $result . '<br />';

// More precedence examples
$result = 10 + 2 ** 3;      // 18  — ** before +
$result = true || false && false; // true — && before ||

var_dump($result);
echo '<br />';


// ============================================================
// PRECEDENCE TABLE (from highest to lowest)
// ============================================================
//
//  Level  │ Operators
// ────────┼──────────────────────────────────────────────────
//    1    │ clone new
//    2    │ **
//    3    │ (int) (float) (string) (array) (object) (bool) @ ~ ++ -- -
//    4    │ instanceof
//    5    │ !
//    6    │ * / %
//    7    │ + - .
//    8    │ << >>
//    9    │ < <= > >=
//   10    │ == != === !== <> <=>
//   11    │ &
//   12    │ ^
//   13    │ |
//   14    │ &&
//   15    │ ||
//   16    │ ??
//   17    │ ?:
//   18    │ = += -= *= /= %= **= .= &= |= ^= <<= >>=
//   19    │ yield yield from
//   20    │ print
//   21    │ and
//   22    │ xor
//   23    │ or


// ============================================================
// ASSOCIATIVITY
// ============================================================
// When two operators have the SAME precedence, associativity
// defines whether evaluation goes left to right or right to left
//
// Left  — evaluates from left to right
// Right — evaluates from right to left
// None  — cannot be chained


// LEFT ASSOCIATIVITY — left to right
$result = 10 - 3 - 2;   // (10 - 3) - 2 = 5  (not 10 - (3 - 2) = 9)
$result = 20 / 4 / 2;   // (20 / 4) / 2 = 2.5

var_dump($result);
echo '<br />';


// RIGHT ASSOCIATIVITY — right to left
$result = 2 ** 3 ** 2;  // 2 ** (3 ** 2) = 2 ** 9 = 512  (not (2**3)**2 = 64)

var_dump($result); // int(512)
echo '<br />';

// Assignment is also right associative
$a = $b = $c = 5;       // $c = 5, then $b = $c, then $a = $b
var_dump($a, $b, $c);   // int(5), int(5), int(5)
echo '<br />';


// NON-ASSOCIATIVE — cannot be chained
// $result = 1 < 2 < 3; // error — < is not chainable
// $result = 1 == 1 == 1; // error — == is not chainable


// ============================================================
// COMMON PITFALLS
// ============================================================

// && vs and — same logic but DIFFERENT precedence
$x = true;
$y = false;

$result = $x && $y;     // false — && evaluates before =
var_dump($result);      // bool(false) ✔

$result = $x and $y;    // 'and' has lower precedence than =
// equivalent to: ($result = $x) and $y
// $result gets true (value of $x), the 'and' is ignored for the assignment
var_dump($result);      // bool(true) ← unexpected behaviour!
echo '<br />';

// || vs or — same issue
$result = false || true;    // bool(true)  ✔
$result = false or true;    // bool(false) ← $result receives false first
var_dump($result);
echo '<br />';


// ============================================================
// BEST PRACTICE — use parentheses to make the intent clear
// ============================================================

// Hard to read — relies on memorising the precedence table
$result = $a + $b * $c ** 2 > 10 && !$x || $y;

// Easy to read — explicit intent
$result = (($a + ($b * ($c ** 2))) > 10 && (!$x)) || $y;
