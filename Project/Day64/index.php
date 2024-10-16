<?php
// Busca Binária em PHP

// Função de Busca Binária
// A função assume que a lista (array) está ordenada.
function buscaBinaria($lista, $valorBuscado)
{
    // Definindo os limites inicial e final da busca.
    $inicio = 0;
    $fim = count($lista) - 1;

    // Loop até que os ponteiros de início e fim se cruzem.
    while ($inicio <= $fim) {
        // Calculando o índice do meio da lista.
        $meio = (int) (($inicio + $fim) / 2);

        // Caso o valor do meio seja o valor buscado, retorna o índice.
        if ($lista[$meio] == $valorBuscado) {
            return $meio;
        }

        // Se o valor no meio for maior que o valor buscado, 
        // ajuste o limite final para buscar na metade inferior.
        if ($lista[$meio] > $valorBuscado) {
            $fim = $meio - 1;
        }
        // Se o valor no meio for menor, ajuste o limite inicial 
        // para buscar na metade superior.
        else {
            $inicio = $meio + 1;
        }
    }

    // Retorna -1 caso o valor não seja encontrado.
    return -1;
}

// Exemplo de uso da busca binária:
$numeros = [2, 5, 8, 12, 16, 23, 38, 45, 56, 72, 91];

// Valor a ser buscado:
$valorBuscado = 23;

// Chama a função de busca binária e armazena o resultado.
$resultado = buscaBinaria($numeros, $valorBuscado);

// Exibe o resultado da busca.
if ($resultado != -1) {
    echo "Valor $valorBuscado encontrado no índice: $resultado\\n";
} else {
    echo "Valor $valorBuscado não encontrado na lista.\\n";
}

