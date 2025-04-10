<?php

require_once './model/CategoriaModel.php';

class CategoriaController{
    public function find(Request $request, Response $response, array $url){
var_dump($url);
$response::json(['status' => 'sucesso'], 200);
}

public function findAll(Request $request, Response $response, array $url)
{
$categoriaModel = new CategoriaModel();
$response::json(['dados' => $categoriaModel->selectAll()], 200);
}

public function adicionarCategoria(Request $request, Response $response, array $url)
{
    $campos = $request->body();//primeiro passo: receber dados<<<<<<<<<<<<<<<<<<

    if ($campos['descricao'] == ''){
        $response::json(['status' => 'Informe a descricao do produto'], 406);
        exit;//tudo  quee tiver abaixo nao sera executado
    }

    if ($campos['cod'] == ''){
        $response::json(['status' => 'Informe o Codigo do produto'], 406);
        exit;//tudo  quee tiver abaixo nao sera executado
    }


    
    if ($campos['categoria'] == ''){//categoria vazia?
        $response::json(['status' => 'Informe o categoria do produto'], 406);
        exit;//tudo  que tiver abaixo nao sera executado
    }else if(!is_numeric($campos['categoria'])){
        $response::json(['status' => 'A categoria deve ser um numero inteiro'], 406);
        exit;
    }
}


}