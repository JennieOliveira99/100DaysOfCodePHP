<?php

//tentando uma calculadora

//Funcao Adicao
function Adicao ($numeroUm, $numeroDois){

    $resultado = $numeroUm + $numeroDois;
    return $resultado;

}

//Funcao Sub
function Subtracao ($numeroUm, $numeroDois){

    $resultado = $numeroUm - $numeroDois;
    return $resultado;
}

//Funcao Multiplicacao

function Multiplicacao ($numeroUm, $numeroDois){

    $resultado = $numeroUm * $numeroDois;
    return $resultado;
}

//Funcao Divisao

function Divisao ($numeroUm, $numeroDois){

    $resultado = $numeroUm / $numeroDois;
    return $resultado;
}


//funcao geral

function Calcular ($numeroUm, $numeroDois, $operador){
    if($operador == '+') {
        return Adicao($numeroUm, $numeroDois);
    } elseif($operador == '-'){
        return Subtracao($numeroUm, $numeroDois);
    }elseif ($operador == '*'){
        return Multiplicacao($numeroUm, $numeroDois);
    }elseif($operador == '/'){
        return Divisao($numeroUm, $numeroDois);
    }else {
        return "Operador inválido!";
    }
}

echo Calcular(3, 5, '+'); 


