<?php

class Sorvete { //Definindo a classe Sorvete
    // Propriedades
    public $sabor; //atributos ou variáveis de instância
    public $valor; // (public)significa que podem ser acessadas de fora da classe.

    // Método construtor
    public function __construct($sabor, $valor) { // __construct() é chamado automaticamente quando um objeto é criado. 
       // inicializa as propriedades do objeto com os valores passados como parâmetros
        $this->sabor = $sabor;
        $this->valor = $valor;//atribuindo os valores dos parâmetros do construtor às propriedades $sabor e $valor do objeto
        echo "Um sorvete de $sabor foi criado.<br>";
    }

    // Método para comprar o sorvete
    public function comprar() { //método público da classe, permite que um objeto de sorvete seja comprado
        if ($this->valor <= 10.00) {
            echo "Você comprou o sorvete de {$this->sabor} por R$ {$this->valor}.<br>";
        } else {
            echo "Desculpe, o sorvete de {$this->sabor} é muito caro e você não pode comprar.<br>";
        }
    }
}

// Criando objeto Sorvete
$sorvete1 = new Sorvete("Morango", 5.99); // criando um novo objeto da classe Sorvete, passando "Morango" como sabor e 5.99 como valor
$sorvete2 = new Sorvete("Chocolate Belga", 12.50); // Exemplo de preço em reais

// Operações de compra com os sorvetes
//$sorvete->comprar();: Chama o método comprar() do objeto $sorvete, que realiza a operação de compra e exibe uma mensagem correspondente
$sorvete1->comprar(); // Saída: Você comprou o sorvete de Morango por R$ 5.99.
$sorvete2->comprar(); // Saída: Desculpe, o sorvete de Chocolate Belga é muito caro e você não pode comprar.
