<?php

//verificar se uma variável foi definida e se não é NULL: isset() 
//verificar se uma variável está vazia: empty() 
//verificar se uma variável NAO está vazia: !empty() 
//verificar o que foi enviado atraves do POST no HTML: if ($_SERVER["REQUEST_METHOD"] == "POST")

// Verificando se os dados foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //****************************************************************CATEGORIA
    // Verifica se o campo 'Categoria' foi enviado
    if (isset($_POST["Categoria"]) && !empty($_POST["Categoria"])) {
        // Imprimindo a categoria selecionada
        $categoria = $_POST["Categoria"];
        echo "Categoria selecionada: " . $categoria;
    } else {
        // Exibindo uma mensagem de erro se a categoria não foi selecionada
        echo "Por favor, selecione uma categoria.";
}

//****************************************************************NOME

    // Verifica se o campo 'NomeProduto' foi enviado
    if (isset($_POST["NomeProduto"])) {
        // Imprimindo o nome do produto
        $nomeProduto = $_POST["NomeProduto"];
        echo "<br>Nome do produto: " . $nomeProduto;
    } else {
        echo "<br>O campo Nome do Produto é obrigatório.";
}

//*******************************************************************MARCA
if (isset($_POST['NomeMarca'])){
    $nomeMarca = $_POST["NomeMarca"];
    echo "<br>Nome da marca: " . $nomeMarca;
}else {
    echo "<br>O campo Nome da Marca é obrigatório.";
}

}

// ******************************************DESCRICAO

if (isset($_POST['DescricaoProduto'])){
    $descricaoProduto = $_POST["DescricaoProduto"];
    echo "<br>Descrição do produto: " . $descricaoProduto;
}else {
    echo "<br>O campo Descrição é obrigatório.";
}


// *****************************************************************DISPONIBILIDADE
//echo '<br>Disponibilidade: ' . $_POST['disponibilidade'];

//criando um array para as disponibilidades
$disponibilidadeOpcao = array(
    "Disponivel" => "Disponível",
    "Indisponivel" => "Indisponível",
    "EmFalta" => "Em Falta",
    "EmPreVenda" => "Em Pré Venda",
    "ForaDeEstoque" => "Fora De Estoque"
);

//verificando se foi enviado

    if (isset($_POST["disponibilidade"])){
       echo "<br>Disponibilidade: " . $disponibilidadeOpcao[$_POST["disponibilidade"]];

    } else{
        echo "<br> O campo Disponibilidade é obrigatório.";
    }



// ******************************************************************PRECO DO PRODUTO
if(isset($_POST['valorPreco'])){
    $preco = $_POST["valorPreco"];
    echo "<br> Preço: " . $preco;
}
else{
    echo "<br> O campo Preço é obrigatório.";
}


//****************************************************************DIMENSOES

    // Verifica se o campo 'DimensaoProdutoAltura e DimensaoProdutoLargura' foi enviado
    if (isset($_POST["DimensaoProdutoAltura"]) && isset($_POST["DimensaoProdutoLargura"])) {
        // Imprimindo o nome do produto
        $DimensaoProdutoAltura = $_POST["DimensaoProdutoAltura"];
        $DimensaoProdutoLargura = $_POST["DimensaoProdutoLargura"];
        echo "<br>Altura: " . $DimensaoProdutoAltura . "px <br>Largura: " . $DimensaoProdutoLargura . "px";
    } else {
        echo "<br>O campo Dimensoes é obrigatório.";
    }


// ********************************************************************DATA DE VALIDADE
if (isset($_POST["data"])) {
    // Recebe o valor do campo 'data'
    $data = $_POST["data"];
    echo "Data selecionada: " . $data;
} else {
    echo "Nenhuma data selecionada.";
}

// *******************************************************************CODIGO DE BARRAS
if (isset($_POST["CodigoDeBarras"])) {
    // Imprimindo o nome do produto
    $codigoDeBarras = $_POST["CodigoDeBarras"];
    echo "<br>Codigo De Barras do Produto: " . $codigoDeBarras;
} else {
    echo "<br>O campo CodigoDeBarras é obrigatório.";
}


// **********************************************************************GARANTIA

//criando um array para as opçoes de garantia
$garantiaOpcao = array(
    "garantia_1_mes" => "Garantia 1 mês",
    "garantia_3_meses" => "Garantia 3 meses",
    "garantia_6_meses" => "Garantia 6 meses",
    "garantia_1_ano" => "Garantia 1 ano"
);
//verificando se foi enviado e se nao é nulo

    if (isset($_POST["garantia"])){
       echo "<br>Garantia: " . $garantiaOpcao[$_POST["garantia"]] . "<br>";

    } else{
        echo "<br> O campo Garantia é obrigatório. <br>";
}


// *********************************************************AVALIAÇÃO
if (isset ($_POST["tamanho"])){

     // Recebe o valor do campo 'tamanho'
     $avaliacao = $_POST["tamanho"];

        if ($avaliacao <= 25){
            $qualidade = "Péssimo";
        }elseif($avaliacao > 31 && $avaliacao < 60){
            $qualidade = "Regular";
        }elseif($avaliacao > 61 && $avaliacao < 80){
            $qualidade = "Bom";
        }else {
            $qualidade = "Excelente";
        }

        echo "Avaliação: $qualidade";
} else {
        echo "O campo de tamanho não foi enviado.";
}


// ****************************************************** Condicoes de conservacao 
//criando um array para as opçoes de Condicoes de conservacao 

$conservacaoOpcao = array(
    "embalagem_a_vacuo" => "Embalagem a vácuo",
    "controle_temperatura_umidade" => "Controle de temperatura e umidade",
    "local_fresco_seco" => "Armazenamento em local fresco e seco",
    "manutencao_regular" => "Manutenção regular",
    "produtos_quimicos_conservantes" => "Utilização de produtos químicos conservantes",
    "refrigeracao" => "Refrigeração"
);

// Verificando se foi enviado e se não é nulo
if (isset($_POST["conservacao"])) {
    echo "<br>Conservação do item: " . $conservacaoOpcao[$_POST["conservacao"]] . "<br>";
} else {
    echo "<br>O campo Conservação é obrigatório. <br>";
}


// *******************************************************************MATERIAIS

//Materiais
//validando o formulario com isset(se o usuario selecionou os campos)

if(!isset($_POST['Materiais'])){
    echo "<br>Informe pelo menos 1 Material";
    exit;//se nao veio, ele para aqui
    //exit nao carrega o codigo abaixo dele
}
 //recebendo os envios
foreach($_POST['Materiais'] as $materiais){
    echo " <br> Tipo de material: $materiais     <br>";
}

?>
