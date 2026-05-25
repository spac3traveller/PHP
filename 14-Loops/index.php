<?php

// ============================================================
// LOOPS
// ============================================================
// Loops allow you to execute a block of code repeatedly
// as long as a condition is true


// ============================================================
// WHILE
// ============================================================
// Checks the condition BEFORE each iteration
// If the condition is false from the start, the block never runs

$i = 1;

while ($i <= 5) {
    echo $i . '<br />';
    $i++;
}

// Practical example — read until a condition is met
$attempts = 0;
$maxAttempts = 3;

while ($attempts < $maxAttempts) {
    echo 'Attempt: ' . ($attempts + 1) . '<br />';
    $attempts++;
}


// ============================================================
// DO-WHILE
// ============================================================
// Checks the condition AFTER each iteration
// The block always runs at least once, even if the condition is false

$i = 1;

do {
    echo $i . '<br />';
    $i++;
} while ($i <= 5);

// Difference from while — the block runs even when condition is false
$i = 10;

do {
    echo 'This runs once even though $i > 5: ' . $i . '<br />';
} while ($i <= 5);


// ============================================================
// FOR
// ============================================================
// Best used when the number of iterations is known in advance
// Structure: for (initialisation; condition; increment)

for ($i = 0; $i <= 5; $i++) {
    echo $i . '<br />';
}

// Counting backwards
for ($i = 5; $i >= 0; $i--) {
    echo $i . '<br />';
}

// Multiple expressions in a single for loop
for ($i = 0, $j = 10; $i <= 5; $i++, $j--) {
    echo '$i: ' . $i . ' | $j: ' . $j . '<br />';
}


// ============================================================
// FOREACH
// ============================================================
// Designed specifically for iterating over arrays and objects
// Cannot be used with non-iterable types

$languages = ['PHP', 'JavaScript', 'Python', 'Go'];

// Iterate over values only
foreach ($languages as $language) {
    echo $language . '<br />';
}

// Iterate over keys and values
foreach ($languages as $index => $language) {
    echo $index . ': ' . $language . '<br />';
}

// Iterating over an associative array
$user = [
    'name'  => 'Tiago',
    'email' => 'tiago@example.com',
    'role'  => 'admin',
];

foreach ($user as $key => $value) {
    echo $key . ': ' . $value . '<br />';
}

// Iterating over a multidimensional array
$users = [
    ['name' => 'Tiago', 'age' => 30],
    ['name' => 'John',  'age' => 25],
    ['name' => 'Jane',  'age' => 28],
];

foreach ($users as $user) {
    echo $user['name'] . ' — ' . $user['age'] . '<br />';
}


// ============================================================
// LOOP CONTROL — break & continue
// ============================================================

// break — exits the loop entirely
for ($i = 0; $i <= 10; $i++) {
    if ($i === 5) {
        break; // stops the loop when $i reaches 5
    }
    echo $i . '<br />';
}

// continue — skips the current iteration and moves to the next
for ($i = 0; $i <= 10; $i++) {
    if ($i % 2 === 0) {
        continue; // skips even numbers
    }
    echo $i . '<br />'; // only odd numbers are printed
}

// break with a numeric argument — exits multiple nested loops
for ($i = 0; $i <= 3; $i++) {
    for ($j = 0; $j <= 3; $j++) {
        if ($j === 2) {
            break 2; // exits both the inner and outer loop
        }
        echo '$i: ' . $i . ' | $j: ' . $j . '<br />';
    }
}


// ============================================================
// ALTERNATIVE SYNTAX (for HTML templates)
// ============================================================
// Uses : instead of { and endwhile / endfor / endforeach instead of }

$items = ['Home', 'About', 'Contact'];
?>

<ul>
    <?php foreach ($items as $item): ?>
        <li><?= $item ?></li>
    <?php endforeach; ?>
</ul>

<?php
// ============================================================
// NESTED LOOPS
// ============================================================
// Loops inside loops — useful for multidimensional data
// Be careful with performance — complexity grows exponentially

$matrix = [
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9],
];

foreach ($matrix as $row) {
    foreach ($row as $value) {
        echo $value . ' ';
    }
    echo '<br />';
}
