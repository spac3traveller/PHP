<?php

// ============================================================
// RETURN
// ============================================================
// Exits the current function and optionally returns a value
// When used outside a function, it stops execution of the file
// This is useful when a file is included — it can return a value

function add(int $a, int $b): int
{
    return $a + $b; // exits the function and returns the result
}

echo add(3, 5) . '<br />';

// return outside a function — stops file execution
// useful in included files to prevent further execution
// return; // would stop here if uncommented


// ============================================================
// DECLARE
// ============================================================
// Sets execution directives for a block of code
// Three directives available: ticks, encoding, strict_types
// Can be applied to the entire file or a specific block


// ------------------------------------------------------------
// declare(ticks=N)
// ------------------------------------------------------------
// A tick fires every N low-level statements executed by PHP
// Useful for profiling, debugging, or monitoring execution flow
// register_tick_function() registers a callback to run on each tick

function onTick(): void
{
    echo 'tick<br />';
}

register_tick_function('onTick');

declare(ticks = 3); // onTick() is called every 3 statements

$i      = 0;
$length = 10;

while ($i < $length) {
    echo $i++ . '<br />';
}


// ------------------------------------------------------------
// declare(encoding='...')
// ------------------------------------------------------------
// Specifies the encoding of the current script
// Rarely used in modern PHP — UTF-8 is the default standard

// declare(encoding = 'UTF-8');


// ------------------------------------------------------------
// declare(strict_types=1)
// ------------------------------------------------------------
// Enables strict type checking for the current file
// Must be the VERY FIRST statement in the file — before anything else
// With strict_types, passing the wrong type throws a TypeError

// declare(strict_types = 1); // must be at the top of the file

// Without strict_types (default):
function multiply(int $a, int $b): int
{
    return $a * $b;
}

echo multiply(3, '4') . '<br />'; // '4' is coerced to int — no error

// With strict_types=1, the line above would throw:
// TypeError: multiply(): Argument #2 must be of type int, string given


// ============================================================
// GOTO
// ============================================================
// Jumps execution to a labelled point in the code
// Avoid in production — makes code hard to read and maintain
// Cannot jump into a loop, function, or different scope

$i = 0;

start: // label
echo $i . '<br />';
$i++;

if ($i < 3) {
    goto start; // jumps back to the 'start' label
}

echo 'Done' . '<br />';

// goto can also be used to skip sections of code
goto end;

echo 'This will never be printed' . '<br />';

end:
echo 'Jumped to end' . '<br />';
