<?php

// ============================================================
// NULL
// ============================================================
// Representa uma variável sem valor
// Uma variável é null quando:
//   - é atribuída com null
//   - ainda não foi inicializada
//   - foi destruída com unset()

$x = null;
var_dump(is_null($x)); // bool(true)


// ============================================================
// unset()
// ============================================================
// Destrói a variável — após unset(), a variável passa a ser null
// e is_null() / isset() reflectem isso

$y = 10;
echo '<br />';
var_dump($y);  // int(10)
unset($y);
var_dump($y);  // NULL — variável já não existe, PHP emite notice


// ============================================================
// TYPE CASTING A PARTIR DE NULL
// ============================================================
// null → int   : 0
// null → float : 0.0
// null → string: ''
// null → bool  : false
// null → array : []

echo '<br />';
var_dump((int) $x); // int(0)
