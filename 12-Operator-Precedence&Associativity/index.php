<?php

// ============================================================
// PRECEDÊNCIA E ASSOCIATIVIDADE DE OPERADORES
// ============================================================
// Precedência  — define QUAL operador é avaliado primeiro
// Associatividade — define a DIRECÇÃO quando operadores têm a mesma precedência


// ============================================================
// PRECEDÊNCIA
// ============================================================
// Semelhante à matemática — multiplicação antes da adição

$result = 2 + 3 * 4;    // 14 — * tem maior precedência que +
$result = (2 + 3) * 4;  // 20 — parênteses forçam a ordem

echo $result . '<br />';

// Mais exemplos de precedência
$result = 10 + 2 ** 3;      // 18  — ** antes de +
$result = true || false && false; // true — && antes de ||

var_dump($result);
echo '<br />';


// ============================================================
// TABELA DE PRECEDÊNCIA (do maior para o menor)
// ============================================================
//
//  Nível  │ Operadores
// ────────┼──────────────────────────────────────────────────
//    1    │ clone new
//    2    │ **
//    3    │ (int) (float) (string) (array) (object) (bool) @ ~ ++ -- -
//    4    │ instanceof
//    5    │ !
//    6    │ * / %
//    7    │ + - .
//    8    │ << >>
//    9    │ < <= > >=
//   10    │ == != === !== <> <=>
//   11    │ &
//   12    │ ^
//   13    │ |
//   14    │ &&
//   15    │ ||
//   16    │ ??
//   17    │ ?:
//   18    │ = += -= *= /= %= **= .= &= |= ^= <<= >>=
//   19    │ yield yield from
//   20    │ print
//   21    │ and
//   22    │ xor
//   23    │ or


// ============================================================
// ASSOCIATIVIDADE
// ============================================================
// Quando dois operadores têm a MESMA precedência, a associatividade
// define se avalia da esquerda para a direita ou da direita para a esquerda
//
// Left  (esquerda) — avalia da esquerda para a direita
// Right (direita)  — avalia da direita para a esquerda
// None             — não pode ser encadeado


// LEFT ASSOCIATIVITY — esquerda para a direita
$result = 10 - 3 - 2;   // (10 - 3) - 2 = 5  (não 10 - (3 - 2) = 9)
$result = 20 / 4 / 2;   // (20 / 4) / 2 = 2.5

var_dump($result);
echo '<br />';


// RIGHT ASSOCIATIVITY — direita para a esquerda
$result = 2 ** 3 ** 2;  // 2 ** (3 ** 2) = 2 ** 9 = 512  (não (2**3)**2 = 64)

var_dump($result); // int(512)
echo '<br />';

// Atribuição também é right associative
$a = $b = $c = 5;       // $c = 5, depois $b = $c, depois $a = $b
var_dump($a, $b, $c);   // int(5), int(5), int(5)
echo '<br />';


// NON-ASSOCIATIVE — não pode ser encadeado
// $result = 1 < 2 < 3; // erro — < não é encadeável
// $result = 1 == 1 == 1; // erro — == não é encadeável


// ============================================================
// ARMADILHAS COMUNS
// ============================================================

// && vs and — mesma lógica mas precedência DIFERENTE
$x = true;
$y = false;

$result = $x && $y;     // false — && avalia antes de =
var_dump($result);      // bool(false) ✔

$result = $x and $y;    // 'and' tem menor precedência que =
// equivale a: ($result = $x) and $y
// $result fica true (valor de $x), o 'and' é ignorado para a atribuição
var_dump($result);      // bool(true) ← comportamento inesperado!
echo '<br />';

// || vs or — mesmo problema
$result = false || true;    // bool(true)  ✔
$result = false or true;    // bool(false) ← $result recebe false primeiro
var_dump($result);
echo '<br />';


// ============================================================
// BOA PRÁTICA — usa parênteses para deixar a intenção clara
// ============================================================

// Difícil de ler — depende de memorizar a tabela de precedência
$result = $a + $b * $c ** 2 > 10 && !$x || $y;

// Fácil de ler — intenção explícita
$result = (($a + ($b * ($c ** 2))) > 10 && (!$x)) || $y;
