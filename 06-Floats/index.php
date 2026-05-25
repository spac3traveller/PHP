<?php

// ============================================================
// FLOATS (Floating Point Numbers)
// ============================================================
// Also known as double or real numbers
// Support exponential notation and numeric separator (PHP 7.4+)

$exponention = 13_000.5; // underscore for readability
var_dump($exponention);
echo $exponention . '<br />';

echo PHP_FLOAT_MAX . '<br />'; // maximum float value
echo PHP_FLOAT_MIN . '<br />'; // minimum positive float value


// ============================================================
// FLOAT IMPRECISION
// ============================================================
// Floats are stored in binary — not all decimals have
// an exact representation, which may cause unexpected results
//
// Use floor() or ceil() to work around the issue

$value = floor((0.1 + 0.7) * 10); // expected: 8, result: 7 without floor()
echo $value . '<br />';

$value = ceil((0.1 + 0.3) * 10); // expected: 4, rounds up
echo $value . '<br />';


// ============================================================
// FLOAT COMPARISON
// ============================================================
// NEVER compare floats with == due to binary imprecision
// Use round() or a tolerance margin (epsilon)

$x = 0.23;
$y = 1 - 0.77; // mathematically equal to 0.23, but binary representation differs

if ($x == $y) {
    echo 'iguais' . '<br />';
} else {
    echo 'diferentes' . '<br />'; // este ramo será executado
}


// ============================================================
// TYPE CASTING TO FLOAT
// ============================================================

$x = 5;
var_dump((float) $x); // int → float: 5 becomes 5.0
echo '<br />';

$y = '15.5a'; // string with non-numeric characters after the number
var_dump((float) $y); // PHP reads up to the first invalid character → 15.5
echo '<br />';
