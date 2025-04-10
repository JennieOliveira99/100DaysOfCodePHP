<?php


require_once './core/Conexao.php';


class PerfilModel {

    public function selectDescricao($descricao){

        try{

            $pdo = Conexao::getInstance();

            $stmt = $pdo->prepare("SELECT * FROM perfil WHERE descricao = ?");
            $stmt->execute(["$descricao"]);

            return $stmt->fetch(PDO::FETCH_OBJ);


        }catch(\PDOException $e){

            throw new \Exception(ExceptionPdo::translateError($e->getMessage()));

        }catch(\Exception $e){

            throw new \Exception($e->getMessage());
        }

    }


    public function insert( array $dados){

        try{

            $pdo = Conexao::getInstance();

            $sqlInsert = 'INSERT INTO perfil(descricao)';
            $sqlInsert .= 'VALUES (?)';
            $stm = $pdo->prepare($sqlInsert);
            $stm->execute([$dados['perfil_descricao']]);
            $retorno = ($stm-> rowCount() > 0);

            return $retorno;

        }catch(\PDOException $e){

            throw new \Exception(ExceptionPdo::translateError($e->getMessage()));

        }catch(\Exception $e){

            throw new \Exception($e->getMessage());
        }


    }
}