<?php
// Programação Orientada a Objetos (POO) em PHP

class Gato
{
    // Atributos (características)
    private $raca; // Raça do gato
    private $cor; // Cor do gato
    private $idade; // Idade do gato

    // Construtor: Método especial chamado ao criar um novo objeto.
    public function __construct($raca, $cor, $idade)
    {
        $this->raca = $raca; // Inicializa a raça
        $this->cor = $cor; // Inicializa a cor
        $this->idade = $idade; // Inicializa a idade
    }

    // Método para exibir as informações do gato.
    public function exibirInformacoes()
    {
        echo "Gato: Raça: {$this->raca}, Cor: {$this->cor}, Idade: {$this->idade} anos\n";
    }

    // Métodos para modificar os atributos (setters)
    public function setRaca($raca)
    {
        $this->raca = $raca;
    }

    public function setCor($cor)
    {
        $this->cor = $cor;
    }

    public function setIdade($idade)
    {
        $this->idade = $idade;
    }

    // Métodos para acessar os atributos (getters)
    public function getRaca()
    {
        return $this->raca;
    }

    public function getCor()
    {
        return $this->cor;
    }

    public function getIdade()
    {
        return $this->idade;
    }
}

// Criando objetos (instâncias da classe Gato)
$gato1 = new Gato("Persa", "Branco", 3);
$gato2 = new Gato("Siamês", "Cinza", 2);

// Exibindo as informações dos gatos
$gato1->exibirInformacoes();
$gato2->exibirInformacoes();

// Modificando as informações do gato1
$gato1->setIdade(4);
$gato1->setCor("Branco com manchas");

echo "Informações atualizadas do gato 1:\n";
$gato1->exibirInformacoes();
