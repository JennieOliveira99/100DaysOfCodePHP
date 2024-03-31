<?php
//Crie um script PHP que verifica se um número é positivo, negativo ou zero e imprime uma mensagem correspondente.

$numero = 2;

if($numero >= 0){
    echo "O número " . $numero . " é positivo";
} elseif ($numero == 0){
    echo " O número é igual a 0";
}elseif ($numero < 0){
    echo "O número é negativo";
}

//Escreva um script PHP que verifica se um número é par ou ímpar e exiba uma mensagem apropriada.

$numero = 5;
$verificacao = $numero % 2;

if($verificacao == 0){
    echo "Esse numero é positivo";
} else{
    echo "Esse numero é negativo";
}

//Desenvolva um programa PHP que determine se um ano é bissexto ou não e imprima o resultado.

$ano = 2013;
$anobissexto = 2013 % 4;

if ($anobissexto == 0){
    echo "Esse ano é bissexto";
} else{
    echo "Esse ano nao e bissexto";
}


//Crie um script PHP que determine se uma pessoa pode votar com base na sua idade. Considere que no Brasil, a idade mínima para votar é 16 anos.

$idade = 35;

if ($idade >= 16){
   echo "voce pode votar";
}else{
    echo "voce não pode votar";
}
