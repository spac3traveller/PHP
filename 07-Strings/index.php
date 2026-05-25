<?php

// ============================================================
// STRINGS
// ============================================================
// Single quotes — no interpolation, more performant
// Double quotes — allows variable interpolation and special characters (\n, \t, etc.)

$firstName = 'John';
$lastName  = "{$firstName} Doe"; // interpolation with curly braces
echo $lastName . '<br />';


// ============================================================
// CHARACTER ACCESS (index like array)
// ============================================================
// Positive indices start at 0 (from the left)
// Negative indices start at -1 (from the right)

echo $firstName[1]  . '<br />'; // 'o' — second character
echo $firstName[-2] . '<br />'; // 'h' — second from the end


// ============================================================
// CHARACTER MUTATION
// ============================================================
// It is possible to change an individual character by its index

$firstName[1] = 'O'; // 'John' → 'JOhn'
echo $firstName . '<br />';


// ============================================================
// HEREDOC
// ============================================================
// Syntax for multiline strings with variable interpolation
// The closing identifier must be at the start of the line, with no spaces

$x = 1;
$y = 2;

$text = <<<TEXT
line1 $x
line2 $y
line3
TEXT;

echo nl2br($text); // nl2br() converts \n to <br /> for display in the browser


// ============================================================
// NOWDOC
// ============================================================
// Identical to Heredoc but WITHOUT interpolation — equivalent to single quotes
// The opening identifier is wrapped in single quotes: <<<'TEXT'

$text = <<<'TEXT'
line1 $x
line2 $y
line3
TEXT;

echo '<br />';
echo nl2br($text); // $x and $y are printed literally, without substitution
