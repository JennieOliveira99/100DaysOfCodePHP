<?php
/*
Observação: Crie as soluções abaixo utilizando a estrutura switch case: 
   
    6 - Faça um algoritmo que aborde a seguinte situação: Uma loja fornece 10% de desconto 
para funcionários e 5% de desconto para clientes vips. Faça um programa que calcule o valor total 
a ser pago por uma pessoa. O script deverá ler o valor total da compra e um código que identifique 
se o comprador é um cliente comum (1), funcionário (2) ou vip (3); 
*/

//Lendo o valor total da compra
echo "Digite o valor total da compra: ";
$valorCompra = trim(fgets(STDIN));

//Identificando se o comprador é um cliente comum (1), funcionário (2) ou vip (3)
echo "Digite o código do comprador (1 = comum, 2 = funcionário, 3 = vip): ";
$codigoComprador = trim(fgets(STDIN));

$desconto = 0;


switch ($codigoComprador) {
    case 1:
        //Cliente comum
        echo "Cliente comum. Nenhum desconto aplicado";
        break;
    case 2:
        //Funcionário
        $desconto = 0.10;
        echo "Funcionário. Desconto de 10% aplicado";
        break;
    case 3:
        //Cliente VIP
        $desconto = 0.05;
        echo "Cliente VIP. Desconto de 5% aplicado";
        break;
    default:
        //Código inválido
        echo "Código inválido";
        exit; 
}

//Calculando o valor do desconto
$valorDesconto = $valorCompra * $desconto;

// Calculando o valor final
$valorFinal = $valorCompra - $valorDesconto;

//Exibindo o valor final a ser pago e formatando as casas decimais para 2 depois da vírgula
echo "   Valor total após desconto: R$ " . number_format($valorFinal, 2, ',', '.') . "\n";
