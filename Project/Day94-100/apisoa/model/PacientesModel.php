<?php

require_once './core/Conexao.php';

class PacientesModel{

    public function selectID($id){

        try{

            $pdo = Conexao::getInstance();

            $stmt = $pdo->prepare("SELECT * FROM pacientes WHERE id = ?");
            $stmt->execute(["$id"]);
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

            $stmt= $pdo->prepare('SELECT * FROM pacientes ORDER BY id');
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }catch(\PDOException $e){

            throw new \Exception(ExceptionPdo::translateError($e->getMessage()));

        }catch(\Exception $e){

            throw new \Exception($e->getMessage());
        }
    }

    public function existePacientes($campos){
        try{
            $pdo = Conexao::getInstance();

            $stmt= $pdo->prepare('SELECT * FROM pacientes where CPF = "'.$campos['CPF'].'" ORDER BY id');
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }catch(\PDOException $e){

            throw new \Exception(ExceptionPdo::translateError($e->getMessage()));

        }catch(\Exception $e){

            throw new \Exception($e->getMessage());
        }
    }

    public function existePacientesEdit($campos){
        try{
            $pdo = Conexao::getInstance();

            $stmt= $pdo->prepare('SELECT * FROM pacientes where CPF = "'.$campos['CPF'].'" && id !="'.$campos['id'].'"  ORDER BY id');
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

            $sqlInsert = 'INSERT INTO pacientes(CPF,nome,idade)';
            $sqlInsert .= 'VALUES(?,?,?)';
            $stm = $pdo->prepare($sqlInsert);

            $stm->execute([$dados['CPF'],$dados['nome'],$dados['idade']]);

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

            $sqlUpdate = 'UPDATE pacientes SET CPF = ?, nome = ?, idade = ?';
            $sqlUpdate.='WHERE id = ?';
            $stm = $pdo->prepare($sqlUpdate);
            $stm->execute([
                $dados['CPF'],
                $dados['nome'],
                $dados['idade'],
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

            $stmt = $pdo->prepare(query: "DELETE FROM pacientes WHERE id = ?");
            $stmt->execute(["$id"]);

            return ($stmt->rowCount() > 0);

        }catch(\PDOException $e){

            throw new \Exception(ExceptionPdo::translateError($e->getMessage()));

        }catch(\Exception $e){

            throw new \Exception($e->getMessage());
        }


    }










}