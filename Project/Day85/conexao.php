<?php
class Conexao
{
    private $servidor = "127.0.0.1";
    private $porta = "3308";
    private $banco = "login";
    private $usuario = "root";
    private $senha = "";
    public $con = null;

    public function abrirConexao()
    {
        try {
            $this->con = new PDO("mysql:host=$this->servidor;port=$this->porta;dbname=$this->banco", $this->usuario, $this->senha);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Conexão aberta com sucesso";
        } catch (PDOException $e) {
            echo "Erro ao acessar o Banco de Dados: " . $e->getMessage();
        }
        return $this->con;
    }

    public function fecharConexao()
    {
        $this->con = null;
        echo "Conexão finalizada com sucesso";
    }
}

