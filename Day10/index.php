<?php

    
 // Calculando o índice de massa corporal (IMC)

 function CalcularIMC ($altura, $peso){
    //criando variavel para armazenar o calculo imc
  $imc = ($peso / ($altura * $altura));
   return ($imc < 18.5) ? "Voce esta abaixo do peso" :
   (($imc >= 18.7 && $imc < 24.9) ? "Seu peso esta normal" :
   (($imc >=25.0 && $imc < 29.9) ? "Voce esta com sobrepeso" : "Voce esta obeso"));
}
  
 echo CalcularIMC (1.59,72);