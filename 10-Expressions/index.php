<?php

// ============================================================
// EXPRESSIONS (Expressões)
// ============================================================
// Uma expressão é qualquer coisa que tem um valor — o bloco
// fundamental do PHP. Se produz um valor, é uma expressão.


// ============================================================
// EXPRESSÕES LITERAIS
// ============================================================
// O valor mais simples — uma constante ou variável

$x = 5;       // 5 é uma expressão literal
$y = 'hello'; // 'hello' é uma expressão literal
$z = true;    // true é uma expressão literal


// ============================================================
// EXPRESSÕES ARITMÉTICAS
// ============================================================

$a = 10 + 5;  // 15
$b = 10 - 5;  // 5
$c = 10 * 5;  // 50
$d = 10 / 5;  // 2
$e = 10 % 3;  // 1  — módulo (resto da divisão)
$f = 10 ** 2; // 100 — exponenciação

echo $a . '<br />';
echo $f . '<br />';


// ============================================================
// EXPRESSÕES DE COMPARAÇÃO
// ============================================================
// Retornam sempre bool (true ou false)

var_dump(5 == '5');   // true  — igual em valor (com coerção de tipo)
var_dump(5 === '5');  // false — igual em valor E tipo (sem coerção)
var_dump(5 != 3);     // true  — diferente em valor
var_dump(5 !== '5');  // true  — diferente em valor OU tipo
var_dump(5 > 3);      // true
var_dump(5 < 3);      // false
var_dump(5 >= 5);     // true
var_dump(5 <= 4);     // false
echo '<br />';

// Spaceship operator — retorna -1, 0 ou 1
// útil para ordenação
var_dump(1 <=> 2);  // int(-1) — esquerda menor
var_dump(2 <=> 2);  // int(0)  — iguais
var_dump(3 <=> 2);  // int(1)  — esquerda maior
echo '<br />';


// ============================================================
// EXPRESSÕES LÓGICAS
// ============================================================
// Combinam condições booleanas

$age      = 25;
$hasId    = true;
$isMember = false;

var_dump($age > 18 && $hasId);          // true  — AND: ambas verdadeiras
var_dump($age > 18 || $isMember);       // true  — OR: pelo menos uma verdadeira
var_dump(!$isMember);                   // true  — NOT: inverte o valor
var_dump($age > 18 and $hasId);         // true  — AND alternativo (menor precedência)
var_dump($age > 18 or $isMember);       // true  — OR alternativo (menor precedência)
echo '<br />';


// ============================================================
// EXPRESSÕES DE ATRIBUIÇÃO
// ============================================================
// A atribuição em si é uma expressão — retorna o valor atribuído

$n = 10;        // atribui 10 e a expressão vale 10
$n += 5;        // $n = $n + 5  → 15
$n -= 3;        // $n = $n - 3  → 12
$n *= 2;        // $n = $n * 2  → 24
$n /= 4;        // $n = $n / 4  → 6
$n %= 4;        // $n = $n % 4  → 2
$n **= 3;       // $n = $n ** 3 → 8

$str  = 'Hello';
$str .= ' World'; // concatenação — 'Hello World'

echo $n   . '<br />';
echo $str . '<br />';


// ============================================================
// EXPRESSÕES DE INCREMENTO / DECREMENTO
// ============================================================

$i = 5;
var_dump($i++); // int(5)  — retorna ANTES de incrementar (post-increment)
var_dump($i);   // int(6)  — agora já foi incrementado
var_dump(++$i); // int(7)  — incrementa ANTES de retornar (pre-increment)
var_dump($i--); // int(7)  — retorna ANTES de decrementar
var_dump($i);   // int(6)
echo '<br />';


// ============================================================
// EXPRESSÕES CONDICIONAIS
// ============================================================

$score = 75;

// Ternário — forma compacta do if/else
$result = $score >= 50 ? 'approved' : 'failed';
echo $result . '<br />';

// Elvis operator (?:) — retorna o lado esquerdo se truthy, senão o direito
$name  = '';
$label = $name ?: 'Anonymous'; // '' é falsy → 'Anonymous'
echo $label . '<br />';

// Nullsafe / Null coalescing (??) — retorna o lado esquerdo se não for null
$username = null;
$display  = $username ?? 'Guest'; // null → 'Guest'
echo $display . '<br />';

// Encadeamento de null coalescing
$config  = null;
$default = null;
$value   = $config ?? $default ?? 'fallback';
echo $value . '<br />';


// ============================================================
// EXPRESSÕES DE FUNÇÃO
// ============================================================
// Uma chamada de função é também uma expressão — retorna um valor

$length = strlen('Hello World'); // retorna 11
$upper  = strtoupper('hello');   // retorna 'HELLO'

echo $length . '<br />';
echo $upper  . '<br />';


// ============================================================
// PRECEDÊNCIA DE OPERADORES
// ============================================================
// Define a ordem de avaliação das expressões
// Usa parênteses para tornar a intenção explícita

$result = 2 + 3 * 4;        // 14 — * tem precedência sobre +
$result = (2 + 3) * 4;      // 20 — parênteses forçam a ordem
var_dump($result);

