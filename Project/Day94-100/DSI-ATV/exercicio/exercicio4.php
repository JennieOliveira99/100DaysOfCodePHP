<?php
/*
4 - Ler um número inteiro entre 1 e 12 e escrever o mês correspondente. Caso o número 
seja fora desse intervalo, informar que não existe mês com este número. Exigência, resolva esse 
exercício utilizando array. 
*/

$n = 11;

//Criando o array associativo com os números referntes a cada mes
$meses = array (
    1 => 'Janeiro',
    2 => "Fevereiro",
    3 => "Março",
    4 => "Abril",
    5 => "Maio",
    6 => "Junho",
    7 => "Julho",
    8 => "Agosto",
    9 => "Setembro",
    10 => "Outubro",
    11 => "Novembro",
    12 => "Dezembro"
);

//Usando array_key_exists() para verificar se a chave $n existe no array $meses
if (array_key_exists($n, $meses)) {
    echo "Mês: " . $meses[$n] ;
} else {
    echo "Não existe mês com este número";
}