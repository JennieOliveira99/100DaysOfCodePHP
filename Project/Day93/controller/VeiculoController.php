<?php
require_once './model/VeiculoModel.php';

class VeiculoController {
    public function find( Request $request, Response $response, array $url )
 {
        var_dump( $url );
        $response::json( [ 'status' => 'sucesso' ], 200 );
    }

    //1- pesquisar todos

    public function findAll( Request $request, Response $response, array $url )
 {
        $veiculoModel = new VeiculoModel();
        $response::json( [ 'dados' => $veiculoModel->selectAll() ], 200 );
    }

    //add

    public function addVeiculo( Request $request, Response $response, array $url )
 {
        $campos = $request->body();
        //primeiro passo: receber dados
        if ( $campos[ 'modelo' ] == '' ) {
            $response::json( [ 'status' => 'Informe o modelo do Veiculo' ], 406 );
            exit;

        }

        //verificando se marca foi digitado
        if ( $campos[ 'marca' ] == '' ) {
            $response::json( [ 'status' => 'Informe a Marca do Veiculo' ], 406 );
            exit;
            //tudo  que tiver abaixo nao sera executado
        }
        // Instância do VeiculoModel
        $veiculoModel = new VeiculoModel();

        // Verificação se a placa já existe no banco de dados
        $veiculos = $veiculoModel->selectPlaca( $campos[ 'placa' ] );

        // Se já existir um veículo com a mesma placa
        if ( !empty( $veiculos ) ) {
            $response::json( [ 'status' => "O veículo com a placa '" . $campos[ 'placa' ] . "' já existe!" ], 406 );
            exit;
        }

        // Caso a placa não exista, insere o veículo
        $retorno = $veiculoModel->insert( $campos );

        // Retorno do status para o usuário
        if ( $retorno ) {
            $response::json( [ 'status' => 'Veículo adicionado com sucesso' ], 201 );
        } else {
            $response::json( [ 'status' => 'Erro ao inserir o veículo' ], 500 );
        }

    }

    //editar veiculo

    public function editarVeiculo( Request $request, Response $response, array $url ) {
        $campos = $request->body();
        $veiculoModel = new VeiculoModel();
        $retorno = $veiculoModel->edit( $campos );

        if ( $retorno ) {
            $response::json( [ 'status' => 'Atualizado com sucesso' ], 201 );
        } else {
            $response::json( [ 'status' => 'Erro ao atualizar' ], 500 );
        }
    }

    //deletar veiculo

    public function delVeiculo( Request $request, Response $response, array $url )
 {
        $veiculoModel = new VeiculoModel();
        //garantindo que o usuario nao possa inserir letras na url do insomnia
        if ( !is_numeric( $url[ 0 ] ) ) {
            $response::json( [ 'status' => 'O ID deve ser numero inteiro' ], 406 );
            exit;
        }

        $veiculos = $veiculoModel->selectId( $url[ 0 ] );

        //$retorno = $produtoModel -> delete( $url[ 0 ] );

        if ( empty( $veiculos ) ) {
            $response::json( [ 'status' => 'Registro nao encontrado' ], 404 );
            exit;
        }

        $retorno = $veiculoModel -> delete( $url[ 0 ] );
        if ( $retorno ) {
            $response::json( [ 'status' => 'Deletado com sucesso' ], 203 );
        } else {
            $response::json( [ 'status' => 'Erro ao excluir' ], 500 );
        }

    }
}