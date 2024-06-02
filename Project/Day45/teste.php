<?php

//ta com erro na escrita  json

$Categoria = $_POST['Categoria'];
$NomeProduto = $_POST['NomeProduto'];
$NomeMarca = $_POST['NomeMarca'];
$DescricaoProduto = $_POST['DescricaoProduto'];
$disponibilidadeOpcao = $_POST['disponibilidade'];
$valorPreco = $_POST['valorPreco'];
$DimensaoProdutoAltura = $_POST['DimensaoProdutoAltura'];
$CodigoDeBarras = $_POST['CodigoDeBarras'];
$data = $_POST['data'];
$garantiaOpcao = $_POST['garantia'];
$tamanho = $_POST['tamanho'];
$conservacaoOpcao = $_POST['conservacao'];
$nomeFabricante = $_POST['NomeDoFabricante'];
$enderecoFabricante = $_POST['EnderecoFabricante'];

// Define o caminho completo para o arquivo JSON
//nome_arquivo = "/opt/lampp/htdocs/Estrutura/atv/banco/$CodigoDeBarras.json";

$dados = [
    $Categoria,
    $NomeProduto,
    $NomeMarca,
    $DescricaoProduto,
    $disponibilidadeOpcao,
    $valorPreco,
    $DimensaoProdutoAltura,
    $CodigoDeBarras,
   $data,
   $garantiaOpcao,
   $tamanho,
   $conservacaoOpcao,
   $nomeFabricante,
  $enderecoFabricante
];

var_dump($dados);

$json = json_encode($dados);

//variavel json para arquivo .json

// Nome do arquivo
$nome_arquivo = "banco/$CodigoDeBarras.json";

// Abrir o arquivo em memória
$recurso = fopen($nome_arquivo, 'a+');

fwrite($recurso, $json);

fclose($recurso);



