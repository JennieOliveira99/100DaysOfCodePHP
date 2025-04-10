<?php
/*
Observação: Crie as soluções abaixo utilizando estruturas de repetição de acordo com 
sua escolha:

8 - Faça um algoritmo em PHP que receba um valor qualquer e imprima os valores de 0 
até o valor recebido, exemplo:  - Valor recebido = 9  - Impressão do programa – 0 1 2 3 4 5 6 7 8 9
*/

echo "Digite um valor: ";
$valor = trim(fgets(STDIN));

//Usando for
for ($i = 0; $i <= $valor; $i++) {
    echo $i . " "; 
}


