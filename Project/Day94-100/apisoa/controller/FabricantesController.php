<?php

//Conexão com a model
require_once './model/FabricantesModel.php';


class FabricantesController{

public function find(Request $request, Response $response, array $url){

        if(!is_numeric($url[0])){
           $response::json(['status'=>'O id informado não é um numero !'],200);
        }
        
        $fabricantesModel = new FabricantesModel();
        $response::json(['dados'=>$fabricantesModel->selectId($url[0])],200);
}

public function findAll(Request $request, Response $response, array $url){
    $fabricantesModel = new FabricantesModel();
    $response::json(['dados'=>$fabricantesModel->selectAll()],200);
}

public function addFabricantes(Request $request, Response $response, array $url){
    $campos=$request->body();


    $fabricantesModel = new fabricantesModel();

    $existeFabricantes = $fabricantesModel->existeFabricantes($campos);

        if ($existeFabricantes) {
            $response::json(['status' => 'Já existe um registro com este Fabricante.'], 409);
            exit;
        }

   // $feriasModel = new feriasModel();

    //como não deixar cadastrar um q já existe?

    $result = $fabricantesModel->insert($campos);

    if(!$result){

        $response::json(['status'=>'Falha ao adicionar!'],406);
        exit;

    }

    $response::json(['status'=>'Adicionado com sucesso!'],201);

}

public function alterarFabricantes(Request $request, Response $response, array $url) 
{

    $campos = $request->body();




    $fabricantesModel = new FabricantesModel();



    $result = $fabricantesModel->edit($campos);

    if(!$result){

        $response::json(['status'=>'Falha ao atualizar !'],406);
        exit;

    }

   $response::json(['status'=>'Atualizado com sucesso !'],201);
      

}

public function deletarFabricantes(Request $request, Response $response, array $url) 
    {

        $fabricantesModel = new FabricantesModel();

        $ferias = $fabricantesModel->selectId($url[0]);

        if(!is_numeric($url[0])){

            $response::json(['status'=>'A o id deve ser um numero inteiro válido'],406);
            exit;

        }


        if(empty($ferias)){

            $response::json(['status'=>'Informe o ID do paciente que deseja deletar'],404);
            exit;

        }

        $retorno = $fabricantesModel->delete($url[0]);

        if($retorno){

            $response::json(['status'=>'Deletado com sucesso!'],201);

        }else{

            $response::json(['status'=>'Falha ao deletar registro !'],201);
        }

    }









}