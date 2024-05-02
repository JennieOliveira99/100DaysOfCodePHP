<?php

// Definindo a classe Pilha
class Pilha {
    // Propriedade para armazenar os elementos da pilha
    private $pilha = [];

    // Método para retornar o elemento no topo da pilha
    public function NoTopo() {
        return end($this->pilha);
    }

    // Método para verificar se a pilha está vazia
    public function EstaVazia() {
        return empty($this->pilha);
    }

    // Método para adicionar um elemento à pilha
    public function Adicionar($elemento) {
        array_push($this->pilha, $elemento);
    }

    // Método para remover o elemento do topo da pilha
    public function Remover() {
        array_pop($this->pilha);
    }

    // Método para remover todos os elementos da pilha
    public function RemoverTodos() {
        while (!$this->EstaVazia()) {
            $this->Remover();
        }
    }

    // Método para listar os elementos da pilha
    public function Listar() {
        return array_reverse($this->pilha);
    }
}

// Instanciando a classe Pilha
$pilha = new Pilha();

// Adicionando elementos à pilha
$pilha->Adicionar("C#");
$pilha->Adicionar("C++");
$pilha->Adicionar("Java");
$pilha->Adicionar("Python");
$pilha->Adicionar("Ruby");//ultimo na pilha, 1° a ser exibido
$pilha->Adicionar("Remover esse elemento");

// Removendo um elemento da pilha
$pilha->Remover();

// Exibindo os elementos restantes na pilha
foreach ($pilha->Listar() as $item) {
    echo $item . "<br>";
}
