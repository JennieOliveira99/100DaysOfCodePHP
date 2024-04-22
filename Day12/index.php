<?php

//Escreva um script PHP que imprima os números de 1 a 10 na tela.

for ($i = 1; $i <= 10; $i++) {

    echo $i . "<br>";
}



//Escreva um script PHP que imprima os números de 1 a 100 na tela.

for ($i = 1; $i <= 100; $i++) {

    echo $i . "<br>";
}

//Escreva um script PHP que imprima as somas de 1 até 100

$oma = 0;
for ($i = 1; $i <= 100; $i++) {

    $soma += $i;
}
echo " a soma dos números de 1 a 100 é: " . $soma;





//Escreva um script PHP que imprima uma tabuada.
echo "<table border='1'>";
for ($i = 1; $i <= 10; $i++) {
    echo "<tr>";

    for ($j = 1; $j <= 10; $j++) {
        echo "<td>" . $i . "x" . $j . "=" . ($i * $j) . "</td>";
    }

    echo "</tr>";
}
echo "</table>";
