<?php

require_once './core/Conexao.php';

class CelularModel{
    

    public function insert( array $dados){

        try{

            $pdo = Conexao::getInstance();

            $sqlInsert = 'INSERT INTO celular(id_fabricante,modelo)';
            $sqlInsert .= 'VALUES (?,?)';
            $stm = $pdo->prepare($sqlInsert);
            $stm->execute([$dados['id_fabricante'],$dados['modelo']]);
            $retorno = ($stm-> rowCount() > 0);

            return $retorno;

        }catch(\PDOException $e){

            throw new \Exception(ExceptionPdo::translateError($e->getMessage()));

        }catch(\Exception $e){

            throw new \Exception($e->getMessage());
        }


    }






}