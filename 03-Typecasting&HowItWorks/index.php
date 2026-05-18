<?php

// ============================================================
// TIPAGEM EM PHP
// ============================================================
// PHP é dinamicamente tipado (weakly typed):
//   - o tipo de uma variável é determinado em runtime
//   - o tipo pode mudar ao longo da execução
//
// Linguagens fortemente tipadas (strongly typed):
//   - o tipo é determinado em compile time e não pode mudar


// ============================================================
// TIPOS ESCALARES (Scalar Types)
// ============================================================
// Guardam um único valor

$completed = true;       // bool  — true ou false
$score     = 10;         // int   — inteiro, sem decimal
$price     = 9.99;       // float — número com decimal
$greeting  = 'Hello World'; // string — texto

echo $completed . '<br />';
echo $score     . '<br />';
echo $price     . '<br />';
echo $greeting  . '<br />';

// gettype() retorna o tipo como string
echo gettype($score) . '<br />';

// var_dump() mostra o tipo e o valor
var_dump($completed);


// ============================================================
// TIPOS COMPOSTOS (Compound Types)
// ============================================================

// array — colecção de valores de qualquer tipo
$companies = [1, 2, 3, 0, 5, -9.2, 'A', 'b', true];
print_r($companies);

// object   — instância de uma classe
// callable — função ou método que pode ser invocado
// iterable — array ou objecto que implementa Traversable


// ============================================================
// TIPOS ESPECIAIS (Special Types)
// ============================================================

// resource — referência a um recurso externo (ex: ficheiro, ligação BD)
// null     — variável sem valor atribuído


// ============================================================
// TYPE COERCION (Tipagem Fraca)
// ============================================================
// Sem strict_types, o PHP converte automaticamente os tipos dos argumentos

function sum(int $x, int $y): int
{
    var_dump($x, $y); // mostra os tipos após coerção
    echo '<br />';
    return $x + $y;
}

$sum = sum(2.5, '3'); // 2.5 → 2 (int), '3' → 3 (int)
echo $sum . '<br />';
var_dump($sum);
echo '<br />';


// ============================================================
// STRICT TYPES
// ============================================================
// Com declare(strict_types=1) no topo do ficheiro, o PHP deixa
// de fazer coerção automática e lança um TypeError se os tipos
// não corresponderem exactamente

// declare(strict_types=1); // deve ser a primeira linha do ficheiro
//
// function sumStrict(float $x, float $y): float {
//     return $x + $y;
// }
//
// $sum = sumStrict(3, 2); // int é aceite para float mesmo com strict_types
// echo $sum . '<br />';
// var_dump($sum);


// ============================================================
// TYPE CASTING (Conversão Explícita)
// ============================================================
// Força a conversão de um valor para um tipo específico

$x = (int) '2.5'; // '2.5' (string) → 2 (int), a parte decimal é truncada
var_dump($x);
