<?php
// Solicitar ao usuário que insira o principal, a taxa de juros e o tempo de investimento
echo "Digite o valor principal do investimento: ";
$principal = floatval(fgets(STDIN));

echo "Digite a taxa de juros (em porcentagem): ";
$taxa_juros = floatval(fgets(STDIN)) / 100; // Convertendo a taxa para decimal

echo "Digite o tempo de investimento (em anos): ";
$tempo = intval(fgets(STDIN));

// Permitir que o usuário escolha o tipo de juros (simples ou compostos)
echo "Escolha o tipo de juros (digite 's' para juros simples ou 'c' para juros compostos): ";
$tipo_juros = trim(fgets(STDIN));

// Dependendo da escolha do usuário, realizar os cálculos apropriados para calcular o montante do investimento
if ($tipo_juros == 's') {
    // Juros simples
    $montante = $principal * (1 + $taxa_juros * $tempo);
} elseif ($tipo_juros == 'c') {
    // Juros compostos
    $montante = $principal * pow((1 + $taxa_juros), $tempo);
} else {
    // Tipo de juros inválido
    echo "Tipo de juros inválido. Por favor, escolha 's' para juros simples ou 'c' para juros compostos.";
    exit();
}

// Exibir o resultado ao usuário
echo "O montante do investimento após $tempo anos será de: $montante";
?>
