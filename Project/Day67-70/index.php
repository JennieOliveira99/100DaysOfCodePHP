<?php
// Árvores são estruturas de dados hierárquicas.
// Cada árvore tem:
// 1. Um nó raiz, que é o ponto de entrada.
// 2. Nós que podem ter filhos (nós descendentes).
// 3. Folhas, que são nós que não têm filhos.
// 4. Cada nó tem um "pai" (exceto a raiz).
// 5. Subárvore, que é qualquer porção da árvore a partir de um nó.


// Definindo a classe de um nó para uma árvore binária.
class No
{
    public $valor; // Dado armazenado no nó.
    public $esquerda; // Referência para o filho à esquerda.
    public $direita; // Referência para o filho à direita.

    public function __construct($valor)
    {
        $this->valor = $valor;
        $this->esquerda = null;
        $this->direita = null;
    }
}

// Classe para representar uma árvore binária.
class ArvoreBinaria
{
    public $raiz; // A raiz da árvore.

    public function __construct()
    {
        $this->raiz = null;
    }

    // Método para adicionar um valor à árvore.
    public function adicionar($valor)
    {
        $novoNo = new No($valor);

        // Se a árvore está vazia, o novo nó se torna a raiz.
        if ($this->raiz === null) {
            $this->raiz = $novoNo;
        } else {
            // Caso contrário, chama o método para inserir recursivamente.
            $this->inserir($this->raiz, $novoNo);
        }
    }

    // Método auxiliar para inserir um nó na árvore.
    private function inserir($no, $novoNo)
    {
        if ($novoNo->valor < $no->valor) {
            // Insere no lado esquerdo se o valor for menor.
            if ($no->esquerda === null) {
                $no->esquerda = $novoNo;
            } else {
                $this->inserir($no->esquerda, $novoNo);
            }
        } else {
            // Insere no lado direito se o valor for maior ou igual.
            if ($no->direita === null) {
                $no->direita = $novoNo;
            } else {
                $this->inserir($no->direita, $novoNo);
            }
        }
    }

    // Percorrendo a árvore em ordem (in-order traversal).
    // Esquerda -> Raiz -> Direita
    public function emOrdem($no)
    {
        if ($no !== null) {
            $this->emOrdem($no->esquerda);
            echo $no->valor . " ";
            $this->emOrdem($no->direita);
        }
    }

    // Percorrendo a árvore em pré-ordem (pre-order traversal).
    // Raiz -> Esquerda -> Direita
    public function preOrdem($no)
    {
        if ($no !== null) {
            echo $no->valor . " ";
            $this->preOrdem($no->esquerda);
            $this->preOrdem($no->direita);
        }
    }

    // Percorrendo a árvore em pós-ordem (post-order traversal).
    // Esquerda -> Direita -> Raiz
    public function posOrdem($no)
    {
        if ($no !== null) {
            $this->posOrdem($no->esquerda);
            $this->posOrdem($no->direita);
            echo $no->valor . " ";
        }
    }
}

// Exemplo de uso da árvore binária.
$arvore = new ArvoreBinaria();
$arvore->adicionar(8);
$arvore->adicionar(3);
$arvore->adicionar(10);
$arvore->adicionar(1);
$arvore->adicionar(6);
$arvore->adicionar(14);
$arvore->adicionar(4);
$arvore->adicionar(7);
$arvore->adicionar(13);

// Exibindo os elementos da árvore em diferentes ordens.
echo "Percorrendo a árvore em ordem (in-order):\n";
$arvore->emOrdem($arvore->raiz);
echo "\n";

echo "Percorrendo a árvore em pré-ordem (pre-order):\n";
$arvore->preOrdem($arvore->raiz);
echo "\n";

echo "Percorrendo a árvore em pós-ordem (post-order):\n";
$arvore->posOrdem($arvore->raiz);
echo "\n";
