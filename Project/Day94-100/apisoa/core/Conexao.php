<?php

define('SGBD', 'mysql');
define('HOST', 'localhost');
define('DBNAME', 'soa');   
define('CHARSET', 'utf8');
define('USER', 'root');
define('PASSWORD', '');
define('SERVER', 'windows');
define('PORTA_DB', 3306);

class Conexao
{

    //criação da variavel $pdo
    //definida como privada pois só pode ser acessada dentro da classe conexão
    //E static pois pode ser acessada através de um método estático, sem precisar de uma instancia
    // no caso o getInstance da seguinte forma:$pdo = Conexao::getInstance(); (isso é feito na model)
    private static $pdo;

    private function __construct() {}

    private static function existsExtension()
    {

        switch (SGBD):
            case 'mysql':
                $extensao = 'pdo_mysql';
                break;
            case 'mssql': {
                    if (SERVER == 'linux') :
                        $extensao = 'pdo_dblib';
                    else :
                        $extensao = 'pdo_sqlsrv';
                    endif;
                    break;
                }
            case 'postgre':
                $extensao = 'pdo_pgsql';
                break;
            default:   //se não for nenhuma é definida como vazia
                $extensao = '';
        endswitch;

        if (empty($extensao) || !extension_loaded($extensao)) :
            echo "Extensão PDO '{$extensao}' não está habilitada!";
        endif;
        //se estiver vazia gera o erro
    }


    //declarado como public static para q possa ser acessado de outra classe sem uma instancia

    public static function getInstance()
    {
        //chama a função criada aqui nesse arquivo, antes dessa
        self::existsExtension();  //ela verifica a extensão do PDO
                                    //isso é importante para garantir que o PHP tenha suporte para interagir com o BD

        if (!isset(self::$pdo)) {

            try {
                switch (SGBD): //verifica qual BD está sendo utilizado (mysql,sqlServer)
                    case 'mysql': //para cada caso no switch define a extensão correspondente
                        $opcoes = array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');//opções para conexão
                        self::$pdo = new \PDO("mysql:host=" . HOST . "; dbname=" . DBNAME . ";", USER, PASSWORD, $opcoes);
                        break;
                    case 'mssql': {
                            if (SERVER == 'linux') :
                                self::$pdo = new \PDO("dblib:host=" . HOST . "; database=" . DBNAME . ";", USER, PASSWORD);
                            else :
                                self::$pdo = new \PDO("sqlsrv:server=" . HOST . "; database=" . DBNAME . ";", USER, PASSWORD);
                            endif;
                            break;
                        }
                    case 'postgre':
                        self::$pdo = new \PDO("pgsql:host=" . HOST . "; port=" . PORTA_DB . "; dbname=" . DBNAME . ";", USER, PASSWORD);
                        break;
                endswitch;

                self::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);//configira o modo de erro
            } catch (\PDOException $e) { //captura exceções
                throw new \PDOException($e->getMessage());
            } catch (\Exception $e) {
                throw new \Exception($e->getMessage());
            }
        }
        return self::$pdo; //retorna a instancia da conexão
    }

    public static function isConected()
    {

        if (self::$pdo) :
            return true;
        else :
            return false;
        endif;
    }
}
