<?php

declare(strict_types=1);

/**
 * Formata um valor float como string monetária no formato dólar.
 * Ex: -1234.5 → "-$1,234.50" | 99.9 → "$99.90"
 *
 * @param float $amount  Valor a formatar (negativo para despesas)
 * @return string        Valor formatado com símbolo '$' e duas casas decimais
 */
function formatDollarAmount(float $amount): string
{
  // Determina se o valor é negativo para colocar o sinal antes do '$'
  $isNegative = $amount < 0;

  // Coloca '-' antes do '$' se negativo; usa abs() para evitar duplo sinal
  return ($isNegative ? '-' : '') . '$' . number_format(abs($amount), 2);
}

/**
 * Converte uma string de data para um formato legível.
 * Ex: "2024-01-15" → "Jan 15, 2024"
 *
 * @param string $date  Data em qualquer formato reconhecido pelo PHP (ex: Y-m-d)
 * @return string       Data formatada como "Mês Dia, Ano"
 */
function formatDate(string $date): string
{
  // strtotime() converte a string para timestamp Unix; date() formata-o
  return date('M j, Y', strtotime($date));
}
