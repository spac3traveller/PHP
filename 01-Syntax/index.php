<?php

// ============================================================
// OUTPUT — echo vs print
// ============================================================

// echo: aceita múltiplos argumentos separados por vírgula, sem return value
echo 'echo simples' . '<br>';
echo ('echo com parênteses') . '<br>';
echo 'Hello', ' ', 'World', '!' . '<br>';

// Escapar aspas simples com backslash
echo 'Joe\'s Invoice' . '<br>';

// Aspas duplas permitem interpolação de variáveis (ver mais abaixo)
echo "echo com aspas duplas" . '<br>';

// print: semelhante ao echo mas retorna sempre 1
// Isso permite usá-lo em expressões (ex: echo print '...')
echo print 'print retorna 1️⃣';
echo '<br>';
print('print com parênteses') . '<br>';


// ============================================================
// VARIÁVEIS
// ============================================================
// - Case sensitive ($name !== $Name)
// - Começam com $ seguido de letra ou underscore
// - Sem caracteres especiais
// - $this é reservado
// - Por defeito, atribuídas por valor (cópia)

$name = 'Joe';
echo $name . '<br>';

// Atribuição por valor — $y é uma cópia independente de $x
$x = 1;
$y = $x;
$x = 3;
echo $y . '<br>'; // imprime 1 (não foi afectado pela mudança de $x)

// Atribuição por referência — $z aponta para o mesmo valor que $i
$i = 1;
$z = &$i;
$i = 3;
echo $z . '<br>'; // imprime 3 (partilham o mesmo valor)


// ============================================================
// INTERPOLAÇÃO E CONCATENAÇÃO
// ============================================================

$firstName = 'Tiago';

// Interpolação simples (dentro de aspas duplas)
echo "Hello $firstName" . '<br>';

// Interpolação com chavetas — útil quando a variável está junto de texto
echo "Hello {$firstName}" . '<br>';

// Concatenação com o operador .
echo "Hello " . $firstName . '<br>';
