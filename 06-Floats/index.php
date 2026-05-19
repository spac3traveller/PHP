<?php

// ============================================================
// FLOATS (Números de Vírgula Flutuante)
// ============================================================
// Também chamados de double ou real numbers
// Suportam notação exponencial e separador numérico (PHP 7.4+)

$exponention = 13_000.5; // underscore para legibilidade
var_dump($exponention);
echo $exponention . '<br />';

echo PHP_FLOAT_MAX . '<br />'; // valor máximo de um float
echo PHP_FLOAT_MIN . '<br />'; // valor mínimo positivo de um float


// ============================================================
// IMPRECISÃO DE FLOATS
// ============================================================
// Floats são armazenados em binário — nem todos os decimais têm
// representação exacta, o que pode causar resultados inesperados
//
// Usar floor() ou ceil() para contornar o problema

$value = floor((0.1 + 0.7) * 10); // esperado: 8, resultado: 7 sem floor()
echo $value . '<br />';

$value = ceil((0.1 + 0.3) * 10); // esperado: 4, arredonda para cima
echo $value . '<br />';


// ============================================================
// COMPARAÇÃO DE FLOATS
// ============================================================
// NUNCA comparar floats com == devido à imprecisão binária
// Usar round() ou uma margem de tolerância (epsilon)

$x = 0.23;
$y = 1 - 0.77; // matematicamente igual a 0.23, mas binariamente diferente

if ($x == $y) {
    echo 'iguais' . '<br />';
} else {
    echo 'diferentes' . '<br />'; // este ramo será executado
}


// ============================================================
// TYPE CASTING PARA FLOAT
// ============================================================

$x = 5;
var_dump((float) $x); // int → float: 5 torna-se 5.0
echo '<br />';

$y = '15.5a'; // string com caracteres não numéricos após o número
var_dump((float) $y); // PHP lê até ao primeiro caracter inválido → 15.5
echo '<br />';
