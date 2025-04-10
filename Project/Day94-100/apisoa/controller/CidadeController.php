<?php

//Conexão com a model e com a conexão
require_once './model/CidadeModel.php';
require_once './model/EstadoModel.php';
require_once './service/JwtService.php';


class CidadeController{

    //função publica que recebe 3 parametros
    //request : informações sobre a requisição http (usuário, cabeçalho e etc)
    //response: resposta que será enviada ao usuário
    //array com partes da URL com informações adicionais (ex: id)
    public function find(Request $request, Response $response, array $url){

        $response::json(['token'=>JWTService::gerarJWT()], 200);
//        if(!is_numeric($url[0])){   //essa url é o valor que vem na url do insomnia
//                                    //verifica se o valor passado pelo elemento de indice 0 do array é numérico
//                                    //se o valor não for numérico retorna esse erro em formato json
//                                    //esse erro é um array composto de dois elementos a mensagem e o status http
//           $response::json(['status'=>'O id informado não é um numero !'],200);
//                                    //200 é o código de status do Http,
//                                    //Geralmente o código para erro é 400 mas escolhemos 200
//                                    //Obs: nós podemos escolher qlqr número mas faz parte das boas práticas usar os pré definidos
//        }
//
//        $cidadeModel = new CidadeModel(); //instancia da cidadeModel
//                                            //para poder usar sua função selectId
//
//                                            //aqui passamos os dados da URL como parâmetro para a função selectId
//                                            //E guardamos esses dados em 'dados'
//        $response::json(['dados'=>$cidadeModel->selectId($url[0])],200);
//                                            //o status escolhido foi 200, que é o sugerido em boas práticas
//                                            //para requisições bem sucedidas
}

    public function findAll(Request $request, Response $response, array $url){
    $cidadeModel = new CidadeModel();
    //aqui não passamos nenhum parametro para a função pis queremos receber todos os registros
    $response::json(['dados'=>$cidadeModel->selectAll()],200);
}  
    

public function addCidade(Request $request, Response $response, array $url) {
    // 1 - RECEBE OS DADOS
    $dados = $request->body();   //aqui o metodo body é chamado no objeto request
                                    //esse metodo retorna os dados enviados na requisição post
                                    //a variável $dados armazena

    // 2 - VALIDAR O PREENCHIMENTO
    if (empty($dados['nome']) || empty($dados['uf'])) {
        $response::json(['status' => 'Informe o nome da cidade e a UF'], 406);
        exit;
    }  //aqui ele verifica se o campo de nome ou o campo de uf está em branco
        //se estiver em branco retorna a mensagem

    if (strlen($dados['uf']) !== 2) {
        $response::json(['status' => 'A UF deve ter 2 caracteres'], 406);
        exit;  //esse exit serve para interromper a execução do script
    } //aqui ele usa a função strlen que conta os caracteres na string que está associada a chave uf
        //e define que se o campo uf possuir um numero de caracteres diferente de 2 deve retornar a mensagem

    $cidadeModel = new CidadeModel(); //instancia da cidademodel
    $ufModel = new estadoModel(); //instancia da uf model

    // 3 - VERIFICAR A EXISTÊNCIA DA CIDADE PARA O ESTADO (UF)

    //cria uma variavel cidade existente que vai guardar o valor do resultado da função selectCidadePorNomeEUf da cidadeModel
    //a função selectCidadePorNomeEUf recebe como parametros o nome e o uf que vem dentro do array dados que guarda os dados da requisição
    //essa variavel dados foi criada no começo da nodda função addCidade
    $cidadeExistente = $cidadeModel->selectCidadePorNomeEUf($dados['nome'], $dados['uf']);
    if ($cidadeExistente) {  //se houver resultados em $cidadeExistente retorna a seguinte msg:
        $response::json(['status' => 'Essa cidade já está cadastrada para essa UF'], 409);
        exit;
    }

    // 3 - VERIFICAR A  UF

    //cria uma variavel $uf que vai armazenar o valor trago pela função selectUfPorDescricao da $ufModel
    //essa funçao recebe como parametro o campo o uf da requisição guardado em dados
    $uf = $ufModel->selectUfPorDescricao($dados['uf']);

    if ($uf) {
        // (CONDICIONAL) 4 - CAPTURAR O ID DA UF EXISTENTE

        //se existir dados ele pega o id guardado em $uf
        $idUf = $uf->id;
    } else {
        // (CONDICIONAL) 5 - GRAVAR NOVA UF E CAPTURAR O ID

        //se não existir dados ele grava uma nova uf na tabela de UF

        //usando a função insertUF da ufModel e passando como parametro a nova uf recebida
        //guarda o resultado em $idUf
        $idUf = $ufModel->insertUf($dados['uf']);
    }

    // 6 - GRAVAR A CIDADE

    // o retorno final dessa função é uma inserção de dados na tabela cidade
    //independente de ter adicionado um registro na tabela de uf ou de ter pego o id de uma uf já existente

    //aqui ele guarda o resultado da inserção em $retorno
    //A inserção é feita pela função insertCidade da cidadeModel
    //essa função recebe dois parâmetros: o nome que vem dos dados da url e o $idUf definido ali em cima
    $retorno = $cidadeModel->insertCidade($dados['nome'], $idUf);

    if ($retorno) { //se houver retorno trás a msg de sucesso
        $response::json(['status' => 'Cidade adicionada com sucesso'], 201);
    } else {//se não, trás uma msg de erro
        $response::json(['status' => 'Erro ao adicionar a cidade'], 500);
    }
}




    public function deletarCidade(Request $request, Response $response, array $url) 
    {

        $cidadeModel = new CidadeModel();

        $cidade = $cidadeModel->selectId($url[0]);  //passa como parametro o elemento de indice 0 na url

        if(!is_numeric($url[0])){
            //se não for numérico:

            $response::json(['status'=>'A o id deve ser um numero inteiro válido'],406);
            exit;

        }


        if(empty($cidade)){
            //se estiver em branco
            $response::json(['status'=>'Informe o ID da cidade que deseja deletar'],404);
            exit;

        }

        //o retorno é deletar o registro do id informado
        $retorno = $cidadeModel->delete($url[0]);

        if($retorno){ //se retornar

            $response::json(['status'=>'Deletado com sucesso!'],201);

        }else{ //se não

            $response::json(['status'=>'Falha ao deletar registro !'],201);
        }

    }




public function editCidade(Request $request, Response $response, array $url) {
    // 1 - RECEBE OS DADOS
    $dados = $request->body();    //aqui o metodo body é chamado no objeto request
                                    //esse metodo retorna os dados enviados na requisição post
                                    //a variável $dados armazena

    // 2 - VALIDAR O PREENCHIMENTO
    if (empty($dados['id']) || empty($dados['nome']) || empty($dados['uf'])) {
        $response::json(['status' => 'Informe o ID, nome da cidade e a UF'], 406);
        exit;

        //verifica se não tem nenhum campo em branco e se tiver interrompe a execução do script
    }

    if (strlen($dados['uf']) !== 2) {
        $response::json(['status' => 'A UF deve ter 2 caracteres'], 406);
        exit;

        //a função strlen conta a quantidade de caracteres no campo de uf e se o valor for diferente de 2 gera a msg e interrompe a execução
    }

    if (is_numeric($dados['uf']) ) {
        $response::json(['status' => 'A UF não pode ser numero'], 406);
        exit;
    }

    $cidadeModel = new CidadeModel(); //instancia da cidadeModel
    $estadoModel = new estadoModel(); //instancia da estadoModel

    // 3 - VERIFICAR A EXISTÊNCIA DA CIDADE PARA A UF

    //vai guardar em $cidadeExistente o valor retornado pela função selectCidadePorNomeEUf
    //essa função recebe os parametros nome e uf vindos da requisição
    $cidadeExistente = $cidadeModel->selectCidadePorNomeEUf($dados['nome'], $dados['uf']);

    //se $cidadeExistente contém resultado     (aqui é se contém resultado true ou false ou é se contem resultado ou está vazio?)
    //e se nesse resultado o campo id é diferente do cmpo id que estamos enviando (pq se o id for igual pode deixar editar)
    if ($cidadeExistente && $cidadeExistente->id != $dados['id']) {

        //gera a msg:
        $response::json(['status' => 'Essa cidade já está cadastrada para essa UF'], 409);
        exit;
    }

    if ($cidadeExistente && $cidadeExistente->id == $dados['id']) {

        //gera a msg:
        $response::json(['status' => 'Nenhum dado alterado'], 409);
        exit;
    }

    // 4 - VERIFICAR A EXISTÊNCIA DA UF

    //guarda em $uf o resultado da função selectUfPorDescricao de $estadoModel
    //essa função recebe como parametro a uf enviada na requisição, que está armazenada em $dados
    $uf = $estadoModel->selectUfPorDescricao($dados['uf']);

    //se retornar dados
    if ($uf) {
        $idUf = $uf->id;   //define que $idUf vai ser o id encontrado
                            //$uf->id acessa a propriedade id desse objeto
                            // e define como valor para $idUf
    } else { //se não
        $idUf = $estadoModel->insertUf($dados['uf']); //insere um novo registro na tabela de uf com a função insertUf de $estadoModel
                                                        //passando co mo parametro a nova uf
    }

    // 5 - ATUALIZAR A CIDADE
    //o retorno é uma atualização da ciodade
    //chama a função updateCidade de  $cidadeModel e passa como parametros o id armazenado em $dados,
                                                                            //o nome armazenado em $dados
                                                                            // e o UFid que armazena o valor do id da uf,tanto se a uf já existisse
                                                                            //quanto se tiver criado uma
    $retorno = $cidadeModel->updateCidade($dados['id'], $dados['nome'], $idUf);

    if ($retorno) { //se houver retorno
        $response::json(['status' => 'Cidade atualizada com sucesso'], 200);
    } else { //se não
        $response::json(['status' => 'Erro ao atualizar a cidade'], 500);
    }
}

    public function findPorUf(Request $request, Response $response, array $url) {
//         Verifica se o ID fornecido é numérico
         if (is_numeric($url[0])) {
             return $response::json(['status' => 'A UF informada não é uma string!'], 400);
         }

        // Instância do modelo de Cidade
        $cidadeModel = new CidadeModel();

        // Busca o ID usando o método selectId
        $dados = $cidadeModel->selectUf($url[0]);

        // Verifica se o resultado da busca é vazio (indicando que o ID não existe)
        if (empty($dados)) {
            return $response::json(['status' => 'O uf informado não foi encontrado!'], 404);
        }

        // Retorna os dados encontrados
        return $response::json(['dados' => $dados], 200);
    }

}

