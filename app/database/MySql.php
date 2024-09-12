<?php

namespace app\database;

use PDO;

class MySql
{
    private static $username = "root";
    private static $connection = null;
    private static $password = "Edu@1195";
    private static $dbname = "db_clubcar";
    private static $servername = "host-localhost";

    public static function connect()
    {
        if (!self::$connection) {
            self::$connection = new PDO("mysql:".self::$servername.";dbname=".self::$dbname, self::$username, self::$password, [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
            ]);
        }
        return self::$connection;
    }
}
