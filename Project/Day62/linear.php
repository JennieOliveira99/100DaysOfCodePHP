
<?php

class SequentialList {
    private $elements; // Vetor para armazenar os elementos

    // Construtor para criar uma lista vazia com capacidade inicial
    public function __construct($capacity) {
        $this->elements = array_fill(0, $capacity, null);
    }

    // Função para adicionar um elemento ao final da lista
    public function append($element) {
        $this->elements[] = $element;
    }

    // Função para imprimir os elementos da lista
    public function printList() {
        foreach ($this->elements as $element) {
            echo $element . " ";
        }
    }
}

// Exemplo de uso
$list = new SequentialList(5);
$list->append(1);
$list->append(2);
$list->append(3);
$list->printList(); // Saída: 1 2 3
