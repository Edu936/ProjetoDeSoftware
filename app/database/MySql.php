<?php

namespace app\database;

use PDO;

class MySql
{
    private static $connection = null;

    public static function connect()
    {
        if (!self::$connection) {
            self::$connection = new PDO("mysql:host-localhost;dbname=db_clubcar", "root", "", [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
            ]);
            return self::$connection;
        }
    }
}
    // $servername = "localhost";
    // $username = "root";  
    // $password = "";    
    // $dbname = "db_clubcar";         

    // $conn = mysqli_connect($servername, $username, $password, $dbname);

    // if (!$conn) {
    //     die("Conexão falhou: " . mysqli_connect_error());
    // }
