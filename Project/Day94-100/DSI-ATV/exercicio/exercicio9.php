<?php
/*
Observação: Crie as soluções abaixo utilizando estruturas de repetição de acordo com 
sua escolha:

9 - Faça um algoritmo PHP que receba um valor qualquer e calcule o seu fatorial (!), 
sabendo que fatorial de um número é:
7! = 7*6*5*4*3*2*1 
4! = 4*3*2*1
*/

echo "Digite um valor para calcular o fatorial: ";
$numero = trim(fgets(STDIN));

$fatorial = 1;

    //Usando FOR para calcular o fatorial
    for ($i = $numero; $i > 1; $i--) { //O fatorial calcula do n° digitado até 1, se o n° é maior que 1, decremente até chegar em 1
        $fatorial *= $i;  //Multiplica o valor atual de fatorial pelo valor de $i
    }
    // Exibir o resultado
    echo "O fatorial de $numero é: $fatorial";
