<?php

// ============================================================
// CONTROL STRUCTURES — if / else / elseif / else if
// ============================================================
// Allow executing blocks of code conditionally
// based on boolean expressions


// ============================================================
// IF
// ============================================================
// Executes the block only if the condition is true

$age = 20;

if ($age >= 18) {
    echo 'Maior de idade' . '<br />';
}


// ============================================================
// IF / ELSE
// ============================================================
// else is executed when the if condition is false

$isLoggedIn = false;

if ($isLoggedIn) {
    echo 'Bem-vindo!' . '<br />';
} else {
    echo 'Por favor faz login' . '<br />';
}


// ============================================================
// IF / ELSEIF / ELSE
// ============================================================
// elseif allows testing multiple conditions in sequence
// Only the first true block is executed

$score = 75;

if ($score >= 90) {
    echo 'A' . '<br />';
} elseif ($score >= 80) {
    echo 'B' . '<br />';
} elseif ($score >= 70) {
    echo 'C' . '<br />';
} elseif ($score >= 60) {
    echo 'D' . '<br />';
} else {
    echo 'F' . '<br />';
}


// ============================================================
// elseif vs else if
// ============================================================
// In PHP they are equivalent when using curly braces
// The difference appears in the alternative syntax (see below)
// Convention: use elseif (one word) — more common and consistent

$x = 10;

// elseif — one word
if ($x > 10) {
    echo 'maior' . '<br />';
} elseif ($x === 10) {
    echo 'igual' . '<br />';
} else {
    echo 'menor' . '<br />';
}

// else if — two words (equivalent with curly braces)
if ($x > 10) {
    echo 'maior' . '<br />';
} else if ($x === 10) {
    echo 'igual' . '<br />';
} else {
    echo 'menor' . '<br />';
}


// ============================================================
// ALTERNATIVE SYNTAX (for HTML templates)
// ============================================================
// Uses : instead of { and endif instead of }
// NOTE: in this syntax only elseif is valid — else if causes an error

$isAdmin = true;

if ($isAdmin): ?>
    <p>Painel de administração</p>
<?php elseif ($isLoggedIn): ?>
    <p>Área de utilizador</p>
<?php else: ?>
    <p>Acesso negado</p>
<?php endif; ?>


<?php
// ============================================================
// SINGLE-LINE IF (without curly braces)
// ============================================================
// Valid but not recommended — makes reading and maintenance harder

$isActive = true;

if ($isActive) echo 'Activo' . '<br />';


// ============================================================
// EXPRESSIONS INSIDE IF
// ============================================================
// Any expression that returns a value can be used

$name = '';

// Falsy values: 0, '', '0', [], null, false
if ($name) {
    echo $name . '<br />';
} else {
    echo 'Nome não definido' . '<br />';
}

// Assignment inside if (PHP 8+)
// Useful for checking and assigning at the same time
function getUserFromDb(): ?string
{
    return 'Atribuition inside if';
}
if ($user = getUserFromDb()) {
    echo $user . '<br />';
}


// ============================================================
// TERNARY — compact form of if/else
// ============================================================

$isOnline = true;

// full form
$status = $isOnline ? 'online' : 'offline';
echo $status . '<br />';

// chained form (avoid — makes reading harder)
$score = 85;
$grade = $score >= 90 ? 'A' : ($score >= 80 ? 'B' : ($score >= 70 ? 'C' : 'F'));
echo $grade . '<br />';


// ============================================================
// NULL COALESCING — alternative to if for checking null
// ============================================================

$username = null;

// without ??
if ($username !== null) {
    echo $username . '<br />';
} else {
    echo 'Anónimo' . '<br />';
}

// with ?? — more concise
echo ($username ?? 'Anónimo') . '<br />';


// ============================================================
// BEST PRACTICES
// ============================================================

// 1. Always use curly braces — even for single-line blocks
if ($isActive) {
    echo 'Activo' . '<br />';
}

// 2. Avoid unnecessary negations — prefer the positive condition
// Bad
if (!$isLoggedIn) {
    // redirect
} else {
    // show content
}

// Good
if ($isLoggedIn) {
    // show content
} else {
    // redirect
}

// 3. Early return — avoids excessive levels of indentation
function getDiscount(bool $isMember, int $age): int
{
    if (!$isMember) {
        return 0;
    }

    if ($age >= 65) {
        return 30;
    }

    return 10;
}

var_dump(getDiscount(true, 70));  // int(30)
var_dump(getDiscount(false, 70)); // int(0)
var_dump(getDiscount(true, 30));  // int(10)
