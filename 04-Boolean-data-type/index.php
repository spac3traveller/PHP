<?php

// ============================================================
// BOOLEANS
// ============================================================
// Apenas dois valores possíveis: true ou false (case insensitive)

$isComplete = TRUE;

// is_bool() verifica se uma variável é do tipo bool
var_dump(is_bool($isComplete));


// ============================================================
// VALORES FALSY
// ============================================================
// Os seguintes valores são avaliados como false em contexto booleano:
//
//   Inteiros  → 0, -0
//   Floats    → 0.0, -0.0
//   Strings   → '', '0'
//   Array     → []
//   Especial  → null


// ============================================================
// USO PRÁTICO
// ============================================================

if ($isComplete) {
    echo 'Task is complete';
} else {
    echo 'Task is not complete';
}
