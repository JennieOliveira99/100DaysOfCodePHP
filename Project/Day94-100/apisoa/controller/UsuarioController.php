<?php

require_once './model/PerfilModel.php';
require_once './model/UsuarioModel.php';

class UsuarioController
{

    public function addPerfil(Request $request, Response $response, array $url)
    {
        $campos = $request->body();

        if ($campos['nome'] == '') {

            $response::json(['status' => 'Informe o seu nome !'], 406);
            exit;
        }

        if ($campos['email'] == '') {

            $response::json(['status' => 'Informe o seu email !'], 406);
            exit;
        }

        if (!preg_match('/[@]/', $campos['email'])) {

            $response::json(['status' => 'Email inválido !'], 406);
            exit;
        }

        if ($campos['perfil_descricao'] == '') {

            $response::json(['status' => 'Informe a descrição do seu perfil !'], 406);
            exit;
        }

        if ($campos['status'] == '') {

            $response::json(['status' => 'Informe a descrição do seu perfil !'], 406);
            exit;
        }

        //Aceita somnente estes status
        $cargos = ['ATIVO', 'INATIVO'];

        if (!in_array($campos['status'], $cargos)) {

            $response::json(['status' => 'Status inválido !'], 406);
            exit;
        }


        //Aceita somnente estes cargos
        $cargos = ['ADMIN', 'GERENTE', 'SUPERVISOR', 'FUNCIONARIO'];

        if (!in_array($campos['perfil_descricao'], $cargos)) {

            $response::json(['status' => 'Cargo inválido !'], 406);
            exit;
        }

        $usuarioModel = new UsuarioModel();

        //Valida se email já existe
        $usuario = $usuarioModel->selectEmail($campos['email']);

        if (!empty($usuario)) {

            $response::json(['status' => 'Email já cadastrado !'], 406);
            exit;
        }

        $perfilModel =  new PerfilModel();


        //Verifica se já tem a descrição no banco
        $perfil = $perfilModel->selectDescricao($campos['perfil_descricao']);

        if ($perfil) {

            $campos['perfil_id'] = $perfil->id;
        } else {

            $perfil = $perfilModel->insert($campos);

            if ($perfil) {

                //Busca o campo cadastrado
                $perfil = $perfilModel->selectDescricao($campos['perfil_descricao']);

                $campos['perfil_id'] = $perfil->id;
            } else {

                $response::json(['status' => 'O novo perfil não foi possível ser cadastrado !'], 406);
                exit;
            }
        }

        $usuarioModel = new UsuarioModel();
        $insert = $usuarioModel->insertUsuario($campos);

        if ($insert) {

            $response::json(['status' => 'Cadastrado com sucesso !'], 406);
            exit;
        } else {

            $response::json(['Falha ao cadastrar !'], 406);
            exit;
        }
    }

    public function editarPerfil(Request $request, Response $response, array $url)
    {

        $campos = $request->body();

        if ($campos['id'] == '') {

            $response::json(['status' => 'Informe o id do usuário que será alterado !'], 406);
            exit;
        }

        if ($campos['nome'] == '') {

            $response::json(['status' => 'Informe o seu nome !'], 406);
            exit;
        }

        if ($campos['email'] == '') {

            $response::json(['status' => 'Informe o seu email !'], 406);
            exit;
        }

        if (!preg_match('/[@]/', $campos['email'])) {

            $response::json(['status' => 'Email inválido !'], 406);
            exit;
        }

        if ($campos['perfil_descricao'] == '') {

            $response::json(['status' => 'Informe a descrição do seu perfil !'], 406);
            exit;
        }

        if ($campos['status'] == '') {

            $response::json(['status' => 'Informe o status do seu perfil !'], 406);
            exit;
        }

        //Aceita somnente estes status
        $cargos = ['ATIVO', 'INATIVO'];

        if (!in_array($campos['status'], $cargos)) {

            $response::json(['status' => 'Status inválido !'], 406);
            exit;
        }


        //Aceita somnente estes cargos
        $cargos = ['ADMIN', 'GERENTE', 'SUPERVISOR', 'FUNCIONARIO'];

        if (!in_array($campos['perfil_descricao'], $cargos)) {

            $response::json(['status' => 'Cargo inválido !'], 406);
            exit;
        }



        $perfilModel =  new PerfilModel();
        //Verifica se já tem a descrição no banco
        $perfil = $perfilModel->selectDescricao($campos['perfil_descricao']);

        if ($perfil) {

            $campos['perfil_id'] = $perfil->id;
        } else {

            $perfil = $perfilModel->insert($campos);

            if ($perfil) {

                //Busca o campo cadastrado
                $perfil = $perfilModel->selectDescricao($campos['perfil_descricao']);

                $campos['perfil_id'] = $perfil->id;
            } else {

                $response::json(['status' => 'O novo perfil não foi possível ser cadastrado !'], 406);
                exit;
            }
        }

        $usuarioModel = new UsuarioModel();

        $retorno = $usuarioModel->selectEmail($campos['email']);
        $retorno1 =  $usuarioModel->selectId($campos['id']);

        if ($retorno) {


            if ($campos['email'] != $retorno1->email) {

                $response::json(['status' => 'O email já existe !'], 406);
                exit;
            }
        }


        $insert = $usuarioModel->editUsuario($campos);

        if ($insert) {

            $response::json(['status' => 'Alterado com sucesso !'], 406);
            exit;
        } else {

            $response::json(['Falha ao alterar !'], 406);
            exit;
        }
    }

    public function find(Request $request, Response $response, array $url)
    {

        $usuarioModel = new UsuarioModel();

        $response::json(['Usuario' => $usuarioModel->selectId($url[0])], 200);
    }

    public function findAll(Request $request, Response $response, array $url)
    {

        $usuarioModel = new UsuarioModel();
        $response::json(['dados' => $usuarioModel->selectAll()], 200);
    }
    public function deletarUsuario(Request $request, Response $response, array $url)
    {
        $usuarioModel = new UsuarioModel();

        if(!is_numeric($url[0])){
            $response::json(['status'=>'O ID deve ser um número inteiro válido'],404);
            exit;
        }

        $usuario = $usuarioModel -> selectId($url[0]);

        if(empty($usuario)){
            $response::json(['status' => 'Usuário não encontrado'],404);
            exit;
        }

        $retorno = $usuarioModel-> deleteUsuario($url[0]);

        if($retorno){
            $response::json(['status' => 'Usuário deletado com sucesso'],202);
        } else {
            $response::json(['status' => 'Erro ao deletar usuário'],500);
        }
    }
}
