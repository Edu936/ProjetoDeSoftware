<?php

namespace app\controller;

use app\database\Querys;
use app\database\MySql;
use app\models\Cidade;
use app\static\Request;
use PDO;
use PDOException;

class CidadeController extends Controller
{
    private $conn;
    private $query;
    private string $tabela = "tb_cidade";
    private array $colunas = ["NM_CIDADE", "DS_ESTADO_CIDADE"];
    private array $indices = [":n", ":e"];

    public function __construct()
    {
        $this->conn = MySql::connect();
        $this->query = new Querys();
    }

    public function salvar() : void
    {
        // Recebe os paramentros dados inseridos no formulario
        $data = Request::only(['name','estado']);
        // Cria o Objeto cidade
        $cidade = new Cidade($data['name'],$data['estado']);
        // Cria a query de criação de registro
        $script = $this->query->insert($this->tabela,$this->colunas,$this->indices);
        $execute = $this->conn->prepare($script);
        $execute -> bindValue(":n", $cidade->getNome());
        $execute -> bindValue(":e", $cidade->getEstado());
        // Execução da query de criação
        try{
            $execute -> execute();
        } catch(PDOException $e){
            echo $e->getMessage();
        }

        $this->views('cadastro', [
            'title' => "Estetica Automotiva", 
            'pag' => "cadastro realizado",
            'cidade' => $cidade,
        ]);
    }

    public function atulizar() : void

    {
        
    }

    public function excluir() : void
    {

    }

    public function buscarPorNome() : void
    {

    }

    public function buscarTodos() : void
    {
        $script = $this->query->select('*',$this->tabela);
        // $script .= " ".$this->query->where("CD_CIDADE",'=',10);
        $execute = $this->conn->prepare($script);
        $execute -> execute();
        $cidades = array();
        do {
            $result = $execute->fetch(PDO::FETCH_OBJ);
            
        }while($result != false);
    }
}
