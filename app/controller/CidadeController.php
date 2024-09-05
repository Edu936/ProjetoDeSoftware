<?php

namespace app\controller;

class CidadeController extends Controller
{
    public function index()
    {
        $this->views('cidade');
    }

    public function cadastrar()
    {
    

        $nome = $_POST["name"];
        $estado = $_POST["estado"];

        $servername = "localhost";
        $username = "root";  
        $password = "";    
        $dbname = "db_clubcar";         
    
        $conn = mysqli_connect($servername, $username, $password, $dbname);
    
        if (!$conn) {
            die("Conexão falhou: " . mysqli_connect_error());
        }
        
        $sql = "INSERT INTO tb_cidade (NM_CIDADE, DS_ESTADO_CIDADE) VALUES ('$nome', '$estado')";
        $result = mysqli_query($conn, $sql);


        if ($result) {
            echo "Dados inseridos com sucesso!";
        } else {
            echo "Erro ao inserir dados: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
}
