<?php

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


//Elabore um programa PHP que verifique se uma senha digitada pelo usuário é forte o suficiente. Considere que uma senha forte deve ter no mínimo 8 caracteres e conter pelo menos uma letra maiúscula, uma letra minúscula e um número.

//Desenvolva um script PHP que compare duas variáveis numéricas e imprima a maior delas.

//Crie um programa PHP que determine se um número é divisível por 3 ou 5 ou ambos e exiba uma mensagem correspondente.

//Escreva um script PHP que verifique se um caractere digitado pelo usuário é uma vogal ou uma consoante e imprima o resultado.

//Desenvolva um programa PHP que determine se um aluno foi aprovado em uma disciplina com base na sua nota. Considere que a nota mínima para aprovação é 7.

//Crie um script PHP que verifique se um ano fornecido pelo usuário é um ano bissexto ou não.