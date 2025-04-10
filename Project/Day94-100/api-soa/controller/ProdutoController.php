<?php
require_once './model/ProdutoModel.php';
require_once './service/JwtService.php'

class ProdutoController{
    public function find(Request $request, Response $response, array $url)
    {
        $response::json(['token' => JwtService::gerarJWT()], 200);
      //  var_dump($url);
    // $response::json(['status' => 'sucesso'], 200);
    }

    public function findAll(Request $request, Response $response, array $url)
    {
        $produtoModel = new ProdutoModel();
        $response::json(['dados' => $produtoModel->selectAll()], 200);
    }
    public function adicionarProduto(Request $request, Response $response, array $url)
    {
        $campos = $request->body();//primeiro passo: receber dados<<<<<<<<<<<<<<<<<<

        if ($campos['nome'] == ''){
            $response::json(['status' => 'Informe o nome do produto'], 406);
            exit;//tudo  que tiver abaixo nao sera executado
        }

        if ($campos['cod'] == ''){
            $response::json(['status' => 'Informe o Codigo do produto'], 406);
            exit;//tudo  que tiver abaixo nao sera executado
        }


        
        if ($campos['categoria'] == ''){//categoria vazia?
            $response::json(['status' => 'Informe o categoria do produto'], 406);
            exit;//tudo  que tiver abaixo nao sera executado
        }else if(!is_numeric($campos['categoria'])){
            $response::json(['status' => 'A categoria deve ser um numero inteiro'], 406);
            exit;
        }

        $produtoModel = new ProdutoModel();
        ///passando o nome que escrever no insomnia
        $produto = $produtoModel->selectDescricao($campos['nome']);
        if(!empty($produto)){
            $response::json(['status' => "'Produto '".$campos['nome']."'já existe!"], 406);
        exit;
        }
        $retorno = $produtoModel->insert($campos);
        $produto = $produtoModel->selectSKU($campos['cod']);

        if(!empty($produto)){
            $response::json(['status' => "'Produto com SKU: '".$campos['cod']."'já existe!"], 406);
        exit;
        }
        $retorno = $produtoModel->insert($campos);

        if($retorno){
            $response::json(['status' => 'Adcionado com sucesso'], 201);
        } else{
            $response::json(['status' => 'Erro ao inserir'], 500);
        }

    }


    public function editarProduto(Request $request, Response $response, array $url)
    {
        $campos = $request->body();
        $produtoModel = new ProdutoModel();
        $retorno = $produtoModel->edit($campos);

        if($retorno){
            $response::json(['status' => 'Atualizado com sucesso'], 201);
        } else{
            $response::json(['status' => 'Erro ao atualizar'], 500);
        }
    }
    public function delProduto(Request $request, Response $response, array $url)
    {
        $produtoModel = new ProdutoModel();
//impedindo que a api quebre caso inserir letras no insomnia
        if(!is_numeric($url[0])){
            $response::json(['status' => 'O ID deve ser numero inteiro'], 406);
            exit;
        }
$produto = $produtoModel->selectId($url[0]);

        //$retorno = $produtoModel -> delete($url[0]);

        if (empty($produto)){
            $response::json(['status' => 'Registro nao encontrado'], 404);
            exit;
        }


        $retorno = $produtoModel -> delete($url[0]);
        if($retorno){
            $response::json(['status' => 'Deletado com sucesso'], 203);
        } else{
            $response::json(['status' => 'Erro ao excluir'], 500);
        }
        
    }
}
