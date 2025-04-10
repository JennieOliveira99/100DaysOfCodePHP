<?php


require_once './core/Conexao.php';


class UsuarioModel
{
    public function selectEmail(String $email)
    {
        try {
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare('SELECT * FROM usuario WHERE email = ?');
            $stmt->execute([$email]);

            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function selectId($id)
    {

        try {

            $pdo = Conexao::getInstance();

            $stmt = $pdo->prepare("SELECT * FROM usuario WHERE id = ?");
            $stmt->execute(["$id"]);
            return $stmt->fetch(PDO::FETCH_OBJ);
        } catch (\PDOException $e) {

            throw new \Exception(ExceptionPdo::translateError($e->getMessage()));
        } catch (\Exception $e) {

            throw new \Exception($e->getMessage());
        }
    }

    public function insertUsuario(array $dados)
    {

        try {

            $pdo = Conexao::getInstance();

            $sqlInsert = 'INSERT INTO usuario(nome,email,perfil_id,status)';
            $sqlInsert .= 'VALUES (?,?,?,?)';
            $stm = $pdo->prepare($sqlInsert);
            $stm->execute([$dados['nome'], $dados['email'], $dados['perfil_id'], $dados['status']]);
            $retorno = ($stm->rowCount() > 0);

            return $retorno;
        } catch (\PDOException $e) {

            throw new \Exception(ExceptionPdo::translateError($e->getMessage()));
        } catch (\Exception $e) {

            throw new \Exception($e->getMessage());
        }
    }

    public function editUsuario(array $dados)
    {
        try {
            $pdo = Conexao::getInstance();

            $sqlUpdate = 'UPDATE usuario SET nome = ?, email = ?, perfil_id = ?, status = ? WHERE id = ?';
            $stmt = $pdo->prepare($sqlUpdate);
            $stmt->execute([$dados['nome'], $dados['email'], $dados['perfil_id'], $dados['status'], $dados['id']]);

            $retorno = ($stmt->rowCount() > 0);

            return $retorno;
        } catch (\PDOException $e) {
            throw new \Exception(ExceptionPdo::translateError($e->getMessage()));
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function selectAll()
    {

        try {

            $pdo = Conexao::getInstance();

            $stmt = $pdo->prepare('SELECT usuario.id as id_usuario,perfil.id as id_perfil,usuario.*, perfil.*
             FROM usuario INNER JOIN perfil ON usuario.perfil_id = perfil.id WHERE usuario.status = "ATIVO" ORDER BY usuario.id');
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (\PDOException $e) {

            throw new \Exception(ExceptionPdo::translateError($e->getMessage()));
        } catch (\Exception $e) {

            throw new \Exception($e->getMessage());
        }
    }

    public function deleteUsuario(int $id){
        try {
            $pdo = Conexao::getInstance();

            $stmt = $pdo->prepare('DELETE FROM usuario WHERE id = ?');
            $stmt->execute([$id]);

            return ($stmt->rowCount() > 0);

        } catch (\PDOException $e) {
            throw new \Exception(ExceptionPdo::translateError($e->getMessage()));
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

    }
}
