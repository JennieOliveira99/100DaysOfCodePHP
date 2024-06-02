<?php

//LISTA DUPLAMENTE ENCADEADA
// cada elemento é um nó que contém dois campos principais: um campo para armazenar os dados e dois campos de ligação
//DIFERENCA

//lista encadeada simples:cada nó possui apenas um ponteiro para o próximo nó
//lista duplamente encadeada: cada nó terá um ponteiro para o nó anterior ($prev) e um ponteiro para o próximo nó ($next)

class Node {
    public $data;
    public $prev;
    public $next;

    public function __construct($data) {
        $this->data = $data;
        $this->prev = null;
        $this->next = null;
    }
}

class DoublyLinkedList {
    public $head;
    public $tail;

    public function __construct() {
        $this->head = null;
        $this->tail = null;
    }

    public function isEmpty() {
        return $this->head == null;
    }

    public function insertAtEnd($data) {
        $newNode = new Node($data);
        if ($this->isEmpty()) {
            $this->head = $newNode;
            $this->tail = $newNode;
        } else {
            $newNode->prev = $this->tail;
            $this->tail->next = $newNode;
            $this->tail = $newNode;
        }
    }

    public function display() {
        $current = $this->head;
        while ($current != null) {
            echo $current->data . " ";
            $current = $current->next;
        }
        echo "\n";
    }
}

// Exemplo de uso:
$list = new DoublyLinkedList();
$list->insertAtEnd(1);
$list->insertAtEnd(2);
$list->insertAtEnd(3);
$list->display(); // Saída: 1 2 3
