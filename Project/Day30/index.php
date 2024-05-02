<?php
class GerenciadorTarefas {
    private $pilhaTarefas;

    public function __construct() {
        $this->pilhaTarefas = array();
    }

    public function adicionarTarefa($tarefa) {
        array_push($this->pilhaTarefas, $tarefa);
        echo "Tarefa adicionada: $tarefa<br>";
    }

    public function completarTarefa() {
        if ($this->isEmpty()) {
            echo "Não há tarefas a completar.<br>";
            return;
        }
        $tarefa = array_pop($this->pilhaTarefas);
        echo "Tarefa completada: $tarefa<br>";
    }

    public function isEmpty() {
        return empty($this->pilhaTarefas);
    }
}

// Simulando o uso do gerenciador de tarefas
$gerenciador = new GerenciadorTarefas();
$gerenciador->adicionarTarefa("Lavar a louça");
$gerenciador->adicionarTarefa("Pagar as contas");
$gerenciador->adicionarTarefa("Fazer compras");

echo "<br>Completando tarefas:<br>";
$gerenciador->completarTarefa();
$gerenciador->completarTarefa();
$gerenciador->completarTarefa();
$gerenciador->completarTarefa(); // Tentando completar uma tarefa quando não há mais tarefas
?>
