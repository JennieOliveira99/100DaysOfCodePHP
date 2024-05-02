<?php

// Criando estruturas com classes (SPL)

/* $fixed = new \SplFixedArray(3);
$fixed[0] = "laranja";
$fixed[1] = "maçã";
$fixed[2] = "limão";

// Definindo o novo tamanho antes de adicionar o novo elemento
$fixed->setSize(4);

$fixed[3] = "uva";

foreach ($fixed as $key => $value) {
    echo "posição $key valor $value <br>";
}
*/

$ddl = new \SplDoublyLinkedList ();
