<?php


class Carro
{
    // Atributos da classe
    private $marca;
    private $modelo;
    private $cor;
    private $preco;

    // Construtor: chamado quando um novo objeto é criado
    public function __construct($marca, $modelo, $cor, $preco)
    {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->cor = $cor;
        $this->preco = $preco;
        echo "Um carro da marca {$this->marca} modelo {$this->modelo} foi criado!\n";
    }

    // Método para exibir informações do carro
    public function exibirInformacoes()
    {
        echo "Marca: {$this->marca}, Modelo: {$this->modelo}, Cor: {$this->cor}, Preço: R$ {$this->preco}\n";
    }

    // Destrutor: chamado quando o objeto é destruído
    public function __destruct()
    {
        echo "O carro da marca {$this->marca} modelo {$this->modelo} está indo embora...\n";
    }
}

// Criando objetos (instâncias da classe Carro)
$carro1 = new Carro("Volkswagen", "Gol", "Prata", 49990.00);
$carro2 = new Carro("Ford", "Fiesta", "Preto", 57990.00);

// Exibindo as informações dos carros
$carro1->exibirInformacoes();
$carro2->exibirInformacoes();

