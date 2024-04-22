<?php

//Escreva uma função em PHP que receba dois números como parâmetros e retorne a soma 

function Somar($numeroUm, $numerDois){
return  $numeroUm + $numerDois;
}

//parametros
echo Somar(38, 49);

 //Escreva uma função em PHP que determine se um número é par ou ímpar

 function ParOuImpar ($numero){
    if( $numero % 2 ==0 ){
    return "O número é par";
        }else{
    return " O  número é ímpar";}
 }

 echo ParOuImpar(15);

 //ternário numero negativo, positivo ou zero

 
 function PositivoOuNegativo ($numero){
    return ($numero > 0) ? "Numero é positivo" : (($numero < 0 )? "Numero é negativo" : "Numero é igual a zero");
}

echo PositivoOuNegativo (-5);


//Criar uma função em PHP que verifique se um número é divisível por 5 ou não.

function VerificarNumero ($numero){
    return ($numero % 5 == 0) ? "Esse numero é divisivel por 5" : "Esse numero não é divisivel por 5";
 }
 
 echo VerificarNumero (35);

     
//Exercicio Idade

function MaiorDeIdade ($idade){
    return ($idade < 18) ? "Voce é menor de idade" :
     (($idade >= 18 && $idade <= 65) ? "Voce é adulto" :
      "Voce é uma pessoa idosa");
}

echo MaiorDeIdade(70);
