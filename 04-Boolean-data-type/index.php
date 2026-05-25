<?php

// ============================================================
// BOOLEANS
// ============================================================
// Only two possible values: true or false (case insensitive)

$isComplete = TRUE;

// is_bool() checks whether a variable is of type bool
var_dump(is_bool($isComplete));


// ============================================================
// FALSY VALUES
// ============================================================
// The following values evaluate to false in a boolean context:
//
//   Integers  → 0, -0
//   Floats    → 0.0, -0.0
//   Strings   → '', '0'
//   Array     → []
//   Special   → null


// ============================================================
// PRACTICAL USE
// ============================================================

if ($isComplete) {
    echo 'Task is complete';
} else {
    echo 'Task is not complete';
}
