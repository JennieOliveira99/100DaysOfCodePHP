
<?php

//analisar arrayNumeros
//quando chave = par exibir value
// quando impar, somar value e exibir no final


$arrayNumeros = [
    11 => 'onze',
    22 => 'vinte e dois',
    3 => 'tres',
    12 => 'doze',
    100 => 'cem',
    51 => 'cinquenta e um',
];



foreach ($arrayNumeros as $key => $value){
    if ($key % 2 ==0 ){

        echo 'os numeros pares sao:' . $value . '<br>';
    }else{
      $impar =  $key + $key;
        
    }
}