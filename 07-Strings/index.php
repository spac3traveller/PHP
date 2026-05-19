<?php

// ============================================================
// STRINGS
// ============================================================
// Aspas simples — sem interpolação, mais performante
// Aspas duplas  — permite interpolação de variáveis e caracteres especiais (\n, \t, etc.)

$firstName = 'John';
$lastName  = "{$firstName} Doe"; // interpolação com chavetas
echo $lastName . '<br />';


// ============================================================
// ACESSO A CARACTERES (índice como array)
// ============================================================
// Índices positivos começam em 0 (da esquerda)
// Índices negativos começam em -1 (da direita)

echo $firstName[1]  . '<br />'; // 'o' — segundo caracter
echo $firstName[-2] . '<br />'; // 'h' — segundo a contar do fim


// ============================================================
// MUTAÇÃO DE CARACTERES
// ============================================================
// É possível alterar um caracter individual pelo seu índice

$firstName[1] = 'O'; // 'John' → 'JOhn'
echo $firstName . '<br />';


// ============================================================
// HEREDOC
// ============================================================
// Sintaxe para strings multilinha com interpolação de variáveis
// O identificador de fecho deve estar no início da linha, sem espaços

$x = 1;
$y = 2;

$text = <<<TEXT
line1 $x
line2 $y
line3
TEXT;

echo nl2br($text); // nl2br() converte \n em <br /> para exibição no browser


// ============================================================
// NOWDOC
// ============================================================
// Idêntico ao Heredoc mas SEM interpolação — equivale a aspas simples
// O identificador de abertura é envolvido em aspas simples: <<<'TEXT'

$text = <<<'TEXT'
line1 $x
line2 $y
line3
TEXT;

echo '<br />';
echo nl2br($text); // $x e $y são impressos literalmente, sem substituição
