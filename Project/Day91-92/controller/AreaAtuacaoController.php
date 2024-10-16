<?php
require_once './model/AreaAtuacaoModel.php';

class AreaAtuacaoController {

    //receber

    public function select( Request $request, Response $response, array $url )
    $campos = $request->body();

    if ( $campos[ 'area' ] == '' ) {
        $response::json( [ 'status' => 'Informe area de atuação' ], 406 );
        exit;
       
    }

    //********* */
    $areaCurso = new AreaCursoModel();
    if(!empty($area)){
        $campos = $areaCursoModel->insert($campos['area']);
        
    exit;
    }
    
}