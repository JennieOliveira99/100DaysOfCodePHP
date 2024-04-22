<?php

//aula 05

//no array as chaves podem ser tanto numericas quanto string


$arrayNumero = [
    1 => 'um',
    11 => 'onze',
    22 => 'vinte dois'
];

$resultado = [];

foreach ($arrayNumero as $k => $v){

    //$resultado[$k] = 'teste';
    $resultado[$k] = $k +1;
    echo " chave :  $k  -  valor:  $v  <br>";
}


//se nao usar a key, nao tem problema apaga-la $arrayNumero as $v

