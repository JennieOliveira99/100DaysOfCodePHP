<?php
// Programação Orientada a Objetos (POO) em PHP
// Focando em Construtores e Destrutores

class Gato
{
    // Atributos da classe
    private $raca;
    private $cor;
    private $idade;

    // Construtor: chamado quando um novo objeto é criado
    public function __construct($raca, $cor, $idade)
    {
        $this->raca = $raca;
        $this->cor = $cor;
        $this->idade = $idade;
        echo "Um gato da raça {$this->raca} foi criado!\n";
    }

    // Método para exibir informações do gato
    public function exibirInformacoes()
    {
        echo "Raça: {$this->raca}, Cor: {$this->cor}, Idade: {$this->idade} anos\n";
    }

    // Destrutor: chamado quando o objeto é destruído
    public function __destruct()
    {
        echo "O gato da raça {$this->raca} está indo embora...\n";
    }
}

// Criando objetos (instâncias da classe Gato)
$gato1 = new Gato("Persa", "Branco", 3);
$gato2 = new Gato("Siamês", "Cinza", 2);

// Exibindo as informações dos gatos
$gato1->exibirInformacoes();
$gato2->exibirInformacoes();

// Finalizando o script, os objetos serão destruídos automaticamente

