<?php

// ============================================================
// CONSTANTES
// ============================================================
// - Case sensitive
// - Imutáveis (não podem ser alteradas após definição)
// - Convenção: nomes em CAPS_SNAKE_CASE
// - Acessíveis globalmente sem o símbolo $


// ============================================================
// define() vs const
// ============================================================
// define() — avaliado em runtime, pode ser usado em qualquer contexto
// const    — avaliado em compile time, não pode ser usado dentro de estruturas de controlo

define('PI', 3.14159);
echo PI . '<br>';

// defined() verifica se uma constante existe — retorna 1 (true) ou '' (false)
echo defined('PI') . '<br>';

const E = 2.71828;
echo E . '<br>';


// ============================================================
// define() DENTRO DE ESTRUTURAS DE CONTROLO
// ============================================================
// const não funciona aqui — apenas define() é permitido

if (true) {
    define('STATUS_UNPAID', 'unpaid');
}


// ============================================================
// CONSTANTES DINÂMICAS
// ============================================================
// define() aceita expressões no nome da constante

$paid = 'PAID';
define('STATUS_' . $paid, 4); // cria STATUS_PAID com valor 4
echo STATUS_PAID . '<br>';


// ============================================================
// CONSTANTES MÁGICAS
// ============================================================
// Mudam consoante o contexto onde são usadas

echo __FILE__ . '<br>'; // caminho absoluto do ficheiro actual
echo __LINE__ . '<br>'; // número da linha actual
echo __DIR__  . '<br>'; // directório do ficheiro actual


// ============================================================
// CONSTANTES PREDEFINIDAS DO PHP
// ============================================================

echo PHP_VERSION . '<br>'; // versão do PHP instalada
echo PHP_OS      . '<br>'; // sistema operativo onde o PHP corre


// ============================================================
// VARIÁVEIS VARIÁVEIS (Variable Variables)
// ============================================================
// $var contém o nome de outra variável
// $$var acede à variável cujo nome está em $var

$var  = 'name';
$$var = 'John'; // equivale a $name = 'John'

echo $var, $name . '<br>';       // imprime: name, John
echo "$var, {$$var}" . '<br>';   // imprime: name, John
