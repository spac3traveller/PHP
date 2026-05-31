<?php

declare(strict_types=1);

// Obtém o directório raiz do projecto (um nível acima de /public)
$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

// Define constantes globais para os caminhos das directorias principais
define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR );        // Lógica da aplicação
define('FILES_PATH', $root . 'transaction_files' . DIRECTORY_SEPARATOR); // Ficheiros CSV de transacções
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);     // Templates HTML

// Carrega as funções principais e os helpers de formatação
require APP_PATH . 'app.php';
require APP_PATH . 'helpers.php';

// Recolhe a lista de todos os ficheiros CSV na directoria de transacções
$files = getTransactionsFiles(FILES_PATH);

$transactions = [];

// Lê cada ficheiro e junta as suas transacções no array principal
// O callback 'extractTransaction' transforma cada linha CSV num array associativo
foreach ($files as $file) {
  $transactions = array_merge($transactions, getTransactions($file, 'extractTransaction'));
}

// Calcula os totais (receitas, despesas e saldo líquido) a partir de todas as transacções
$totals = calculateTotals($transactions);

// Carrega a view que apresenta os dados em HTML
require VIEWS_PATH . 'transactions.php';


