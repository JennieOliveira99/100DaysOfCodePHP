<?php
require_once './model/CategoriaModel.php';

class CategoriaController
{
    public function find(Request $request, Response $response, array $url)
    {
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
        $campos = $request->body(); // Recebendo dados

        if ($campos['nome'] == '') {
            $response::json(['status' => 'Informe o nome da categoria'], 406);
            exit; // Impede que o código abaixo seja executado
        }

        if ($campos['descricao'] == '') {
            $response::json(['status' => 'Informe a descrição da categoria'], 406);
            exit; // Impede que o código abaixo seja executado
        }

        $categoriaModel = new CategoriaModel();
        $categoria = $categoriaModel->selectDescricao($campos['nome']);
        if (!empty($categoria)) {
            $response::json(['status' => "'Categoria '" . $campos['nome'] . "' já existe!"], 406);
            exit;
        }

        $retorno = $categoriaModel->insert($campos);

        if ($retorno) {
            $response::json(['status' => 'Adicionada com sucesso'], 201);
        } else {
            $response::json(['status' => 'Erro ao inserir'], 500);
        }
    }

    public function editarCategoria(Request $request, Response $response, array $url)
    {
        // Obtém os dados do corpo da requisição
        $campos = $request->body();

        // Verifica se os dados necessários estão presentes
        if (!isset($campos['id']) || !isset($campos['nome']) || !isset($campos['descricao'])) {
            throw new \Exception("Dados incompletos para edição da categoria.");
        }

        // Aqui você deve prosseguir com a lógica de edição...
        $categoriaModel = new CategoriaModel();
        $retorno = $categoriaModel->edit($campos);

        if ($retorno) {
            $response::json(['status' => 'Atualizada com sucesso'], 201);
        } else {
            $response::json(['status' => 'Erro ao atualizar'], 500);
        }
    }


    public function delCategoria(Request $request, Response $response, array $url)
    {
        $categoriaModel = new CategoriaModel();

        // Verifica se o ID é um número
        if (!is_numeric($url[0])) {
            $response::json(['status' => 'O ID deve ser número inteiro'], 406);
            exit;
        }

        $categoria = $categoriaModel->selectId($url[0]);

        if (empty($categoria)) {
            $response::json(['status' => 'Registro não encontrado'], 404);
            exit;
        }

        $retorno = $categoriaModel->delete($url[0]);

        if ($retorno) {
            $response::json(['status' => 'Deletada com sucesso'], 203);
        } else {
            $response::json(['status' => 'Erro ao excluir'], 500);
        }
    }
}
