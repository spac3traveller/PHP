<!DOCTYPE html>
<html>
    <head>
        <title>Transactions</title>
        <style>
            /* Tabela ocupa toda a largura disponível, sem espaços duplos entre bordas */
            table {
                width: 100%;
                border-collapse: collapse;
                text-align: center;
            }

            /* Padding e borda subtil em todas as células do cabeçalho e corpo */
            table tr th, table tr td {
                padding: 5px;
                border: 1px #eee solid;
            }

            /* Células do rodapé com texto maior para destaque dos totais */
            tfoot tr th, tfoot tr td {
                font-size: 20px;
            }

            /* Labels dos totais alinhadas à direita para ficarem próximas dos valores */
            tfoot tr th {
                text-align: right;
            }
        </style>
    </head>
    <body>
        <table>
            <!-- Cabeçalho da tabela com os nomes das colunas -->
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Check #</th>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
              <?php if (! empty($transactions)): /* Só renderiza linhas se existirem transacções */ ?>
                <?php foreach ($transactions as $transaction): ?>
                    <tr>
                        <!-- Data formatada como "Mês Dia, Ano" via helper -->
                        <td><?= formatDate($transaction['date']) ?></td>
                        <td><?= $transaction['checkNumber'] ?></td>
                        <td><?= $transaction['description'] ?></td>
                        <td>
                          <?php if ($transaction['amount'] < 0): ?>
                            <!-- Despesa: valor apresentado a vermelho -->
                            <span style="color: red;">
                              <?= formatDollarAmount($transaction['amount']) ?>
                            </span>
                          <?php elseif ($transaction['amount'] > 0): ?>
                            <!-- Receita: valor apresentado a verde -->
                            <span style="color: green;">
                              <?= formatDollarAmount($transaction['amount']) ?>
                            </span>
                          <?php endif; /* Valores exatamente zero não recebem cor */ ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
              <?php endif; ?>
            </tbody>
            <!-- Rodapé com os três totais calculados em index.php -->
            <tfoot>
                <tr>
                    <th colspan="3">Total Income:</th>
                    <!-- ?? 0 garante valor por defeito caso a chave não exista -->
                    <td><?= formatDollarAmount($totals['totalIncome'] ?? 0) ?></td>
                </tr>
                <tr>
                    <th colspan="3">Total Expense:</th>
                    <td><?= formatDollarAmount($totals['totalExpense'] ?? 0) ?></td>
                </tr>
                <tr>
                    <th colspan="3">Net Total:</th>
                    <td><?= formatDollarAmount($totals['netTotal'] ?? 0) ?></td>
                </tr>
            </tfoot>
        </table>
    </body>
</html>
