<?php
/*
Observação: Crie as soluções abaixo utilizando a estrutura switch case: 
   7 - Faça um algoritmo PHP que calcule e imprima o salário reajustado de um funcionário 
de acordo com a seguinte regra:  
• Até 300, reajuste de 50%  
• salários maiores que 300, reajuste de 30%. 
*/

echo "Digite o salário do funcionário: ";
$salario = trim(fgets(STDIN));

//Valor do reajuste
$reajuste = 0;

switch (true) {
   case ($salario <= 300):
       //Até 300: 50% de reajuste
       $reajuste = 0.50;
       break;
   case ($salario > 300):
       //Acima de 300: 30% de reajuste
       $reajuste = 0.30;
       break;
}

//Calculando o valor do reajuste e o salário reajustado
$valorReajuste = $salario * $reajuste;
$salarioReajustado = $salario + $valorReajuste;

//Exibindo o salário reajustado e formatando as casas decimais para 2 depois da vírgula
echo "Salário original: R$ " . number_format($salario, 2, ',', '.');
echo "Reajuste: R$ " . number_format($valorReajuste, 2, ',', '.');
echo "Salário reajustado: R$ " . number_format($salarioReajustado, 2, ',', '.');
