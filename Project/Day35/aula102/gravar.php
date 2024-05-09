<?php

$codigo = $_POST['codigo'];
$nome = $_POST['nome'];
$sexo = $_POST['sexo'];

$dados = [
    'codigo' => $codigo,
    'nome' => $nome,
    'sexo' => $sexo
];

$json = json_encode($dados);

// 1 - NOME DO ARQUIVO
$nome_arquivo = "banco/$codigo.json";

//2 - ABRIR O ARQUIVO EM MEMÓRIA
$recurso = fopen($nome_arquivo, 'a+');

// 3 - ESCREVER NO ARQUIVO - \n e PHP_EOL servem para quebra de linha;
fwrite($recurso, $json);

// 4 - FECHAR O RECURSO, PARA RETIRAR DA MEMÓRIA
fclose($recurso);