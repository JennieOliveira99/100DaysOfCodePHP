<?php
require_once 'Conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $confSenha = $_POST['confSenha'];

    if ($senha !== $confSenha) {
        echo "As senhas não correspondem!";
        exit;
    }

    try {
        $conexao = new Conexao();
        $con = $conexao->abrirConexao();

        $stmt = $con->prepare("INSERT INTO usuarios (nome, usuario, senha) VALUES (?, ?, ?)");
        $stmt->execute([$nome, $usuario, password_hash($senha, PASSWORD_DEFAULT)]);

        echo "Cadastro realizado com sucesso!";

        $conexao->fecharConexao();
    } catch (PDOException $e) {
        echo "Erro ao cadastrar: " . $e->getMessage();
    }
}
