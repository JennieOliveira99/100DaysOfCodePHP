<?php
include 'tarefa.php';

session_start();

// Cria uma lista de tarefas se não existir
if (!isset($_SESSION['tarefas'])) {
    $_SESSION['tarefas'] = new ListaTarefas();
}

$listaTarefas = $_SESSION['tarefas'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'tarefas_handler.php'; // Lida com a adição e remoção de tarefas
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tarefas</title>
</head>

<body>
    <h1>Lista de Tarefas</h1>
    <form method="post" action="index.php">
        <input type="text" name="nova_tarefa" placeholder="Adicione uma nova tarefa" required>
        <button type="submit" name="acao" value="adicionar">Adicionar</button>
    </form>

    <h2>Tarefas:</h2>
    <ul>
        <?php foreach ($listaTarefas->getAll() as $id => $tarefa): ?>
            <li>
                <?php echo htmlspecialchars($tarefa); ?>
                <form method="post" action="index.php" style="display:inline;">
                    <input type="hidden" name="id_tarefa" value="<?php echo $id; ?>">
                    <button type="submit" name="acao" value="remover">Remover</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>