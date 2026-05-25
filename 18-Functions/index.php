<?php

// ============================================================
// FUNCTIONS
// ============================================================
// A function is a reusable block of code that performs a specific task
// Defined with the function keyword — called by its name


// ============================================================
// BASIC FUNCTION
// ============================================================

function greet(): void
{
    echo 'Hello World' . '<br />';
}

greet(); // calling the function


// ============================================================
// PARAMETERS & ARGUMENTS
// ============================================================
// Parameters — variables defined in the function signature
// Arguments  — values passed when calling the function

function greetUser(string $name): void
{
    echo 'Hello ' . $name . '<br />';
}

greetUser('Tiago');


// ============================================================
// DEFAULT PARAMETER VALUES
// ============================================================
// If no argument is passed, the default value is used
// Parameters with defaults must come AFTER required parameters

function greetWithTitle(string $name, string $title = 'Mr'): void
{
    echo 'Hello ' . $title . ' ' . $name . '<br />';
}

greetWithTitle('Tiago');          // Hello Mr Tiago
greetWithTitle('Tiago', 'Dr');    // Hello Dr Tiago


// ============================================================
// RETURN VALUES
// ============================================================
// Functions can return a value using the return keyword
// Execution stops as soon as return is reached

function add(int $a, int $b): int
{
    return $a + $b;
}

$result = add(3, 5);
echo $result . '<br />';


// ============================================================
// TYPE DECLARATIONS (Type Hints)
// ============================================================
// PHP 7+ allows type hints for parameters and return values
// Enforced loosely by default — strictly with declare(strict_types=1)

function divide(int $a, int $b): float
{
    return $a / $b;
}

echo divide(10, 3) . '<br />'; // float(3.333...)


// ============================================================
// RETURN TYPES
// ============================================================

// void — function returns nothing
function logMessage(string $message): void
{
    echo $message . '<br />';
    // return; is implicit — cannot return a value
}

// int / float / string / bool / array
function getScore(): int
{
    return 100;
}

function getPrice(): float
{
    return 9.99;
}

function getUsername(): string
{
    return 'tiago';
}

function isActive(): bool
{
    return true;
}

function getColors(): array
{
    return ['red', 'green', 'blue'];
}

// object — returns an instance of a class
function getUser(): object
{
    return new stdClass();
}

// self — returns an instance of the same class (used inside classes)
class Counter
{
    private int $count = 0;

    public function increment(): self
    {
        $this->count++;
        return $this; // enables method chaining
    }

    public function getCount(): int
    {
        return $this->count;
    }
}

$counter = new Counter();
echo $counter->increment()->increment()->getCount() . '<br />'; // 2


// ============================================================
// NULLABLE TYPES — PHP 7.1+ (?)
// ============================================================
// A ? before the type means the value can be that type OR null

function findUser(?int $id): ?string
{
    if ($id === null) {
        return null;
    }

    return 'User #' . $id;
}

var_dump(findUser(5));    // string 'User #5'
var_dump(findUser(null)); // NULL


// ============================================================
// UNION TYPES — PHP 8.0+ (|)
// ============================================================
// A parameter or return can be one of multiple types

function formatId(int|string $id): string
{
    return 'ID: ' . $id;
}

echo formatId(42)    . '<br />';
echo formatId('abc') . '<br />';


// ============================================================
// INTERSECTION TYPES — PHP 8.1+ (&)
// ============================================================
// The value must satisfy ALL specified types simultaneously
// Only valid with interfaces and classes

// interface Stringable {}
// interface Countable {}
//
// function process(Stringable&Countable $value): void
{
    // $value must implement both Stringable AND Countable
}


// ============================================================
// MIXED TYPE
// ============================================================
// Accepts any type — equivalent to no type hint
// Use sparingly — defeats the purpose of type safety

function debug(mixed $value): void
{
    var_dump($value);
}

debug(42);
debug('hello');
debug(null);
echo '<br />';


// ============================================================
// NEVER RETURN TYPE — PHP 8.1+
// ============================================================
// Indicates the function NEVER returns normally
// It always throws an exception or calls exit/die

function redirect(string $url): never
{
    header('Location: ' . $url);
    exit;
}

function throwError(string $message): never
{
    throw new Exception($message);
}


// ============================================================
// VARIADIC FUNCTIONS (...)
// ============================================================
// Accepts an indefinite number of arguments as an array

function sum(int ...$numbers): int
{
    return array_sum($numbers);
}

echo sum(1, 2, 3, 4, 5) . '<br />'; // 15

// Combining regular and variadic parameters
function sumWithBase(int $base, int ...$numbers): int
{
    return $base + array_sum($numbers);
}

echo sumWithBase(10, 1, 2, 3) . '<br />'; // 16


// ============================================================
// NAMED ARGUMENTS — PHP 8.0+
// ============================================================
// Pass arguments by parameter name instead of position
// Order does not matter — improves readability

function createUser(string $name, int $age, string $role = 'user'): string
{
    return "$name | $age | $role";
}

echo createUser(age: 30, name: 'Tiago', role: 'admin') . '<br />';


// ============================================================
// PASSING BY REFERENCE (&)
// ============================================================
// The function receives a reference to the original variable
// Changes inside the function affect the original variable

function increment(int &$value): void
{
    $value++;
}

$x = 5;
increment($x);
echo $x . '<br />'; // 6 — original variable was modified


// ============================================================
// ANONYMOUS FUNCTIONS (Closures)
// ============================================================
// Functions without a name — assigned to a variable or passed as argument

$multiply = function (int $a, int $b): int {
    return $a * $b;
};

echo $multiply(3, 4) . '<br />'; // 12

// Closures can capture variables from the outer scope with 'use'
$factor = 3;

$multiplyByFactor = function (int $n) use ($factor): int {
    return $n * $factor;
};

echo $multiplyByFactor(5) . '<br />'; // 15

// Capture by reference — changes affect the outer variable
$multiplyAndUpdate = function (int $n) use (&$factor): int {
    $factor = $n;
    return $n * 2;
};

$multiplyAndUpdate(10);
echo $factor . '<br />'; // 10 — outer $factor was updated


// ============================================================
// ARROW FUNCTIONS — PHP 7.4+ (fn)
// ============================================================
// Shorter syntax for closures
// Automatically captures variables from the outer scope (no 'use' needed)
// Always returns the expression — no return keyword needed

$double = fn(int $n): int => $n * 2;

echo $double(5) . '<br />'; // 10

// Automatically captures outer scope
$multiplier = 4;
$multiplyBy = fn(int $n): int => $n * $multiplier;

echo $multiplyBy(5) . '<br />'; // 20


// ============================================================
// FIRST-CLASS CALLABLE SYNTAX — PHP 8.1+
// ============================================================
// Convert any function or method into a closure using ...

$fn = strlen(...);
echo $fn('Hello') . '<br />'; // 5

$arr = ['banana', 'apple', 'cherry'];
usort($arr, strcmp(...));
print_r($arr);
