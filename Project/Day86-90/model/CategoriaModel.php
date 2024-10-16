<?php

require_once './core/Conexao.php';

class CategoriaModel
{

    public function selectAll()
    {
        try {
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare("SELECT * FROM categoria ORDER BY id");
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
            $stmt = $pdo->prepare("SELECT * FROM categoria WHERE id = ?");
            $stmt->execute([$id]);

            return $stmt->fetch(PDO::FETCH_OBJ);
        } catch (\PDOException $e) {
            throw new \Exception(ExceptionPdo::translateError($e->getMessage()));
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function selectDescricao($descricao)
    {
        try {
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare('SELECT * FROM categoria WHERE descricao = ?');
            $stmt->execute([$descricao]);

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
            $sqlInsert = 'INSERT INTO categoria(nome, descricao) VALUES (?,?)';
            $stmt = $pdo->prepare($sqlInsert);
            $stmt->execute([$dados['nome'], $dados['descricao']]);

            return ($stmt->rowCount() > 0);
        } catch (\PDOException $e) {
            throw new \Exception(ExceptionPdo::translateError($e->getMessage()));
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function editarCategoria(array $dados)
    {
        var_dump($dados);
        if (!isset($dados['id']) || !isset($dados['nome']) || !isset($dados['descricao'])) {
            throw new \Exception("Dados incompletos para edição da categoria.");
        }
        try {



            $pdo = Conexao::getInstance();
            $sqlUpdate = 'UPDATE categoria SET nome = ?, descricao = ? WHERE id = ?';
            $stmt = $pdo->prepare($sqlUpdate);
            $stmt->execute([
                $dados['nome'],      // Nome da categoria
                $dados['descricao'], // Descrição da categoria
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
            $stmt = $pdo->prepare('DELETE FROM categoria WHERE id = ?');
            $stmt->execute([$id]);

            return ($stmt->rowCount() > 0);
        } catch (\PDOException $e) {
            throw new \Exception(ExceptionPdo::translateError($e->getMessage()));
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
