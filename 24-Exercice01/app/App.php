<?php

declare(strict_types=1);

/**
 * Retorna um array com os caminhos completos de todos os ficheiros
 * presentes na directoria indicada.
 *
 * @param string $dirPath  Caminho da directoria (deve terminar com separador)
 * @return array           Lista de caminhos completos dos ficheiros
 */
function getTransactionsFiles(string $dirPath): array
{
  $files = [];

  // Percorre todos os itens da directoria
  foreach(scandir($dirPath) as $file) {
    // Ignora sub-directorias (incluindo '.' e '..')
    if (is_dir($file)) {
      continue;
    }

    // Concatena o caminho da directoria com o nome do ficheiro
    $files[] = $dirPath . $file;
  }

  return $files;
}

/**
 * Lê um ficheiro CSV e devolve um array com todas as transacções.
 * A primeira linha do CSV (cabeçalho) é ignorada.
 *
 * @param string        $fileName           Caminho para o ficheiro CSV
 * @param callable|null $transactionHandler Função opcional para transformar cada linha lida
 * @return array                            Array de transacções
 */
function getTransactions(string $fileName, ?callable $transactionHandler = null): array
{
  // Verifica se o ficheiro existe antes de tentar abri-lo
  if (!file_exists($fileName)) {
    trigger_error('File "' . $fileName . '" does not exist', E_USER_ERROR);
  }

  // Abre o ficheiro em modo de leitura
  $file = fopen($fileName, 'r');
  // Salta a primeira linha (cabeçalho do CSV)
  fgetcsv($file);

  $transactions = [];

  // Lê cada linha do CSV até ao fim do ficheiro
  while (($transaction = fgetcsv($file)) !== false) {
    // Se foi passado um handler, aplica-o à linha antes de guardar
    if ($transactionHandler !== null) {
      $transaction = $transactionHandler($transaction);
    }
    $transactions[] = $transaction;
  }

  return $transactions;
}

/**
 * Converte uma linha CSV (array indexado) numa transacção estruturada
 * como array associativo, limpando e convertendo o campo 'amount'.
 *
 * @param array $transactionRow  Linha CSV com [date, checkNumber, description, amount]
 * @return array                 Array associativo com os campos da transacção
 */
function extractTransaction(array $transactionRow): array
{
  // Desestrutura a linha nos seus campos individuais
  [$date, $checkNumber, $description, $amount] = $transactionRow;

  // Remove o símbolo '$' e converte o valor para float
  $amount = (float) str_replace(['$', ''], '', $amount);

  return [
    'date' => $date,
    'checkNumber' => $checkNumber,
    'description' => $description,
    'amount' => $amount
  ];
}

/**
 * Calcula os totais financeiros a partir de um array de transacções.
 * Distingue entradas (amount >= 0) de saídas (amount < 0).
 *
 * @param array $transactions  Array de transacções com o campo 'amount'
 * @return array               Array com 'netTotal', 'totalIncome' e 'totalExpense'
 */
function calculateTotals(array $transactions): array
{
  // Inicializa os três acumuladores a zero
  $totals = ['netTotal' => 0, 'totalIncome' => 0, 'totalExpense' => 0];

  foreach ($transactions as $transaction) {
    // Soma ao total líquido independentemente do sinal
    $totals['netTotal'] += $transaction['amount'];

    if ($transaction['amount'] >= 0) {
      // Valor positivo ou zero: é uma receita
      $totals['totalIncome'] += $transaction['amount'];
    } else {
      // Valor negativo: é uma despesa
      $totals['totalExpense'] += $transaction['amount'];
    }
  }

  return $totals;
}
