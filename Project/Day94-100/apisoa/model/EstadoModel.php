<?php

require_once './core/Conexao.php';

class EstadoModel{

    public function selectUfPorDescricao($descricao) {//o nosso campo no insomnia se chama descrição ou o campo no banco ?
        try {
         $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('SELECT * FROM uf WHERE descricao = ?'); //seleciona todas as colunas de uf onde estado = ao valor recebido
        $stmt->execute([$descricao]);
        return $stmt->fetch(PDO::FETCH_OBJ); 

      } catch (\PDOException $e) {
    throw new \Exception('Erro no PDO: ' . $e->getMessage());
  }
}

public function insertUf($descricao) { //o nosso campo no insomnia se chama descrição ou o campo no banco ?
    try {
        $pdo = Conexao::getInstance();
        //insere  na tabela uf na coluna de estado o valor que será recebido
        $stmt = $pdo->prepare('INSERT INTO uf (descricao) VALUES (?)');
        $stmt->execute([$descricao]);
        return $pdo->lastInsertId(); 

    } catch (\PDOException $e) {
        throw new \Exception('Erro no PDO: ' . $e->getMessage());
    }
}


}