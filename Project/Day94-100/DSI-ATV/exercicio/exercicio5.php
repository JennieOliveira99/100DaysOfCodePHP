<?php
/*
Observação: Crie as soluções abaixo utilizando a estrutura switch case: 
   
    5 - Elabore um algoritmo que leia dois valores do usuário e a operação que ele deseja 
executar (Operações: soma, subtração, divisão, multiplicação). Execute a operação desejada e 
mostre o resultado;
*/


echo "Digite o primeiro número: ";
$n1 = trim(fgets(STDIN));

echo "Escolha a operação (A = soma, B = subtração, C = multiplicação, D = divisão): ";
$operacao = trim(fgets(STDIN));

//Convertendo a entrada para maiúscula caso o user digite em caps lock desligada
//$operacao = strtoupper($operacao);

echo "Digite o segundo número: ";
$n2 = trim(fgets(STDIN));


switch ($operacao) {
    case 'A':
        $resultado = $n1 + $n2;
        echo "Resultado: " . $n1 . " + ". $n2 ." = ". $resultado;
        break;
        
    case 'B':
        $resultado = $n1 - $n2;
        echo "Resultado: " . $n1 . " - ". $n2 ." = ". $resultado;
        break;
        
    case 'C':
        $resultado = $n1 * $n2;
        echo "Resultado: " . $n1 . " * ". $n2 ." = ". $resultado;
        break;
        
    case 'D':
        if ($n2 == 0) {
            echo "Erro: Não é possível dividir por zero";
        } else {
            $resultado = $n1 / $n2;
            echo "Resultado: " . $n1 . " / ". $n2 ." = ". $resultado;
        }
        break;
        
    default:
        echo "Operação inválida";
        break;
}