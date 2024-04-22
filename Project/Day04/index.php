<?php

//Construa um programa que determine se um triângulo é equilátero, isósceles ou escaleno, com base em seus lados.
$lado_A = 7;
$lado_B = 5;
$lado_C = 8;

if ($lado_A == $lado_B && $lado_B == $lado_C){
    echo "Esse é um trinagulo Equilatero pois todos os lados são iguais";
}elseif($lado_A != $lado_B && $lado_B != $lado_C){
    echo "Esse é um triangulo escaleno pois todos os lados sao diferentes";
}else {
    echo "Esse é um triangulo isósceles pois apenas dois lados sao iguais";
}

//Elabore um programa PHP que verifique se uma senha digitada pelo usuário é forte o suficiente. Considere que uma senha forte deve ter no mínimo 8 caracteres e conter pelo menos uma letra maiúscula, uma letra minúscula e um número.

$senha = "SenhaFort3#";
$senha_forte = true;

//strlen: conta o número de caracteres em uma string, nesse caso verifica se a senha tem pelo menos 8 caracteres
if (strlen($senha) < 8) {
    $senha_forte = false;
}

// preg_match: conta o número de caracteres em uma string
// Verificar se a senha contém pelo menos uma letra maiúscula
if ($senha_forte && !preg_match('/[A-Z]/', $senha)) {
    $senha_forte = false;
}

// Verificar se a senha contém pelo menos uma letra minúscula
if ($senha_forte && !preg_match('/[a-z]/', $senha)) {
    $senha_forte = false;
}

// Verificar se a senha contém pelo menos um número
if ($senha_forte && !preg_match('/[0-9]/', $senha)) {
    $senha_forte = false;
}

// Verificar se a senha atende a todos os critérios e exibir a mensagem correspondente
if ($senha_forte) {
    echo "A senha é forte o suficiente.";
} else {
    echo "A senha não é forte o suficiente.";
}
?>




//Escreva um script PHP que verifique se um caractere digitado pelo usuário é uma vogal ou uma consoante e imprima o resultado.
//Identificação de Vogais: Crie um programa que determine se um caractere fornecido pelo usuário é uma vogal ou uma consoante.



//Conversão de Unidades: Desenvolva um script que permita ao usuário converter uma medida de uma unidade para outra (por exemplo, metros para centímetros, quilogramas para gra