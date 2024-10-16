<?php


class Camiseta
{
    // Atributos da classe
    private $nomeMarca;
    private $cor;
    private $preco;

    // Construtor: chamado quando um novo objeto é criado
    public function __construct($nomeMarca, $cor, $preco)
    {
        $this->nomeMarca = $nomeMarca;
        $this->cor = $cor;
        $this->preco = $preco;
        echo "Uma camiseta da marca {$this->nomeMarca} foi criada!\n";
    }

    // Método para exibir informações da camiseta
    public function exibirInformacoes()
    {
        echo "Marca: {$this->nomeMarca}, Cor: {$this->cor}, Preço: R$ {$this->preco}\n";
    }

    // Destrutor: chamado quando o objeto é destruído
    public function __destruct()
    {
        echo "A camiseta da marca {$this->nomeMarca} está indo embora...\n";
    }
}

// Criando objetos (instâncias da classe Camiseta)
$camiseta1 = new Camiseta("Nike", "Preto", 149.99);
$camiseta2 = new Camiseta("Adidas", "Branco", 129.99);

// Exibindo as informações das camisetas
$camiseta1->exibirInformacoes();
$camiseta2->exibirInformacoes();


