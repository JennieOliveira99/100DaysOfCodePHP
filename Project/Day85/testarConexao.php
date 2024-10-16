<?php
require_once 'Conexao.php';

$conexao = new Conexao();
$con = $conexao->abrirConexao();

// Aguarda por 4 segundos
sleep(4);

$conexao->fecharConexao();

