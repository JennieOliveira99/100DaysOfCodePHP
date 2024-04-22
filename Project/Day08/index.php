<?php

//Dia 8-9: Teoria sobre funções em PHP: declaração, parâmetros e retorno

//Declaração de Funções

function quebrarMaldicao() {
    echo "Olá, mundo!";
}

//primeiro declara os parâmetros que a função aceitar
//$a e $b

//segundo: executa as operações dentro da função 
// $a + $b;

//terceiro: retorna um valor usando  return
//   return $resultado;

function somar($a, $b) {
    $resultado = $a + $b;
    return $resultado;
}

//chamando funcao

$soma = somar(3, 5);
echo $soma; 

//quarto: chamando a função somar() e passando dois argumentos para ela: 3 e 5
//$soma = somar(3, 5);

// O retorno dessa função será atribuído à variável $soma.

//quinto:imprimindo o resultado
//echo $soma;

//*************Parâmetros de Funções 

//Parâmetros são valores que podem ser passados para uma função para serem processados dentro dela

function nome_da_funcao($parametro1, $parametro2) {
    // Corpo da função
}

//Retorno de Valores em Funções 
//usa se RETURN

function soma($a, $b) {
    return $a + $b;
}

//exemplo 2

function somaDois($a, $b) {
    return $a + $b;
}

$resultado = soma(2, 3); 

