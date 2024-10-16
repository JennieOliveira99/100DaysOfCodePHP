<?php

require_once './core/Conexao.php';

class Curso
{

    //fazendo o area atuacao
    public function selectAll()
    {
        try {
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare("SELECT * FROM curso ORDER BY id");
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (\PDOException $e) {
            throw new \Exception(ExceptionPdo::translateError($e->getMessage()));
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function selectId($id)
    {
        try {
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare("SELECT * FROM curso WHERE id = ?");
            $stmt->execute([$id]);

            return $stmt->fetch(PDO::FETCH_OBJ);
        } catch (\PDOException $e) {
            throw new \Exception(ExceptionPdo::translateError($e->getMessage()));
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function selectCurso($curso)
    {
        try {
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare('SELECT * FROM curso WHERE curso = ?');
            $stmt->execute([$curso]);

            return $stmt->fetch(PDO::FETCH_OBJ);
        } catch (\PDOException $e) {
            throw new \Exception(ExceptionPdo::translateError($e->getMessage()));
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function insert(array $dados)
    // Stack trace
    {

        try {
            $pdo = Conexao::getInstance();
            $sqlInsert = 'INSERT INTO curso(curso) VALUES (?)';
            $stmt = $pdo->prepare($sqlInsert);
            $stmt->execute([$dados['curso']]);

            return ($stmt->rowCount() > 0);
        } catch (\PDOException $e) {
            throw new \Exception(ExceptionPdo::translateError($e->getMessage()));
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function editarCurso(array $dados)
    {
        var_dump($dados);
        if (!isset($dados['id']) || !isset($dados['curso'])) {
            throw new \Exception("Dados incompletos para edição curso.");
        }
        try {
            $pdo = Conexao::getInstance();
            $sqlUpdate = 'UPDATE curso SET curso = ? WHERE id = ?';
            $stmt = $pdo->prepare($sqlUpdate);
            $stmt->execute([
              
                $dados['curso'], // Descrição da categoria
                $dados['id'],       // ID da categoria
            ]);

            return ($stmt->rowCount() > 0); // Retorna verdadeiro se a atualização foi feita
        } catch (\PDOException $e) {
            throw new \Exception(ExceptionPdo::translateError($e->getMessage()));
        } catch (\Exception $e) {
            //Uncaught Exception: erro linha 91Uncaught Exception: Dados incompletos para edição da categoria. in C:\xampp\htdocs\api-soa\model\CategoriaModel.php:91 
            throw new \Exception($e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare('DELETE FROM curso WHERE id = ?');
            $stmt->execute([$id]);

            return ($stmt->rowCount() > 0);
        } catch (\PDOException $e) {
            throw new \Exception(ExceptionPdo::translateError($e->getMessage()));
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage());
        }
    }
}