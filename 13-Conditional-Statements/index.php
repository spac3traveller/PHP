<?php

// ============================================================
// CONTROL STRUCTURES — if / else / elseif / else if
// ============================================================
// Permitem executar blocos de código condicionalmente
// com base em expressões booleanas


// ============================================================
// IF
// ============================================================
// Executa o bloco apenas se a condição for verdadeira

$age = 20;

if ($age >= 18) {
    echo 'Maior de idade' . '<br />';
}


// ============================================================
// IF / ELSE
// ============================================================
// else é executado quando a condição do if é falsa

$isLoggedIn = false;

if ($isLoggedIn) {
    echo 'Bem-vindo!' . '<br />';
} else {
    echo 'Por favor faz login' . '<br />';
}


// ============================================================
// IF / ELSEIF / ELSE
// ============================================================
// elseif permite testar múltiplas condições em sequência
// Apenas o primeiro bloco verdadeiro é executado

$score = 75;

if ($score >= 90) {
    echo 'A' . '<br />';
} elseif ($score >= 80) {
    echo 'B' . '<br />';
} elseif ($score >= 70) {
    echo 'C' . '<br />';
} elseif ($score >= 60) {
    echo 'D' . '<br />';
} else {
    echo 'F' . '<br />';
}


// ============================================================
// elseif vs else if
// ============================================================
// Em PHP são equivalentes com chavetas
// A diferença aparece na sintaxe alternativa (ver abaixo)
// Convenção: usar elseif (uma palavra) — mais comum e consistente

$x = 10;

// elseif — uma palavra
if ($x > 10) {
    echo 'maior' . '<br />';
} elseif ($x === 10) {
    echo 'igual' . '<br />';
} else {
    echo 'menor' . '<br />';
}

// else if — duas palavras (equivalente com chavetas)
if ($x > 10) {
    echo 'maior' . '<br />';
} else if ($x === 10) {
    echo 'igual' . '<br />';
} else {
    echo 'menor' . '<br />';
}


// ============================================================
// SINTAXE ALTERNATIVA (para templates HTML)
// ============================================================
// Usa : em vez de { e endif em vez de }
// NOTA: nesta sintaxe apenas elseif é válido — else if causa erro

$isAdmin = true;

if ($isAdmin): ?>
    <p>Painel de administração</p>
<?php elseif ($isLoggedIn): ?>
    <p>Área de utilizador</p>
<?php else: ?>
    <p>Acesso negado</p>
<?php endif; ?>


<?php
// ============================================================
// IF DE UMA LINHA (sem chavetas)
// ============================================================
// Válido mas não recomendado — dificulta a leitura e manutenção

$isActive = true;

if ($isActive) echo 'Activo' . '<br />';


// ============================================================
// EXPRESSÕES DENTRO DO IF
// ============================================================
// Qualquer expressão que retorne um valor pode ser usada

$name = '';

// Falsy values: 0, '', '0', [], null, false
if ($name) {
    echo $name . '<br />';
} else {
    echo 'Nome não definido' . '<br />';
}

// Atribuição dentro do if (PHP 8+)
// Útil para verificar e atribuir ao mesmo tempo
function getUserFromDb(): ?string
{
    return 'Atribuition inside if';
}
if ($user = getUserFromDb()) {
    echo $user . '<br />';
}


// ============================================================
// TERNÁRIO — forma compacta do if/else
// ============================================================

$isOnline = true;

// forma completa
$status = $isOnline ? 'online' : 'offline';
echo $status . '<br />';

// forma encadeada (evitar — dificulta leitura)
$score = 85;
$grade = $score >= 90 ? 'A' : ($score >= 80 ? 'B' : ($score >= 70 ? 'C' : 'F'));
echo $grade . '<br />';


// ============================================================
// NULL COALESCING — alternativa ao if para verificar null
// ============================================================

$username = null;

// sem ??
if ($username !== null) {
    echo $username . '<br />';
} else {
    echo 'Anónimo' . '<br />';
}

// com ?? — mais conciso
echo ($username ?? 'Anónimo') . '<br />';


// ============================================================
// BOAS PRÁTICAS
// ============================================================

// 1. Usa sempre chavetas — mesmo para blocos de uma linha
if ($isActive) {
    echo 'Activo' . '<br />';
}

// 2. Evita negações desnecessárias — prefere a condição positiva
// Mau
if (!$isLoggedIn) {
    // redireciona
} else {
    // mostra conteúdo
}

// Bom
if ($isLoggedIn) {
    // mostra conteúdo
} else {
    // redireciona
}

// 3. Early return — evita níveis excessivos de indentação
function getDiscount(bool $isMember, int $age): int
{
    if (!$isMember) {
        return 0;
    }

    if ($age >= 65) {
        return 30;
    }

    return 10;
}

var_dump(getDiscount(true, 70));  // int(30)
var_dump(getDiscount(false, 70)); // int(0)
var_dump(getDiscount(true, 30));  // int(10)
