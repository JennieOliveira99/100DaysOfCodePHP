<?php

$dll = new \SplDoublyLinkedList(); // Lista duplamente encadeada

// Colocando no final com push

$dll->push("banana");
$dll->push("mamão");
$dll->push("limão");
$dll->push("maçã");
$dll->push("uva");

echo "Cabeça: " . $dll->bottom() . "<br>"; // Acessando o primeiro elemento da lista
echo "Cauda: " . $dll->top() . "<br>"; // Acessando o último elemento da lista

// Iterando usando métodos do DoublyLinkedList
$dll->rewind();
$prev = null; // Item anterior

while ($dll->valid()) {
    $current = $dll->current(); // Obtendo o valor atual do ponteiro
    echo "Anterior: " . $prev . "<br>";
    echo "Atual: " . $current . "<br>";

    // Avançando o ponteiro para o próximo item
    $dll->next();

    // Verificando se o ponteiro ainda é válido (não atingiu o fim da lista)
    if ($dll->valid()) {
        $next = $dll->current(); // Obtendo o próximo valor do ponteiro
        echo "Próximo: " . $next . "<br>";
    }
    
    echo "<br>";

    // Atualizando o valor do item anterior
    $prev = $current;
}
