<?php

//Conexão com a model
require_once './model/CelularModel.php';
require_once './model/FabricantesModel.php';


class CelularController{



    public function addCelular(Request $request, Response $response, array $url) 
    {

        $campos = $request->body();   
        
        //ve se nao esta vazio

        if($campos['modelo'] == ''){      

            $response::json(['status'=>'Informe o modelo do celular !'],406);
            exit;

        }

        if($campos['fabricante'] == ''){

            $response::json(['status'=>'Informe o fabricante do celular !'],406);
            exit;

        }

        //busca se já tem o fab cadastrado e guarda em $fabricante

        $fabricanteModel =  new FabricantesModel();
        $fabricante = $fabricanteModel->selectDescricao($campos['fabricante']);

        //se tem resultado em $fabricante
        if($fabricante){

            //seta o campo id_fabricante com o id guardado na variável $fabricante
            $campos['id_fabricante'] = $fabricante->id;

        }else{

            //Se não
            //insere o valor vindo em campos
           $fabricante = $fabricanteModel->insert($campos);

           if($fabricante){

                //Busca o campo cadastrado
                $fabricante = $fabricanteModel->selectDescricao($campos['fabricante']);

                $campos['id_fabricante'] = $fabricante->id;

            }else{

                $response::json(['status'=>'O novo fabricante não foi possível ser cadastrado !'],406);
                exit;

            }

        }

        $celularModel = new CelularModel();
        $insert = $celularModel->insert($campos);

        if($insert){

            $response::json(['status'=>'Cadastrado com sucesso !'],406);
            exit;

        }else{

            $response::json(['Falha ao cadastrar !'],406);
            exit;

        }

    }




}