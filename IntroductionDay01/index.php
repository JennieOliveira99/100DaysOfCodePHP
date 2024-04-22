<?php

echo 'Hello world';

$some_var = true;
echo ($some_var) ? 'true' : 'false';//? 'true' : 'false'; é uma expressão ternária

//imprimindo aspas duplas
echo "Isto é uma \"aspas duplas\" dentro de uma string.";
echo 'Isto é uma \'aspas simples\' dentro de uma string.';

//Tipos de Dados no PHP

//Inteiro(Integer)

$idade = 40;

//Ponto Flutuante (Float)

$preco = 10.99;
//string
$nome = 'Jenny';

//boolean
$verdadeiro = true;


//Array chaveado/associativo

$dadosPessoa = array(
    "nome" => "João",
    "idade" => 30,
    "cidade" => "São Paulo"
);

echo $dadosPessoa["nome"]; // Saída: João
echo $dadosPessoa["idade"]; // Saída: 30
echo $dadosPessoa["cidade"]; // Saída: São Paulo

//Printf
printf("Olá, meu nome é %s e eu tenho %d anos.", $nome, $idade);

