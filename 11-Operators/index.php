<?php

// ============================================================
// OPERADORES EM PHP
// ============================================================


// ============================================================
// ARITMÉTICOS (+ - * / % **)
// ============================================================

$x = -10;
$y = 2;

var_dump($x + $y);  // int(-8)  — adição
var_dump($x - $y);  // int(-12) — subtração
var_dump($x * $y);  // int(-20) — multiplicação
var_dump($x / $y);  // int(-5)  — divisão
var_dump($x % $y);  // int(0)   — módulo (resto da divisão)
var_dump($x ** $y); // int(100) — exponenciação
echo '<br />';

// Negação unária — converte string numérica para int/float negativo
$x = '15';
var_dump(-$x); // int(-15)
echo '<br />';

// fdiv() — divisão por zero retorna INF, -INF ou NAN em vez de erro
$x = 10;
$y = 0;
var_dump(fdiv($x, $y)); // float(INF)
echo '<br />';

// fmod() — módulo para floats (% trunca para int)
$x = 10.5;
$y = 2.9;
var_dump(fmod($x, $y)); // float(1.8)
echo '<br />';


// ============================================================
// ATRIBUIÇÃO (= += -= *= /= %= **=)
// ============================================================

// Atribuição encadeada — $x e $y ficam ambos com 10
$x = $y = 10;
var_dump($x); // int(10)
echo '<br />';

// Atribuição dentro de expressão
// $y recebe 10, depois $x recebe ($y + 5) = 15
$x = (($y = 10) + 5);
var_dump($x, $y); // int(15), int(10)
echo '<br />';

// Operadores de atribuição composta
$x += $x; // $x = $x + $x → 30
var_dump($x);
echo '<br />';


// ============================================================
// STRING (. .=)
// ============================================================

$x = 'Hello';
echo $x . ' World' . '<br />';  // concatenação simples — $x não é alterado
echo $x .= ' World' . '<br />'; // .= concatena e reatribui — $x passa a 'Hello World'


// ============================================================
// COMPARAÇÃO (== === != <> !== < > <= >= <=> ?? ?:)
// ============================================================

$x = 5;
$y = '5';

var_dump($x == $y);   // true  — igual em valor (coerção de tipo)
var_dump($x === $y);  // false — igual em valor E tipo
var_dump($x != $y);   // false — diferente em valor
var_dump($x <> $y);   // false — alias de !=
var_dump($x !== $y);  // true  — diferente em valor OU tipo
var_dump($x < $y);    // false
var_dump($x > $y);    // false
var_dump($x <= $y);   // true
var_dump($x >= $y);   // true
var_dump($x <=> $y);  // int(0) — spaceship: -1 menor, 0 igual, 1 maior

// ?? — null coalescing: retorna o lado esquerdo se não for null
var_dump($x ?? $y);   // int(5) — $x não é null, retorna $x

// ?: — elvis: retorna o lado esquerdo se truthy, senão o direito
var_dump($x ?: $y);   // int(5) — $x é truthy, retorna $x
echo '<br />';


// ============================================================
// CONTROLO DE ERROS (@)
// ============================================================
// @ suprime erros/warnings — usar com moderação, dificulta debugging

$x = @file('file.txt'); // sem @ emitiria warning se o ficheiro não existir


// ============================================================
// INCREMENTO / DECREMENTO (++ --)
// ============================================================

$x = 5; $y = 5; $z = 5; $w = 5;

echo ++$x . '<br />'; // 6 — pre-increment:  incrementa ANTES de retornar
echo $y++ . '<br />'; // 5 — post-increment: retorna ANTES de incrementar
echo --$z . '<br />'; // 4 — pre-decrement:  decrementa ANTES de retornar
echo $w-- . '<br />'; // 5 — post-decrement: retorna ANTES de decrementar


// ============================================================
// LÓGICOS (&& || ! and or xor)
// ============================================================
// && e || têm maior precedência que 'and' e 'or'
// Usar sempre && e || para evitar comportamentos inesperados

$a = true;
$b = false;

var_dump($a && $b);  // false — ambos verdadeiros
var_dump($a || $b);  // true  — pelo menos um verdadeiro
var_dump(!$a);       // false — negação
var_dump($a xor $b); // true  — um verdadeiro mas não ambos
echo '<br />';


// ============================================================
// BITWISE (& | ^ ~ << >>)
// ============================================================
// Operam bit a bit — usados em flags, permissões, criptografia

var_dump(6 & 3);  // int(2) — AND:         110 & 011 = 010
var_dump(6 | 3);  // int(7) — OR:          110 | 011 = 111
var_dump(6 ^ 3);  // int(5) — XOR:         110 ^ 011 = 101
var_dump(~6);     // int(-7)— NOT:         inverte todos os bits
var_dump(6 << 1); // int(12)— shift left:  multiplica por 2
var_dump(6 >> 1); // int(3) — shift right: divide por 2
echo '<br />';


// ============================================================
// ARRAY (+ == === != <> !==)
// ============================================================

$a = ['x' => 1, 'y' => 2];
$b = ['x' => 1, 'y' => 2, 'z' => 3];

var_dump($a + $b);    // união — mantém chaves do lado esquerdo em caso de conflito
var_dump($a == $b);   // false — mesmos pares chave/valor (independente da ordem)
var_dump($a === $b);  // false — mesmos pares, mesmos tipos E mesma ordem
var_dump($a != $b);   // true
var_dump($a !== $b);  // true
echo '<br />';


// ============================================================
// EXECUÇÃO (``)
// ============================================================
// Executa comandos do sistema operativo — equivale a shell_exec()

$output = `ls -la`;
echo nl2br($output);
echo '<br />';


// ============================================================
// TIPO (instanceof)
// ============================================================
// Verifica se um objecto é instância de uma classe

class User {}
$user = new User();

var_dump($user instanceof User); // bool(true)
echo '<br />';


// ============================================================
// NULLSAFE — PHP 8 (?->)
// ============================================================
// Evita erros ao encadear métodos/propriedades que podem ser null
// Se qualquer parte da cadeia for null, retorna null em vez de erro

class Order {
    public ?User $user = null;
}

$order = new Order();
var_dump($order->user?->getName()); // NULL — sem erro, mesmo que $user seja null
