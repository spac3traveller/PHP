<?php

// ============================================================
// SWITCH STATEMENT
// ============================================================
// Alternative to a long if/elseif chain when comparing
// a single expression against multiple possible values
// Uses loose comparison (==) — not strict (===)


// ============================================================
// BASIC SWITCH
// ============================================================

$status = 'active';

switch ($status) {
    case 'active':
        echo 'User is active' . '<br />';
        break; // exits the switch — without break, execution "falls through"
    case 'inactive':
        echo 'User is inactive' . '<br />';
        break;
    case 'banned':
        echo 'User is banned' . '<br />';
        break;
    default:
        echo 'Unknown status' . '<br />'; // runs if no case matches
}


// ============================================================
// LOOSE COMPARISON WARNING
// ============================================================
// switch uses == (not ===) — type coercion can cause unexpected matches

$value = 0;

switch ($value) {
    case false:
        echo 'Matched false' . '<br />'; // this will match! 0 == false
        break;
    case 0:
        echo 'Matched 0' . '<br />';
        break;
}
// Use match() instead when strict comparison is needed (see below)


// ============================================================
// FALL-THROUGH
// ============================================================
// Without break, execution continues into the next case
// This can be intentional — useful for grouping cases

$day = 'Saturday';

switch ($day) {
    case 'Monday':
    case 'Tuesday':
    case 'Wednesday':
    case 'Thursday':
    case 'Friday':
        echo 'Weekday' . '<br />';
        break;
    case 'Saturday':
    case 'Sunday':
        echo 'Weekend' . '<br />'; // matches Saturday and Sunday
        break;
    default:
        echo 'Invalid day' . '<br />';
}


// ============================================================
// RETURN INSIDE SWITCH (inside a function)
// ============================================================
// When inside a function, return can replace break

function getStatusLabel(string $status): string
{
    switch ($status) {
        case 'active':
            return 'Active';
        case 'inactive':
            return 'Inactive';
        case 'banned':
            return 'Banned';
        default:
            return 'Unknown';
    }
}

echo getStatusLabel('active')   . '<br />';
echo getStatusLabel('banned')   . '<br />';
echo getStatusLabel('pending')  . '<br />';


// ============================================================
// ALTERNATIVE SYNTAX (for HTML templates)
// ============================================================

$role = 'admin';

switch ($role):
    case 'admin':
        echo '<p>Admin panel</p>';
        break;
    case 'editor':
        echo '<p>Editor panel</p>';
        break;
    default:
        echo '<p>User panel</p>';
endswitch;


// ============================================================
// MATCH EXPRESSION — PHP 8 (modern alternative to switch)
// ============================================================
// Key differences from switch:
//   - Uses strict comparison (===)
//   - Returns a value (it's an expression)
//   - No fall-through — each arm is independent
//   - Throws UnhandledMatchError if no arm matches (no silent default)

$status = 'active';

$label = match($status) {
    'active'   => 'Active',
    'inactive' => 'Inactive',
    'banned'   => 'Banned',
    default    => 'Unknown',
};

echo $label . '<br />';

// Multiple conditions per arm
$day = 'Saturday';

$type = match($day) {
    'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday' => 'Weekday',
    'Saturday', 'Sunday'                                   => 'Weekend',
    default                                                => 'Invalid day',
};

echo $type . '<br />';

// match() with no default throws UnhandledMatchError if nothing matches
// switch() with no default silently does nothing

// Using match() as a direct expression
echo match(true) {
    $status === 'active' && true => 'Active and condition met',
    default                      => 'No match',
} . '<br />';


// ============================================================
// SWITCH vs MATCH — WHEN TO USE EACH
// ============================================================
//
//  Feature                │ switch        │ match
// ────────────────────────┼───────────────┼───────────────
//  Comparison             │ == (loose)    │ === (strict)
//  Returns a value        │ no            │ yes
//  Fall-through           │ yes           │ no
//  Multiple values/arm    │ multiple case │ comma-separated
//  No match behaviour     │ silent        │ throws error
//  Available since        │ always        │ PHP 8.0
//
// Rule of thumb:
//   - Use match() for strict comparisons and when you need a return value
//   - Use switch() for legacy code or when fall-through is intentional
