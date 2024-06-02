<?php

namespace app\models;

use app\classes\Bind;
use PDO;

class Connection
{
    public static function connect()
    {
        $config = (object) Bind::get('config')->database;

        $pdo = new PDO("mysql:host=$config->host;dbname=$config->dbname;charset=$config->charset", $config->username, $config->password, $config->options);

        return $pdo;
    }
}
