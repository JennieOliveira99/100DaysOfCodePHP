<?php

$origem = 'banco';
$arquivos = scandir($origem);


foreach($arquivos as $arquivo){
    if ($arquivo != '.' and $arquivo != '..'){
        
        // 1 - NOME DO ARQUIVO
        $nome_arquivo = "banco/$arquivo";

        //2 - ABRIR O ARQUIVO EM MEMÓRIA
        $recurso = fopen($nome_arquivo, 'a+');

        // 3 - LER ARQUIVO 
        $json_cadastro = fread($recurso, filesize($nome_arquivo));

        $dados = json_decode($json_cadastro);
        
        echo 'Código: ' . $dados -> codigo . '<br>';
        echo 'Nome: ' . $dados -> nome . '<br>';
        echo 'Sexo: ' . $dados -> sexo . '<br>';
        echo '-----------------------<br>';

        // 4 - FECHAR O RECURSO, PARA RETIRAR DA MEMÓRIA
        fclose($recurso);

       
    }
}
