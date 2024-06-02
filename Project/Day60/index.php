<?php


class Node {
    public $data;
    public $next;

    function __construct($data) {
        $this->data = $data;
        $this->next = null;
    }
}

class LinkedList {
    public $head;

    function __construct() {
        $this->head = null;
    }

    public function insert($data) {
        $newNode = new Node($data);
        if ($this->head === null) {
            $this->head = $newNode;
        } else {
            $current = $this->head;
            while ($current->next !== null) {
                $current = $current->next;
            }
            $current->next = $newNode;
        }
    }

    public function reverse() {
        $prev = null;
        $current = $this->head;

        while ($current !== null) {
            $next = $current->next;
            $current->next = $prev;
            $prev = $current;
            $current = $next;
        }

        $this->head = $prev;
    }

    
    public function display() {
        $current = $this->head;
        while ($current !== null) {
            echo $current->data . " ";
            $current = $current->next;
        }
    }
}

// Exemplo de uso
$list = new LinkedList();

$list->insert(1);
$list->insert(2);
$list->insert(3);


echo "Lista original: ";
$list->display(); 

$list->reverse();

echo "\nLista invertida: ";
$list->display(); 
