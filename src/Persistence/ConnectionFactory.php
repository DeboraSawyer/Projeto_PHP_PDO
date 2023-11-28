<?php

namespace App\Persistence;

use App\SystemServices\MonologFactory;

class ConnectionFactory
{

    static $dbuser = '';
    static $dbhost = '';
    static $dbname = '';
    static $password = '';
    static $pdo;

    static function getConnectionInstance()
    {
        try {

            // Instrig de conexão atribuida a variável $pdo.
            //$pdo = new \PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $password);

            self::$pdo = new \PDO("mysql:host" . self::$dbhost . ";dbname=" . self::$dbname, self::$dbuser, self::$password);
            self::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            MonologFactory::getInstance()->info("Conexão obtida com sucesso!");

        } catch (\PDOException $ex) {

            MonologFactory::getInstance()->info("Falha ao obter conexão com o banco de dados!");
            // Mostra qual foi o erro.
            MonologFactory::getInstance()->info($ex->getMessage());

        }

        return self::$pdo;
    }

}

?>