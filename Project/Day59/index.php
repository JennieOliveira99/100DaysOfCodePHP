<?php

//listas ligadas

//são usadas para implementar estruturas que adcionam e excluem elementos
//cenários onde a quantidade de dados pode mudar com frequencia

class Node {
    public $data;  // Armazena o dado do nó
    public $next;// Ponteiro para o próximo nó na lista

    public function __construct($data) {
        $this->data = $data; // Armazenando o valor do nó
        $this->next = null; // Inicializando o ponteiro para o próximo nó como nulo(é o ultimo nó da lista, já que é o 1°, inicia null pq nao tem outro conectado)
    }
}

//1° //criando a lista encadeada
class LinkedList {
    public $head; //Referência para o primeiro nó da lista.

    //2°Construtor __construct()
    public function __construct() { //Define o construtor da classe 
        $this->head = null; // Inicializando a cabeça da lista ligada  indicando que foi criada vazia
    }

    //3° Método insert
    public function insert($data) { //método que insere um novo nó na lista
        $newNode = new Node($data); // Criando um novo nó com o valor fornecido
        if ($this->head === null) { // Verificando se a lista está vazia
            $this->head = $newNode; // Se estiver vazia, o novo nó se torna a cabeça da lista
        } else {

            //4°: Insercao de lista nao vazia
            $current = $this->head; // Definindo o nó atual como a cabeça da lista
            while ($current->next !== null) { // Percorrendo a lista até o último nó
                $current = $current->next; // Movendo para o próximo nó na lista
            }
            $current->next = $newNode; // Inserindo o novo nó no final da lista
        }
    }

    public function display() {
        //display(): Percorre a lista desde a cabeça até o último nó e exibe
        $current = $this->head; // Definindo o nó atual como a cabeça da lista
        while ($current !== null) { // Percorrendo a lista até encontrar o último nó
            echo $current->data . " "; // Exibindo valor do nó atual
            $current = $current->next; // Movendo para o próximo nó na lista
        }
    }
}

// Exemplo de uso
$list = new LinkedList(); // Cria uma nova lista ligada
$list->insert("Coca 2L");  // Inserindo valores
$list->insert("Torta de Limão"); 
$list->insert("Pastel");

$list->display(); // Exibe os valores da lista: Coca 2L Torta de Limão  Pastel

