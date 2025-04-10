<?php
require_once './core/Conexao.php';

class CategoriaModel{
    public function selectAll(){
        try{
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare("SELECT * FROM categoria ORDER BY id");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }catch (\PDOException $e){
            throw new \Exception(ExceptionPdo::translateError($e->getMessage()));
        }catch (\PDOException $e){
            throw new \Exception($e->getMessage());
        }
    }

    public funtion selectId($id){
        try{
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare("SELECT * FROM categoria WHERE id = :id");
            $stmt->execute();
            return  $stmt -> fetch(PDO::FETCH_OBJ);
        }catch (\PDOException $e){
            throw new \Exception(ExceptionPdo::translateError($e->getMessage()));
        }catch (\PDOException $e){
            throw new \Exception($e->getMessage());
        
        }
    }

    public function selectDescricao($descricao){ 
        try { 
            $pdo = Conexao::getInstance();
         $stmt = $pdo->prepare('SELECT * FROM categoria where descricao = ?');
            $stmt->execute([$descricao]);

            return $stmt -> fetchAll(PDO::FETCH_OBJ);
        }catch (\PDOException $e){
            throw new \Exception(ExceptionPdo::translateError($e->getMessage()));
        }catch (\PDOException $e){
            throw new \Exception($e->getMessage());
        }

    }
}