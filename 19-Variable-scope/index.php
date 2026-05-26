<?php

// ============================================================
// VARIABLE SCOPE
// ============================================================
// Scope defines where a variable is accessible in the code
// PHP has 3 main scopes: global, local, and static


// ============================================================
// GLOBAL SCOPE
// ============================================================
// Variables declared outside functions are in the global scope
// They are NOT automatically accessible inside functions

$name = 'Tiago';
$age  = 30;

function greet(): void
{
    // $name is not accessible here — different scope
    echo $name . '<br />'; // Notice: Undefined variable $name
}

greet();


// ============================================================
// LOCAL SCOPE
// ============================================================
// Variables declared inside a function only exist within it
// They are destroyed when the function finishes

function createUser(): void
{
    $username = 'tiago'; // local variable
    echo $username . '<br />';
}

createUser();
// echo $username; // Error — $username doesn't exist here


// ============================================================
// GLOBAL KEYWORD
// ============================================================
// To access a global variable inside a function, use 'global'
// This creates a reference to the global variable

$counter = 0;

function increment(): void
{
    global $counter; // reference to the global $counter
    $counter++;
}

increment();
increment();
echo $counter . '<br />'; // 2 — global variable was modified


// ============================================================
// $GLOBALS SUPERGLOBAL
// ============================================================
// PHP stores all global variables in the $GLOBALS array
// Accessible from anywhere — including inside functions

$price    = 10;
$quantity = 3;

function getTotal(): float
{
    return $GLOBALS['price'] * $GLOBALS['quantity'];
}

echo getTotal() . '<br />'; // 30


// ============================================================
// STATIC VARIABLES
// ============================================================
// A static variable persists between function calls
// It is initialised only once and retains its value

function countCalls(): void
{
    static $count = 0; // initialised only on the first call
    $count++;
    echo 'Called ' . $count . ' time(s)' . '<br />';
}

countCalls(); // Called 1 time(s)
countCalls(); // Called 2 time(s)
countCalls(); // Called 3 time(s)

// Without static, $count would reset to 0 on every call


// ============================================================
// NESTED FUNCTIONS
// ============================================================
// Inner functions do NOT inherit the outer function's scope
// Each function has its own isolated scope

function outer(): void
{
    $outerVar = 'I am outer';

    function inner(): void
    {
        // $outerVar is NOT accessible here
        echo $outerVar . '<br />'; // Notice: Undefined variable
    }

    inner();
}

outer();


// ============================================================
// CLOSURES AND SCOPE
// ============================================================
// Closures also have their own scope
// Use 'use' to explicitly import variables from the outer scope

$message = 'Hello';

$greet = function (string $name) use ($message): void {
    echo $message . ' ' . $name . '<br />';
};

$greet('Tiago'); // Hello Tiago

// Capture by reference — changes affect the outer variable
$prefix = 'Mr';

$formalGreet = function (string $name) use (&$prefix): void {
    echo $prefix . ' ' . $name . '<br />';
};

$prefix = 'Dr'; // changed before calling
$formalGreet('Tiago'); // Dr Tiago — uses the updated value


// ============================================================
// SCOPE COMPARISON SUMMARY
// ============================================================
//
//  Scope      │ Where defined        │ Accessible
// ────────────┼──────────────────────┼──────────────────────────────
//  Global     │ Outside functions    │ Everywhere EXCEPT inside functions
//  Local      │ Inside a function    │ Only within that function
//  Static     │ Inside a function    │ Only within that function, persists between calls
//  Closure    │ Anonymous function   │ Own scope + explicit 'use' imports
