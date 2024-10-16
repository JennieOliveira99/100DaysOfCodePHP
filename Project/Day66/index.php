<?php

// Classe que representa um nó da lista duplamente encadeada.
class No
{
    public $dado;
    public $proximo;
    public $anterior;

    public function __construct($dado)
    {
        $this->dado = $dado;
        $this->proximo = null;
        $this->anterior = null;
    }
}

// Classe que representa uma lista duplamente encadeada.
class ListaDuplamenteEncadeada
{
    private $cabeca;
    private $cauda;

    public function __construct()
    {
        $this->cabeca = null;
        $this->cauda = null;
    }

    // Adiciona um novo nó ao final da lista.
    public function adicionar($dado)
    {
        $novoNo = new No($dado);

        if ($this->cabeca === null) {
            // Lista vazia, o novo nó é a cabeça e a cauda.
            $this->cabeca = $novoNo;
            $this->cauda = $novoNo;
        } else {
            // Conecta o novo nó ao último da lista.
            $novoNo->anterior = $this->cauda;
            $this->cauda->proximo = $novoNo;
            $this->cauda = $novoNo;
        }
    }

    // Remove um nó específico pelo índice.
    public function remover($indice)
    {
        if ($this->cabeca === null) {
            return; // Lista vazia.
        }

        $atual = $this->cabeca;
        $contador = 0;

        while ($atual !== null && $contador < $indice) {
            $atual = $atual->proximo;
            $contador++;
        }

        if ($atual !== null) {
            if ($atual->anterior !== null) {
                $atual->anterior->proximo = $atual->proximo;
            } else {
                // Caso especial: removendo a cabeça.
                $this->cabeca = $atual->proximo;
            }

            if ($atual->proximo !== null) {
                $atual->proximo->anterior = $atual->anterior;
            } else {
                // Caso especial: removendo a cauda.
                $this->cauda = $atual->anterior;
            }
        }
    }

    // Obtém todos os dados da lista em forma de array.
    public function getAll()
    {
        $dados = [];
        $atual = $this->cabeca;

        while ($atual !== null) {
            $dados[] = $atual->dado;
            $atual = $atual->proximo;
        }

        return $dados;
    }
}

// Exemplo de uso da lista duplamente encadeada.
$lista = new ListaDuplamenteEncadeada();
$lista->adicionar('Tarefa 1');
$lista->adicionar('Tarefa 2');
$lista->adicionar('Tarefa 3');

// Remover a segunda tarefa (índice 1).
$lista->remover(1);

// Exibe todas as tarefas restantes.
echo "Tarefas restantes:\n";
foreach ($lista->getAll() as $tarefa) {
    echo $tarefa . "\n";
}
