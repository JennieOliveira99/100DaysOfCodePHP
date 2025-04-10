<?php

require_once './core/Conexao.php';

class FabricantesModel{

    public function selectfabricanteCelular($fabricante){

        try{

            $pdo = Conexao::getInstance();

            $stmt = $pdo->prepare("SELECT * FROM fabricantes WHERE descricao = ?");
            $stmt->execute(["$fabricante"]);
            return $stmt->fetch(PDO::FETCH_OBJ); //fetch pq retorna 1 só
        }catch(\PDOException $e){
            throw new \Exception(ExceptionPdo::translateError($e->getMessage()));
        }catch(\Exception $e){
            throw new \Exception($e->getMessage());

        }

    }

    public function selectDescricao($descricao){

        try{

            $pdo = Conexao::getInstance();

            $stmt = $pdo->prepare("SELECT * FROM fabricantes WHERE descricao = ?");  
            $stmt->execute([$descricao]);

            return $stmt->fetch(PDO::FETCH_OBJ);
            

        }catch(\PDOException $e){

            throw new \Exception(ExceptionPdo::translateError($e->getMessage()));

        }catch(\Exception $e){

            throw new \Exception($e->getMessage());
        }

    }

    public function selectAll(){
        try{
            $pdo = Conexao::getInstance();

            $stmt= $pdo->prepare('SELECT * FROM fabricantes ORDER BY id');
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }catch(\PDOException $e){

            throw new \Exception(ExceptionPdo::translateError($e->getMessage()));

        }catch(\Exception $e){

            throw new \Exception($e->getMessage());
        }
    }

    public function existeFabricantes($campos){
        try{
            $pdo = Conexao::getInstance();

            $stmt= $pdo->prepare('SELECT * FROM fabricantes where descricao');
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }catch(\PDOException $e){

            throw new \Exception(ExceptionPdo::translateError($e->getMessage()));

        }catch(\Exception $e){

            throw new \Exception($e->getMessage());
        }
    }

   

    public function insert( array $dados){

        try{

            $pdo = Conexao::getInstance();

            $sqlInsert = 'INSERT INTO fabricantes(descricao)';
            $sqlInsert .= 'VALUES(?)';
            $stm = $pdo->prepare($sqlInsert);

            $stm->execute([$dados['fabricante']]);

            $retorno = ($stm-> rowCount() > 0);

            return $retorno;

        }catch(\PDOException $e){

            throw new \Exception(ExceptionPdo::translateError($e->getMessage()));

        }catch(\Exception $e){

            throw new \Exception($e->getMessage());
        }


    }

    public function edit(array $dados){

        try{

            $pdo = Conexao::getInstance();

            $sqlUpdate = 'UPDATE fabricantes SET  descricao = ?';
            $sqlUpdate.='WHERE id = ?';
            $stm = $pdo->prepare($sqlUpdate);
            $stm->execute([
                $dados['descricao'],
                $dados['id']]);

            $retorno = ($stm->rowCount() > 0);

            return $retorno;

        }catch(\PDOException $e){

            throw new \Exception(ExceptionPdo::translateError($e->getMessage()));

        }catch(\Exception $e){

            throw new \Exception($e->getMessage());
        }

    }

    public function delete(int $id){

        try{

            $pdo = Conexao::getInstance();

            $stmt = $pdo->prepare(query: "DELETE FROM fabricantes WHERE id = ?");
            $stmt->execute(["$id"]);

            return ($stmt->rowCount() > 0);

        }catch(\PDOException $e){

            throw new \Exception(ExceptionPdo::translateError($e->getMessage()));

        }catch(\Exception $e){

            throw new \Exception($e->getMessage());
        }


    }










}