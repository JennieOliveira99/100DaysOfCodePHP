<?php
/*
1- Crie um algoritmo que receba um número digitado pelo usuário e verifique se esse valor 
é positivo, negativo ou igual a zero. A saída deve ser: "Valor Positivo", "Valor Negativo" ou "Igual 
a Zero".

*/

//usando fgets(STDIN) para ler o que o user digita no terminal
//trim() remove espaços em branco como enter etc(limpar entrada de dados)
echo "Digite um número: ";
$numero = trim(fgets(STDIN));  


if ($numero > 0) {
    echo "Valor Positivo";
} elseif ($numero < 0) {
    echo "Valor Negativo";
} else {
    echo "Igual a Zero";
}


