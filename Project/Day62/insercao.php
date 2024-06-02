
<?php

class Node {
    public $data;
    public $next;

    public function __construct($data) {
        $this->data = $data;
        $this->next = null;
    }
}

class LinkedList {
    public $head;

    public function __construct() {
        $this->head = null;
    }

    public function insertAtBeginning($data) {
        $newNode = new Node($data);
        $newNode->next = $this->head;
        $this->head = $newNode;
    }

    public function insertAtPosition($data, $position) {
        $newNode = new Node($data);
        $current = $this->head;
        $prev = null;
        $count = 1;

        while ($current !== null && $count < $position) {
            $prev = $current;
            $current = $current->next;
            $count++;
        }

        $newNode->next = $current;
        if ($prev !== null) {
            $prev->next = $newNode;
        } else {
            $this->head = $newNode;
        }
    }
}

// Exemplo de uso
$list = new LinkedList();
$list->insertAtBeginning(3); // Insere o valor 3 no início da lista
$list->insertAtPosition(2, 2); // Insere o valor 2 na posição 2
