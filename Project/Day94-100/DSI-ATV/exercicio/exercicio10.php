<?php
/*
Observação: Crie as soluções abaixo utilizando estruturas de repetição de acordo com 
sua escolha:

10 - Faça um algoritmo PHP que receba dois valores quaisquer e imprime todos os 
valores intermediários a ele, veja exemplo: Primeiro Valor = 5 Segundo Valor = 15 Imprime: 6 7 8 
9 10 11 12 13 14 


$i = $valor1 + 1; atribuindo novo valor a $i: esse valor é o numero após o valor digitado, excluindo o n° digitado teremeos o número após ele
*/


echo "Digite o 1° valor: ";
$valor1 = trim(fgets(STDIN));

echo "Digite o 2° valor: ";
$valor2 = trim(fgets(STDIN));


if ($valor1 < $valor2) {
    for ($i = $valor1 + 1; $i < $valor2; $i++) {//incremente enquanto é menor que 2° valor
        echo $i . " ";
    }
} elseif ($valor1 > $valor2) {
    for ($i = $valor2 + 1; $i < $valor1; $i++) {
        echo $i . " ";
    }
} else {
    echo "Os dois valores são iguais";
}
