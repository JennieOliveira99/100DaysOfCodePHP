<?php

//Conexão com a model
require_once './model/PacientesModel.php';


class PacientesController{

public function find(Request $request, Response $response, array $url){

        if(!is_numeric($url[0])){
           $response::json(['status'=>'O id informado não é um numero !'],200);
        }
        
        $pacientesModel = new PacientesModel();
        $response::json(['dados'=>$pacientesModel->selectId($url[0])],200);
}

public function findAll(Request $request, Response $response, array $url){
    $pacientesModel = new pacientesModel();
    $response::json(['dados'=>$pacientesModel->selectAll()],200);
}

public function addPacientes(Request $request, Response $response, array $url){
    $campos=$request->body();

    if($campos['CPF']==''){
        $response::json(['status'=>'Informe o CPF da pessoa.'],406);
        exit;
    }

    if($campos['nome']==''){
        $response::json(['status'=>'Informe o nome da pessoa.'],406);
        exit;
    }

    if($campos['idade']==''){
        $response::json(['status'=>'Informe a idade da pessoa.'],406);
        exit;
    }

    $pacientesModel = new pacientesModel();

    $existePacientes = $pacientesModel->existePacientes($campos);

        if ($existePacientes) {
            $response::json(['status' => 'Já existe um registro com este CPF.'], 409);
            exit;
        }

   // $feriasModel = new feriasModel();

    //como não deixar cadastrar um q já existe?

    $result = $pacientesModel->insert($campos);

    if(!$result){

        $response::json(['status'=>'Falha ao adicionar!'],406);
        exit;

    }

    $response::json(['status'=>'Adicionado com sucesso!'],201);

}

public function alterarPacientes(Request $request, Response $response, array $url) 
{

    $campos = $request->body();

    if($campos['CPF']==''){
        $response::json(['status'=>'Informe o CPF da pessoa.'],406);
        exit;
    }

    if($campos['nome']==''){
        $response::json(['status'=>'Informe o nome da pessoa.'],406);
        exit;
    }

    if($campos['idade']==''){
        $response::json(['status'=>'Informe a idade da pessoa.'],406);
        exit;
    }


    $pacientesModel = new PacientesModel();


    $existePacientes = $pacientesModel->existePacientesEdit($campos);

        if ($existePacientes) {
            $response::json(['status' => 'Já existe um registro com este CPF.'], 409);
            exit;
        }



    $result = $pacientesModel->edit($campos);

    if(!$result){

        $response::json(['status'=>'Falha ao atualizar !'],406);
        exit;

    }

   $response::json(['status'=>'Atualizado com sucesso !'],201);
      

}

public function deletarPacientes(Request $request, Response $response, array $url) 
    {

        $pacientesModel = new PacientesModel();

        $ferias = $pacientesModel->selectId($url[0]);

        if(!is_numeric($url[0])){

            $response::json(['status'=>'A o id deve ser um numero inteiro válido'],406);
            exit;

        }


        if(empty($ferias)){

            $response::json(['status'=>'Informe o ID do paciente que deseja deletar'],404);
            exit;

        }

        $retorno = $pacientesModel->delete($url[0]);

        if($retorno){

            $response::json(['status'=>'Deletado com sucesso!'],201);

        }else{

            $response::json(['status'=>'Falha ao deletar registro !'],201);
        }

    }









}