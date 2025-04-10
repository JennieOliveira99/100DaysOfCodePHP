<?php
/*
3 - Crie um algoritmo para calcular a média final de um aluno, para isso, solicite a entrada 
de três notas e as insira em um array, por fim, calcule a média geral. Caso a média seja maior ou 
igual a seis, exiba aprovado, caso contrário, exiba reprovado. Exiba também a média final 
calculada. 
Ex: N1 = 5 | N2 = 10 | N3 = 4 | MG = 6,33 [Aprovado].
*/



//usando fgets(STDIN) para ler o que o user digita no terminal
//trim() remove espaços em branco como enter etc(limpar entrada de dados)
//usando number_format para especificar a qtd das casas decimais exibidas
echo "Digite a primeira nota ";
$primeiraNota = trim(fgets(STDIN));  
echo "Digite a segunda nota ";
$segundaNota = trim(fgets(STDIN));  
echo "Digite a terceira nota ";
$terceiraNota = trim(fgets(STDIN));

$arrayNotas = array($primeiraNota, $segundaNota, $terceiraNota);
$media = ($primeiraNota + $segundaNota + $terceiraNota) / 3;

if($media >= 6 ){
    echo "Aprovado, sua média é:   " .  number_format($media, 2, ',', '.');
}else {
    echo "Reprovado, sua média é:   " . number_format($media, 2, ',', '.');
}

