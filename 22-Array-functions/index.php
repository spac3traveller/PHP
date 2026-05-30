<?php

require 'helpers.php';

// ============================================================
// ARRAY FUNCTIONS
// ============================================================


// ============================================================
// array_chunk() — SPLIT ARRAY INTO CHUNKS
// ============================================================
// Splits an array into smaller arrays of a given length
// $preserve_keys — if true, keeps the original keys

$items = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5];

prettyPrintArray(array_chunk($items, 1, true));


// ============================================================
// array_combine() — CREATE ARRAY FROM KEYS AND VALUES
// ============================================================
// Creates an associative array using one array as keys
// and another as values — both must have the same length

$array1 = ['a', 'b', 'c'];
$array2 = [1, 2, 3];

prettyPrintArray(array_combine($array1, $array2)); // ['a' => 1, 'b' => 2, 'c' => 3]


// ============================================================
// array_filter() — FILTER ARRAY BY CALLBACK
// ============================================================
// Returns only elements for which the callback returns true
// ARRAY_FILTER_USE_BOTH passes both value and key to the callback
// ARRAY_FILTER_USE_KEY  passes only the key
// Default (0)           passes only the value

$array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

$even = array_filter($array, fn($number) => $number % 2 === 0, ARRAY_FILTER_USE_BOTH);
$even = array_values($even); // reindexes keys after filtering

prettyPrintArray($even);


// ============================================================
// array_keys() — GET ARRAY KEYS
// ============================================================
// Without $search_value — returns all keys
// With $search_value    — returns only keys matching that value
// $strict = true        — uses strict comparison (===)

$array = ['a' => 1, 'b' => 10, 'c' => 3, 'd' => 4, 'e' => '10'];

$keys = array_keys($array, 10, true); // strict: '10' (string) won't match
prettyPrintArray($keys);              // only 'b' matches int 10


// ============================================================
// array_map() — APPLY CALLBACK TO ARRAY ELEMENTS
// ============================================================
// Returns a new array with the callback applied to each element
// Passing multiple arrays calls the callback with one element from each
// Note: with multiple arrays, keys are NOT preserved

$array1 = ['a' => 1, 'b' => 2, 'c' => 3];
$array2 = ['a' => 4, 'b' => 5, 'c' => 6];

$result = array_map(fn($n1, $n2) => $n1 * $n2, $array1, $array2);
prettyPrintArray($result); // [4, 10, 18]


// ============================================================
// array_merge() — MERGE MULTIPLE ARRAYS
// ============================================================
// Merges arrays into one — numeric keys are reindexed
// String keys from later arrays overwrite earlier ones

$array1 = [1, 2, 3];
$array2 = [4, 5, 6];
$array3 = [7, 8, 9];

prettyPrintArray(array_merge($array1, $array2, $array3)); // [1, 2, 3, 4, 5, 6, 7, 8, 9]


// ============================================================
// array_reduce() — REDUCE ARRAY TO A SINGLE VALUE
// ============================================================
// Iterates over the array, accumulating a single result
// $initial sets the starting value of the accumulator

$invoicedItems = [
    ['name' => 9.99,  'quantity' => 3, 'desc' => 'Item1'],
    ['name' => 29.99, 'quantity' => 1, 'desc' => 'Item2'],
    ['name' => 149,   'quantity' => 1, 'desc' => 'Item3'],
    ['name' => 14.99, 'quantity' => 2, 'desc' => 'Item4'],
    ['name' => 4.99,  'quantity' => 4, 'desc' => 'Item5'],
];

$total = array_reduce(
    $invoicedItems,
    fn($carry, $item) => $carry + $item['name'] * $item['quantity'],
    500 // initial value — starts accumulator at 500
);

echo $total . '<br />';


// ============================================================
// array_search() — SEARCH FOR A VALUE AND RETURN ITS KEY
// ============================================================
// Returns the key of the first matching element, or false if not found
// $strict = true — uses strict comparison (===)
// WARNING: use strict comparison with === to avoid false positives
//          array_search returning key 0 (falsy) looks like false

$array = ['a', 'b', 'c', 'D', 'E', 'ab', 'cd', 'b', 'd'];

$key = array_search('a', $array);
var_dump($key); // int(0)

// Bug-prone: key 0 is falsy — use === false instead of == false
if ($key === false) {
    echo 'Not found' . '<br />';
}

// in_array() — checks if a value exists without returning the key
if (in_array('a', $array)) {
    echo 'Found' . '<br />';
}


// ============================================================
// array_diff() vs array_diff_assoc()
// ============================================================
// array_diff()       — compares VALUES only
// array_diff_assoc() — compares both VALUES and KEYS
// Returns elements from $array1 not present in the other arrays

$array1 = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5];
$array2 = ['f' => 4, 'g' => 5, 'i' => 6, 'j' => 7, 'k' => 8];
$array3 = ['l' => 3, 'm' => 9, 'n' => 10];

prettyPrintArray(array_diff($array1, $array2, $array3));       // values not in $array2 or $array3
prettyPrintArray(array_diff_assoc($array1, $array2, $array3)); // key+value pairs not in others


// ============================================================
// SORTING FUNCTIONS
// ============================================================
// asort()  — sorts by VALUE, preserves keys
// ksort()  — sorts by KEY,   preserves values
// usort()  — sorts by custom callback — does NOT preserve keys
// arsort() — sorts by VALUE descending, preserves keys
// krsort() — sorts by KEY   descending

$array = ['d' => 3, 'b' => 1, 'c' => 4, 'a' => 2];

prettyPrintArray($array);        // original

asort($array);                   // sort by value → b:1, a:2, d:3, c:4
prettyPrintArray($array);

ksort($array);                   // sort by key → a:2, b:1, c:4, d:3
prettyPrintArray($array);

usort($array, fn($a, $b) => $b <=> $a); // custom sort descending by value
prettyPrintArray($array);


// ============================================================
// ARRAY DESTRUCTURING
// ============================================================
// Extract values from an array into individual variables
// Works with nested arrays too

$array = [1, 2, [3, 4]];

[$a, $b, [$c, $d]] = $array;

echo $a . $b . $c . $d . '<br />'; // 1234

// Skipping elements
[, $second, ] = [10, 20, 30];
echo $second . '<br />'; // 20

// With associative arrays
['name' => $name, 'age' => $age] = ['name' => 'Tiago', 'age' => 30];
echo $name . ' — ' . $age . '<br />';
