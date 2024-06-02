<?php

$origem = 'banco';
$arquivos = scandir($origem);

foreach($arquivos as $arquivo){
    if ($arquivo != '.' and $arquivo != '..'){
        // 1 - NOME DO ARQUIVO
        $nome_arquivo = "banco/$arquivo";

        // 2 -ABRIR O ARQUIVO EM MEMÓRIA
        $recurso = fopen($nome_arquivo, 'a+');

        // 3 - LER ARQUIVO
        $json_cadastro = fread($recurso, filesize($nome_arquivo));

        $dados = json_decode($json_cadastro);
        
        echo 'Categoria' . $dados->Categoria . '<br>';
        echo  'NomeProduto'.$dados->NomeProduto  . '<br>';
        echo  'NomeMarca' .$dados->NomeMarca . '<br>';
        echo  'DescricaoProduto' . $dados->DescricaoProduto . '<br>';
        echo 'disponibilidade' . $dados->disponibilidadeOpcao . '<br>';
        echo 'valorPreco' . $dados->valorPreco . '<br>';
        echo 'DimensaoProdutoAltura' . $dados->DimensaoProdutoAltura . '<br>';
        echo  'CodigoDeBarras' . $dados->CodigoDeBarras . '<br>';
        echo  'data' . $dados->data . '<br>';
        echo  'garantia' . $dados->$garantiaOpcao . '<br>';
        echo  'tamanho' . $dados->tamanho . '<br>';
        echo  'conservacao' . $dados->conservacaoOpcao;
        echo  'NomeDoFabricante' . $dados->dados->nomeFabricante . '<br>';
        echo  'EnderecoFabricante' . $dados->enderecoFabricante . '<br>';

        echo '----------------------------- <br>';

        // 4 - FECHAR O RECURSO, PARA RETIRAR DA MEMÓRIA
        fclose($recurso);
    }
}