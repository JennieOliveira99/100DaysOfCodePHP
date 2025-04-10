<?php
/*
2 - Faça um algoritmo PHP que receba os valores A e B, imprima-os em ordem crescente 
em relação aos seus valores. Exemplo, para A=5, B=4. Você deve imprimir na tela: "4 5". Dica, 
utilizem concatenação. 

*/


$A = 5; 
$B = 13; 

 // Se A é menor que B, imprime A e depois B
if ($A < $B) {
    echo $A ."<br>". $B ; 
} 
// Se B é menor que A, imprime B e depois A
else {
    echo $B . "<br>" . $A ;  
}

