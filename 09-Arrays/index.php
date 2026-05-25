<?php

// ============================================================
// ARRAYS
// ============================================================
// Arrays in PHP are ordered maps — they can have numeric indices
// (indexed array) or string keys (associative array)


// ============================================================
// INDEXED ARRAYS
// ============================================================

$programmingLanguages = ['PHP', 'JavaScript', 'Python', 'Java', 'C++'];

echo $programmingLanguages[2] . '<br />'; // 'Python' — index starts at 0

// isset() checks whether the index exists AND is not null
var_dump(isset($programmingLanguages[5])); // bool(false)
echo '<br />';

// [] without an index appends to the end of the array (next available index)
$programmingLanguages[] = 'C#';
echo $programmingLanguages[5] . '<br />'; // 'C#'

// Replace a value by index
$programmingLanguages[2] = 'Go';

echo '<pre>';
print_r($programmingLanguages);
echo '</pre>';

// array_push() adds one or more elements to the end
array_push($programmingLanguages, 'Ruby');

echo '<pre>';
print_r($programmingLanguages);
echo '</pre>';


// ============================================================
// ASSOCIATIVE ARRAYS
// ============================================================
// Keys can be strings — useful for structures with semantic meaning

$programmingLanguages = [
    'php'    => '8.5',
    'java'   => '17',
    'python' => [
        'creator'   => 'Guido van Rossum',
        'extension' => '.py',
        'website'   => 'https://www.python.org',
        'versions'  => [
            ['version' => '3.10', 'release-date' => '2022-10-04'],
            ['version' => '3.9',  'release-date' => '2022-04-11'],
        ],
    ],
];


// ============================================================
// array_key_exists() vs isset()
// ============================================================
// array_key_exists() — checks only whether the key exists (even if the value is null)
// isset()            — checks whether the key exists AND the value is not null

var_dump(array_key_exists('python', $programmingLanguages)); // bool(true)
echo '<br />';
var_dump(isset($programmingLanguages['python'])); // bool(true)

// Practical difference:
// $arr = ['key' => null];
// array_key_exists('key', $arr) → true
// isset($arr['key'])            → false  ← null makes isset() return false

echo '<pre>';
print_r($programmingLanguages);
echo '</pre>';

// Access multidimensional arrays by chaining keys
print_r($programmingLanguages['python']['versions'][0]['version']); // '3.10'


// ============================================================
// ADDING ELEMENTS TO AN ASSOCIATIVE ARRAY
// ============================================================

$programmingLanguages['go'] = '1.20'; // literal string key

$newLanguage = 'Rust';
$programmingLanguages[$newLanguage] = '1.69'; // dynamic key via variable

echo '<pre>';
print_r($programmingLanguages);
echo '</pre>';


// ============================================================
// KEY CASTING
// ============================================================
// PHP automatically converts key types:
//   true/false → 1/0
//   float      → int (decimal part truncated)
//   '1'        → 1 (numeric string → int)
// Duplicate keys after conversion: the last value overwrites the previous one

$array = [true => 'a', 1 => 'b', '1' => 'c', 1.8 => 'd'];
// true → 1, '1' → 1, 1.8 → 1 — all the same key, only 'd' remains
echo '<pre>';
print_r($array);
echo '</pre>';


// ============================================================
// EXPLICIT NUMERIC INDICES
// ============================================================
// If you define an index manually, the next [] continues from there

$array = ['a', 'b', 50 => 'c', 'd'];
// indices: 0 => 'a', 1 => 'b', 50 => 'c', 51 => 'd'
echo '<pre>';
print_r($array);
echo '</pre>';


// ============================================================
// TYPE CASTING WITH ARRAYS
// ============================================================
// Any value can be converted to an array with (array)

$string = (array) 'hello';       // ['hello']
$int    = (array) 42;            // [42]
$null   = (array) null;          // []
$object = (array) new stdClass(); // converts properties to keys

echo '<pre>';
print_r($string);
print_r($int);
print_r($null);
echo '</pre>';
