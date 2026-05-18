<?php

// ============================================================
// INTEIROS (Integers)
// ============================================================
// Tamanho depende da plataforma (32 ou 64 bits)

echo PHP_INT_MAX . '<br />'; // valor máximo de um int
echo PHP_INT_MIN . '<br />'; // valor mínimo de um int


// ============================================================
// NOTAÇÕES NUMÉRICAS
// ============================================================
// PHP suporta múltiplas bases para definir inteiros

$base10      = 5;     // decimal     — base 10 (normal)
$hexadecimal = 0x5;   // hexadecimal — prefixo 0x
$octal       = 05;    // octal       — prefixo 0
$binary      = 0b101; // binário     — prefixo 0b

echo $base10      . '<br />';
echo $hexadecimal . '<br />';
echo $octal       . '<br />';
echo $binary      . '<br />';


// ============================================================
// OVERFLOW DE INTEIRO
// ============================================================
// Quando um int ultrapassa PHP_INT_MAX, o PHP converte automaticamente para float

$intOverflow = PHP_INT_MAX + 1;
echo $intOverflow . '<br />';
var_dump($intOverflow); // float
echo '<br />';


// ============================================================
// TYPE CASTING PARA INT
// ============================================================

$casting = (int) null; // null → 0
var_dump(is_int($casting)); // bool(true)
echo '<br />';


// ============================================================
// SEPARADOR NUMÉRICO (PHP 7.4+)
// ============================================================
// O underscore pode ser usado para melhorar a legibilidade de números grandes

$x = 2_000_000_000; // equivale a 2000000000
var_dump($x);
