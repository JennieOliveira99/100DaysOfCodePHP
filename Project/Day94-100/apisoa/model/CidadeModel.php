<?php

require_once './core/Conexao.php';
//torna a classe conexão disponível para acesso nesse arquivo.
//não é uma instancia,
//para trazer a instancia usamos
//$pdo = Conexao::getInstance(); que armazena a instancia do BD

class CidadeModel{

    public function selectCidadePorNomeeUf($nome, $uf) {   //obs: lá nós chamamos com E maiunsculo selectCidadePorNomeEUf
                                                            // não sei como funcionou, será que ele não ve maiusculas e minusculas?
        try {
            $pdo = Conexao::getInstance();

            //seleciona todas as colunas da tabela cidade fazendo um inner join com a tabela de uf
            //onde o uf_id da tabela cidade for igual ao id na tabela uf
            //SELECT c.*, u.estado as uf significa que eu quero selecionar todas as colunas da tabela cidade mas só a coluna estado da tabela uf
            //FROM cidade c  significa que a consulta está sendo feita na tabela cidade, referenciada pelo alias c
            //INNER JOIN significa que estou fazendo uma junção interna
            //ON c.uf_id = u.id significa que só deve ser feita a junção onde c.uf_id = u.id
            //WHERE significa que estou aplicando condições
            //c.nome = ? AND u.estado = ? significa que estamos procurando registros onde o nome da cidade e o uf sejam iguais ao valor que será passado
            $sql = "SELECT c.*, u.descricao as uf FROM cidade c 
                    INNER JOIN uf u ON c.uf_id = u.id 
                    WHERE c.nome = ? AND u.descricao = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$nome, $uf]);
            return $stmt->fetch(PDO::FETCH_OBJ); 

        } catch (\PDOException $e) {
            throw new \Exception('Erro no PDO: ' . $e->getMessage());
        }
    }

    public function insertCidade($nome, $idUf) {  //a função insertCidade recebe os parametros $nome e $idUf
        try {
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare('INSERT INTO cidade (nome, uf_id) VALUES (?, ?)'); //insere em cidade na coluna de nome e de uf_id os dados recebidos
                                            //esses campos do insert tem que estar iguais aos do insomnia ou aos da tabela
                                            //e os do insominia iguais aos da tabela ?
                                            // digo na mesma ordem



            $stmt->execute([$nome, $idUf]);  //essas funções que ficam aqui vem do arquivo PDO.php
            return $pdo->lastInsertId(); 

        } catch (\PDOException $e) {
            throw new \Exception('Erro no PDO: ' . $e->getMessage());
        }
    }


    public function selectID($id){ //cria uma função pública (pode ser acessada por outra classe)
                                    //diferentemente da função privada que só pode ser acessada pela mesma classe
                                    //que recebe como parâmetro o $id
                                    // o $ vem na frente pq o valor está armazenado na variável $id
        //aqui se inicia o bloco try / catch
        //No bloco try o código tenta fazer a consulta no BD
        //Caso haja algum erro cai no bloco catch
        try{
            //pdo é a variável que guarda a conexão com o banco de dados
            //ela é definida no arquivo de conexão
            //chamamos a função get instance que faz a instancia com a classe conexão
            $pdo = Conexao::getInstance();


            //prepara uma consulta SQL
            //aqui montamos a consulta sql
            //nesse caso a consulta trás:
            // todas as colunas da tabela cidade e o seu estado correspondente na tabela UF
            //cidade é definido po c e uf é definido por u
            //o inner join combina as duas tabelas onde uf_id na tabela de cidade for o id na tabela de uf
          $stmt = $pdo ->prepare ("SELECT c.*, u.descricao as uf FROM cidade c 
                    INNER JOIN uf u ON c.uf_id = u.id 
                    WHERE c.id = ? or u.descricao = ?");

  
       
            //executa a consulta com base no id recebido na url
            $stmt->execute(["$id"]);

            //busca o resultado da consulta e retorna como um objeto
            return $stmt->fetch(PDO::FETCH_OBJ);

            //bloco catch captura as exceções
        }catch(\PDOException $e){
            throw new \Exception(ExceptionPdo::translateError($e->getMessage()));
        }catch(\Exception $e){
            throw new \Exception($e->getMessage());

        }

    }

    public function selectAll(){
        try{
            $pdo = Conexao::getInstance();

            //busca todas as colunas da tabela cidade onde o uf_id na tabela de cidades for igual ao id na tabela uf
            //o c é um alias para a tabela cidades e o u para a tabela uf (funcionam como abreviações para simplificar o código)

            $stmt= $pdo->prepare("SELECT c.*, u.descricao as uf FROM cidade c
                    INNER JOIN uf u ON c.uf_id = u.id");
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }catch(\PDOException $e){

            throw new \Exception(ExceptionPdo::translateError($e->getMessage()));

        }catch(\Exception $e){

            throw new \Exception($e->getMessage());
        }
    }
    public function updateCidade($id, $nome, $idUf) {
        try {
            $pdo = Conexao::getInstance();

            //atualiza a tabela cidade
            //o set diz qual coluna deve ser atualizada com o valor recebido
            //where é a condição (onde o idda tabela cidade for o id recebido)
            $stmt = $pdo->prepare('UPDATE cidade SET nome = ?, uf_id = ? WHERE id = ?');
            $stmt->execute([$nome, $idUf, $id]);
            return $stmt->rowCount(); 

        } catch (\PDOException $e) {
            throw new \Exception('Erro no PDO: ' . $e->getMessage());
        }
    }

    public function insert( array $dados){

        try{

            $pdo = Conexao::getInstance();
                                                            //ESSA É A FUNÇÃO QUE FIZEMOS ERRADO E NÃO TIRAMOS DAQUI

            //ESSE INSERT ESTÁ CORRETO, APENAS ESTÁ DIVIDIDO EM DUAS PARTES
            $sqlInsert = 'INSERT INTO cidade(nome,uf_id)';
            //A DIFERENÇA É QUE AQUI TENTAMOS CRIAR O SQL PRIMEIRO PARA DEPOIS
            //PREPARAR USANDO UMA VARIAVEL, A $sqlInsert
            //E NA OUTRA NÓS JA FIZEMOS DIRETO
            //ASSIM:$stmt = $pdo->prepare('INSERT
            $sqlInsert .= 'VALUES (?,?)';
            $stm = $pdo->prepare($sqlInsert);
            $stm->execute([$dados['nome'],$dados['uf_id']]);
            return ($stm-> rowCount() > 0);

            //return $retorno;

        }catch(\PDOException $e){

            throw new \Exception(ExceptionPdo::translateError($e->getMessage()));

        }catch(\Exception $e){

            throw new \Exception($e->getMessage());
        }


    }


    public function existeCidade($campos){        //ESSA FUNÇÃO FIZEMOS ERRADA TBM E ESQUECEMOS DE TIRAR
                                                    //MAS NÃO LEMBRO PRA QUE ELA IRIA SERVIR
                                                    //ACHO QUE ERA PARA VER SE A CIDADE JÁ EXISTIA OU NÃO
                                                    //FIZEMOS A selectCidadePorNomeeUf NO LUGAR
                                                    //QUE VERIFICA SE A CIDADE E SE ESTA CADASTRADA PARA O MESMO UF

        //SENDO ASSIM ESSE NOSSO SELECT ESTAVA ERRADO POIS PRECISAMOS SELECIONAR O NOME = AO QUE VEM E O UF_ID  COM O CAMPO IGUAL AO QUE ESTÁ ESCRITO NA TABELA
        //DE UF NESSE ID
        //POR ISSO PRECISMOS DO INNER JOIN
        //ASSIM SABERIAMOS SE JA TEM UMA CIDADE COM ESSE UF


        //AQUI NÃO FIZEMOS INNER JOIN E COLOCAMOS QUE O UF_ID DEVERIA SER DIFERENTE DO ID QUE TRAZEMOS NA REQUISIÇÃO
        //SENDO QUE ESSE ID NEM É O ID_UF, O UF VEM COMO TEXTO EM ESTADO

        //OBS: AINDA COLOCAMOS UM ORDERBY Q EU NÃO SEI PRA QUE QUERÍAMOS USAR KKK
        //TALVEZ PARA ORDENAR OS RESULTADOS PELO ID


        try{
            $pdo = Conexao::getInstance();

            $stmt= $pdo->prepare('SELECT * FROM cidade where nome = "'.$campos['nome'].'" && uf_id !="'.$campos['id'].'"  ORDER BY id');
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }catch(\PDOException $e){

            throw new \Exception(ExceptionPdo::translateError($e->getMessage()));

        }catch(\Exception $e){

            throw new \Exception($e->getMessage());
        }
    }


    public function delete(int $id){

        try{

            $pdo = Conexao::getInstance();

            $stmt = $pdo->prepare(query: "DELETE FROM cidade WHERE id = ?"); //deleta o registro do id informado na tabela cidade
            $stmt->execute(["$id"]);

            return ($stmt->rowCount() > 0);

        }catch(\PDOException $e){

            throw new \Exception(ExceptionPdo::translateError($e->getMessage()));

        }catch(\Exception $e){

            throw new \Exception($e->getMessage());
        }


    }



    public function existeCidadeEdit($campos){   // AQUI ÍAMOS FAZER MAIS UMA FUNÇÃO PARA PESQUISAR SE A CIDADE JÁ EXISTE
                                                    //PARA AQUELE MESMO UF
                                                    //NA HORA DE EDITAR
                                                    //SENDO QUE ACABAMOS USANDO A MESMA FUNÇÃO PARA ESTA VERIFICAÇÃO
                                                    //TANTO NA INCLUSÃO QUANTO NA EDIÇÃO
                                                    //A FUNÇÃO selectCidadePorNomeEUf

                        //na criação dela cometemos os mesmos erros da existeCidade
        try{
            $pdo = Conexao::getInstance();

            $stmt= $pdo->prepare('SELECT * FROM cidade where nome = "'.$campos['nome'].'" && id !="'.$campos['id'].'"  ORDER BY id');
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }catch(\PDOException $e){

            throw new \Exception(ExceptionPdo::translateError($e->getMessage()));

        }catch(\Exception $e){

            throw new \Exception($e->getMessage());
        }
    }

    public function edit(array $dados){   //outra função que criamos errado e esquecemos de tirar
                                    //fizemos a função updateCidade no lugar

                //diferenças:
                    //Preparando o sql depois
                    //update da outra:
                        //'UPDATE cidade SET nome = ?, uf_id = ? WHERE id = ?');
                    //execute da outra:
                        //execute([$nome, $idUf, $id]);

                //basicamente altou setar o uf_id e o id
        try{

            $pdo = Conexao::getInstance();

            $sqlUpdate = 'UPDATE cidade SET nome = ?';
            $sqlUpdate.='WHERE id = ?';
            $stm = $pdo->prepare($sqlUpdate);
            $stm->execute([
                $dados['nome'],
                $dados['id']]);

            $retorno = ($stm->rowCount() > 0);

            return $retorno;

        }catch(\PDOException $e){

            throw new \Exception(ExceptionPdo::translateError($e->getMessage()));

        }catch(\Exception $e){

            throw new \Exception($e->getMessage());
        }

    }

    public function selectUf($id){ //cria uma função pública (pode ser acessada por outra classe)
        //diferentemente da função privada que só pode ser acessada pela mesma classe
        //que recebe como parâmetro o $id
        // o $ vem na frente pq o valor está armazenado na variável $id
        //aqui se inicia o bloco try / catch
        //No bloco try o código tenta fazer a consulta no BD
        //Caso haja algum erro cai no bloco catch
        try{
            //pdo é a variável que guarda a conexão com o banco de dados
            //ela é definida no arquivo de conexão
            //chamamos a função get instance que faz a instancia com a classe conexão
            $pdo = Conexao::getInstance();


            //prepara uma consulta SQL
            //aqui montamos a consulta sql
            //nesse caso a consulta trás:
            // todas as colunas da tabela cidade e o seu estado correspondente na tabela UF
            //cidade é definido po c e uf é definido por u
            //o inner join combina as duas tabelas onde uf_id na tabela de cidade for o id na tabela de uf
            // exception pdo erro no select
            $stmt = $pdo ->prepare ("SELECT c.*, u.descricao as uf FROM cidade c 
        INNER JOIN uf u ON c.uf_id = u.id 
        WHERE u.descricao = ?");



            //executa a consulta com base no id recebido na url
            $stmt->execute(["$id"]);

            //busca o resultado da consulta e retorna como um objeto
            return $stmt->fetchAll(PDO::FETCH_OBJ);

            //bloco catch captura as exceções
        }catch(\PDOException $e){
            throw new \Exception(ExceptionPdo::translateError($e->getMessage()));
        }catch(\Exception $e){
            throw new \Exception($e->getMessage());

        }

    }




}