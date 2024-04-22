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


//Desenvolva um programa PHP que determine se um aluno foi aprovado em uma disciplina com base na sua nota. Considere que a nota mínima para aprovação é 7.

$nota = 8;
 
if ($nota >= 7){
    echo "aprovado";
}else {
   echo "reprovado";
}


//Crie um script PHP que determine se uma pessoa pode votar com base na sua idade. Considere que no Brasil, a idade mínima para votar é 16 anos.

$idade = 35;

if ($idade >= 16){
   echo "voce pode votar";
}else{
    echo "voce não pode votar";
}


//Desenvolva um programa PHP que determine se um ano é bissexto ou não e imprima o resultado.

$ano = 2000;
$primeira_condicao = $ano % 4;
$segunda_condicao = $ano % 400;
$terceira_condicao = $ano % 100;


if ($primeira_condicao == 0 && $terceira_condicao >= 1){
    echo "Esse ano é bissexto";
} elseif ($segunda_condicao == 0){
    echo "Esse ano é bissexto";
}
else{
    echo "Esse ano nao e bissexto";
}

//Crie um programa PHP que determine se um número é divisível por 3 ou 5 ou ambos e exiba uma mensagem correspondente.
$numero = 45;
$divisivel_por_tres = $numero % 3;
$divisivel_por_cinco = $numero % 5;

if ($divisivel_por_cinco == 0 && $divisivel_por_tres == 0){
    echo "Essse número é divisível por 3 e por 5";
} elseif ($divisivel_por_cinco == 0){
    echo "Esse numero e divisivel por 5 ";
}elseif ($divisivel_por_tres == 0){
    echo "Esse numero e divisivel por 3 ";
} else {
   echo  "Esse numero nao e divisivel por 3 nem por 5 ";
}

//Desenvolva um script PHP que compare duas variáveis numéricas e imprima a maior delas.

$numero_um = 56;
$numero_dois = 430;

if ($numero_um > $numero_dois){
    echo "O numero " . $numero_um . " é maior";
}elseif ($numero_dois > $numero_um){
    echo "O numero " . $numero_dois . " é maior";
} else {
    echo "Não tem numero  maior";
}
//Desenvolva um programa PHP que determine se um aluno foi aprovado em uma disciplina com base na sua nota. Considere que a nota mínima para aprovação é 7.

$nota = 8;
 
if ($nota >= 7){
    echo "aprovado";
}else {
   echo "reprovado";
}

