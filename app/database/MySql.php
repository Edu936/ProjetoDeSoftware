<?php

namespace app\database;

use Exception;
use PDO;
use PDOException;

class MySql
{
    private static $username = "root";
    private static $connection = null;
    private static $password = "root";
    private static $dbname = "db_clubcar";
    private static $servername = "localhost";

    public static function connect()
    {
        if (!self::$connection) {
            try {
                self::$connection = new PDO ("mysql:dbname=".self::$dbname.";host=".self::$servername,self::$username,self::$password);
            } catch (PDOException $e) {
                echo "Erro na conexão com o banco de dados ".$e->getMessage();
            } catch (Exception $e) {
                echo "Erro genérico ".$e->getMessage();
            }
        }
        return self::$connection;
    }
}
