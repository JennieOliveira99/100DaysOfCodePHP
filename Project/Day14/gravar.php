<?php

//var_dump($_POST);

//validando o formulario com isset(se o usuario selecionou os campos)
if(!isset($_POST['Linguagem'])){
    echo "Informe pelo menos 1 linguagem";
}
//validacao do radio ocorre no html pelo checked
//recebendo os envios
foreach($_POST['Linguagem'] as $linguagem){
    echo "$linguagem <br>";
}

echo 'Grau de conhecimento: ' . $_POST['conhecimento'];