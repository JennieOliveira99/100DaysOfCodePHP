<?php

// Classe que representa um nó de uma lista encadeada.
class No
{
    public $tarefa;
    public $proximo;

    public function __construct($tarefa)
    {
        $this->tarefa = $tarefa;
        $this->proximo = null;
    }
}

// Classe que representa a lista encadeada de tarefas.
class ListaTarefas
{
    private $cabeca;

    public function __construct()
    {
        $this->cabeca = null;
    }

    // Adiciona uma tarefa à lista.
    public function adicionar($tarefa)
    {
        $novoNo = new No($tarefa);
        if ($this->cabeca == null) {
            $this->cabeca = $novoNo;
        } else {
            $atual = $this->cabeca;
            while ($atual->proximo != null) {
                $atual = $atual->proximo;
            }
            $atual->proximo = $novoNo;
        }
    }

    // Remove uma tarefa pelo seu índice.
    public function remover($indice)
    {
        if ($this->cabeca == null)
            return;

        if ($indice == 0) {
            $this->cabeca = $this->cabeca->proximo;
            return;
        }

        $atual = $this->cabeca;
        $anterior = null;
        $contador = 0;

        while ($atual != null && $contador != $indice) {
            $anterior = $atual;
            $atual = $atual->proximo;
            $contador++;
        }

        if ($atual != null) {
            $anterior->proximo = $atual->proximo;
        }
    }

    // Obtém todas as tarefas em forma de array.
    public function getAll()
    {
        $tarefas = [];
        $atual = $this->cabeca;

        while ($atual != null) {
            $tarefas[] = $atual->tarefa;
            $atual = $atual->proximo;
        }

        return $tarefas;
    }
}

