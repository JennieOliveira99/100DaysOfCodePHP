<?php

//Escreva um programa que determine se um nmr é par ou ímpar usando um operador ternário
$numero = 10;
$resultado = ($numero % 2 == 0) ? "par" : "ímpar";
echo "O nmr é $resultado";

//em IF ELSE

$numero = 10;
if ($numero % 2 == 0) {
    echo "O nmr é par";
}
 else {
    echo "O nmr é ímpar";
}

//Crie um script que compare duas variáveis e determine qual é maior 
$a = 10;
$b = 20;
$maior = ($a > $b) ? $a : $b;

echo "O maior nmr é $maior";

//EM IF ELSE

$a = 10;
$b = 20;
if ($a > $b) {
    echo "O maior nmr é $a";
}else {
    echo "O maior nmr é $b";
}

//Escreva um programa que verifique se um aluno foi aprovado ou reprovado em uma disciplina com base na nota

$nota = 75;
$status = ($nota >= 60) ? "aprovado" : "reprovado";
echo "o aluno está $status";

//EM if else

$nota = 75;
if ($nota >= 60) {
    echo "o aluno está aprovado";
} else {
    echo "O aluno está reprovado";
}