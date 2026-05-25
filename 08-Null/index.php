<?php

// ============================================================
// NULL
// ============================================================
// Represents a variable with no value
// A variable is null when:
//   - it is assigned null
//   - it has not been initialised yet
//   - it was destroyed with unset()

$x = null;
var_dump(is_null($x)); // bool(true)


// ============================================================
// unset()
// ============================================================
// Destroys the variable — after unset(), the variable becomes null
// and is_null() / isset() reflect that

$y = 10;
echo '<br />';
var_dump($y);  // int(10)
unset($y);
var_dump($y);  // NULL — variable no longer exists, PHP emits a notice


// ============================================================
// TYPE CASTING FROM NULL
// ============================================================
// null → int   : 0
// null → float : 0.0
// null → string: ''
// null → bool  : false
// null → array : []

echo '<br />';
var_dump((int) $x); // int(0)
