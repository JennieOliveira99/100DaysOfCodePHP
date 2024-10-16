<?php
require_once 'Conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    try {
        $conexao = new Conexao();
        $con = $conexao->abrirConexao();

        $stmt = $con->prepare("SELECT * FROM usuarios WHERE usuario = ?");
        $stmt->execute([$usuario]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($senha, $user['senha'])) {
            echo "Login bem-sucedido!";
            // Redirecionar para a página inicial do usuário
        } else {
            echo "Usuário ou senha inválidos!";
        }

        $conexao->fecharConexao();
    } catch (PDOException $e) {
        echo "Erro ao realizar login: " . $e->getMessage();
    }
}
