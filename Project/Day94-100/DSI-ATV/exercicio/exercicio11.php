<?php
/*
Observação: Crie as soluções abaixo utilizando estruturas de repetição de acordo com 
sua escolha:

11- Pesquise. Faça um algoritmo PHP que receba uma string, encontre o número total 
de caracteres desta e imprima todos os números que existem entre 0 e o número total, exemplo:  
* string = “Gil Eduardo de Andrade”  
* total_caracter = 22  
Imprime: 1 2 3 4 5 6 7 8 9 10 11 12 13 14 15 16 17 18 19 20 21 
*/


echo "Digite uma palavra aleatória: ";
$string = trim(fgets(STDIN)); 

//Usando  strlen para contar o total de caracteres da string
$total_caracter = strlen($string);


for ($i = 1; $i <= $total_caracter; $i++) {
    echo $i . " "; 
    
    
    
}

