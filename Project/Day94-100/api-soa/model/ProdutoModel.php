<?php

require_once './core/Conexao.php';
class ProdutoModel{

    public function selectAll(){
        try {
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare("SELECT * FROM produto ORDER BY id");
            $stmt->execute();

            return $stmt -> fetchAll(PDO::FETCH_OBJ);
        }catch (\PDOException $e){
            throw new \Exception(ExceptionPdo::translateError($e->getMessage()));
        }catch (\PDOException $e){
            throw new \Exception($e->getMessage());
        }

    }

    public function selectId($id){ 
        try { 
            $pdo = Conexao::getInstance();
          //fazer where aqui $stmt = $pdo->prepare("SELECT * FROM produto where id == 2 ORDER BY id");
            $stmt->execute();

            return $stmt -> fetchAll(PDO::FETCH_OBJ);
        }catch (\PDOException $e){
            throw new \Exception(ExceptionPdo::translateError($e->getMessage()));
        }catch (\PDOException $e){
            throw new \Exception($e->getMessage());
        }

    }

 
    public function selectDescricao($descricao){ 
        try { 
            $pdo = Conexao::getInstance();
         $stmt = $pdo->prepare('SELECT * FROM produto where descricao = ?');
            $stmt->execute([$descricao]);

            return $stmt -> fetchAll(PDO::FETCH_OBJ);
        }catch (\PDOException $e){
            throw new \Exception(ExceptionPdo::translateError($e->getMessage()));
        }catch (\PDOException $e){
            throw new \Exception($e->getMessage());
        }

    }

    public function selectSKU($sku){ 
        try { 
            $pdo = Conexao::getInstance();
         $stmt = $pdo->prepare('SELECT * FROM produto where sku = ?');
            $stmt->execute([$sku]);

            return $stmt -> fetchAll(PDO::FETCH_OBJ);
        }catch (\PDOException $e){
            throw new \Exception(ExceptionPdo::translateError($e->getMessage()));
        }catch (\PDOException $e){
            throw new \Exception($e->getMessage());
        }

    }



    public function insert(array $dados){
        try { 
            $pdo = Conexao::getInstance();
          $sqlInsert = 'INSERT INTO produto(categoria_id, descricao, valor, sku)';
          $sqlInsert .= 'VALUES (?,?,?,?)';
          $stmt = $pdo->prepare($sqlInsert);
          $stmt->execute([$dados['categoria'], $dados['nome'], $dados['valor'], $dados['cod']]);

            return ($stmt -> rowCount() > 0);
        }
        catch (\PDOException $e){
            throw new \Exception(ExceptionPdo::translateError($e->getMessage()));
        }catch (\PDOException $e){
            throw new \Exception($e->getMessage());
        }

    
    }

    public function edit(array $dados){
        try { 
            $pdo = Conexao::getInstance();
            $sqlUpdate = 'UPDATE produto SET categoria_id = ?, descricao = ?, valor = ?, sku = ?' ;
            $sqlUpdate .= ' WHERE id = ?';
            $stmt = $pdo->prepare($sqlUpdate);
            $stmt->execute([
            
            $dados['categoria_id'], 
            $dados['descricao'], 
            $dados['valor'],
            $dados['sku'],
            $dados['id'],// o que esta entre '' é o que vem da api, e precisa estar com o mesmo nome de la
        ]);

        return ($stmt -> rowCount() > 0);
     
        }


        catch (\PDOException $e){
            throw new \Exception(ExceptionPdo::translateError($e->getMessage()));
        }catch (\PDOException $e){
            throw new \Exception($e->getMessage());
        }


    }

    public function delete($id){
        
        try { 
            $pdo = Conexao::getInstance();
         $stmt = $pdo->prepare('DELETE FROM produto where id = ?');
            $stmt->execute([$id]);
            return ($stmt -> rowCount() > 0);
        }catch (\PDOException $e){
            throw new \Exception(ExceptionPdo::translateError($e->getMessage()));
        }catch (\PDOException $e){
            throw new \Exception($e->getMessage());
        }


    }

}