<?php

// ============================================================
// ARRAYS
// ============================================================
// Arrays em PHP são mapas ordenados — podem ter índices numéricos
// (indexed array) ou chaves string (associative array)


// ============================================================
// INDEXED ARRAYS
// ============================================================

$programmingLanguages = ['PHP', 'JavaScript', 'Python', 'Java', 'C++'];

echo $programmingLanguages[2] . '<br />'; // 'Python' — índice começa em 0

// isset() verifica se o índice existe E não é null
var_dump(isset($programmingLanguages[5])); // bool(false)
echo '<br />';

// [] sem índice adiciona ao fim do array (próximo índice disponível)
$programmingLanguages[] = 'C#';
echo $programmingLanguages[5] . '<br />'; // 'C#'

// Substituir um valor pelo índice
$programmingLanguages[2] = 'Go';

echo '<pre>';
print_r($programmingLanguages);
echo '</pre>';

// array_push() adiciona um ou mais elementos ao fim
array_push($programmingLanguages, 'Ruby');

echo '<pre>';
print_r($programmingLanguages);
echo '</pre>';


// ============================================================
// ASSOCIATIVE ARRAYS
// ============================================================
// Chaves podem ser strings — útil para estruturas com significado semântico

$programmingLanguages = [
    'php'    => '8.5',
    'java'   => '17',
    'python' => [
        'creator'   => 'Guido van Rossum',
        'extension' => '.py',
        'website'   => 'https://www.python.org',
        'versions'  => [
            ['version' => '3.10', 'release-date' => '2022-10-04'],
            ['version' => '3.9',  'release-date' => '2022-04-11'],
        ],
    ],
];


// ============================================================
// array_key_exists() vs isset()
// ============================================================
// array_key_exists() — verifica apenas se a chave existe (mesmo que o valor seja null)
// isset()            — verifica se a chave existe E se o valor não é null

var_dump(array_key_exists('python', $programmingLanguages)); // bool(true)
echo '<br />';
var_dump(isset($programmingLanguages['python'])); // bool(true)

// Diferença prática:
// $arr = ['key' => null];
// array_key_exists('key', $arr) → true
// isset($arr['key'])            → false  ← null faz isset() retornar false

echo '<pre>';
print_r($programmingLanguages);
echo '</pre>';

// Acesso a arrays multidimensionais com encadeamento de chaves
print_r($programmingLanguages['python']['versions'][0]['version']); // '3.10'


// ============================================================
// ADICIONAR ELEMENTOS A UM ASSOCIATIVE ARRAY
// ============================================================

$programmingLanguages['go'] = '1.20'; // chave string literal

$newLanguage = 'Rust';
$programmingLanguages[$newLanguage] = '1.69'; // chave dinâmica via variável

echo '<pre>';
print_r($programmingLanguages);
echo '</pre>';


// ============================================================
// CASTING DE CHAVES
// ============================================================
// PHP converte automaticamente o tipo das chaves:
//   true/false → 1/0
//   float      → int (parte decimal truncada)
//   '1'        → 1 (string numérica → int)
// Chaves duplicadas após conversão: o último valor sobrescreve o anterior

$array = [true => 'a', 1 => 'b', '1' => 'c', 1.8 => 'd'];
// true → 1, '1' → 1, 1.8 → 1 — todas a mesma chave, fica só 'd'
echo '<pre>';
print_r($array);
echo '</pre>';


// ============================================================
// ÍNDICES NUMÉRICOS EXPLÍCITOS
// ============================================================
// Se definires um índice manualmente, o próximo [] continua a partir daí

$array = ['a', 'b', 50 => 'c', 'd'];
// índices: 0 => 'a', 1 => 'b', 50 => 'c', 51 => 'd'
echo '<pre>';
print_r($array);
echo '</pre>';


// ============================================================
// TYPE CASTING COM ARRAYS
// ============================================================
// Qualquer valor pode ser convertido para array com (array)

$string = (array) 'hello';       // ['hello']
$int    = (array) 42;            // [42]
$null   = (array) null;          // []
$object = (array) new stdClass(); // converte propriedades em chaves

echo '<pre>';
print_r($string);
print_r($int);
print_r($null);
echo '</pre>';
