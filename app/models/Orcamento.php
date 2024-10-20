<?php

namespace app\models;

use DateTime;

class Orcamento extends Model
{
    private int $CD_ORCAMENTO;
    private $DT_ORCAMENTO;
    private float $VL_ORCAMENTO;
    private int $CD_CLIENTE;

    public function __construct()
    {
        $this->table = "tb_orcamento";
    }

    //codigo
    public function getCodigo(): int
    {
        return $this->CD_ORCAMENTO;
    }

    public function setCodigo(int $codigo): void
    {
        $this->CD_ORCAMENTO = $codigo;
    }

    //Data do orçamento
    public function getData(): mixed
    {
        $data_formatada = new DateTime($this->DT_ORCAMENTO);
        return $data_formatada->format('d/m/Y');
    }

    public function setData(string $data): void
    {
        $this->DT_ORCAMENTO = $data;
    }

    //Valor total do orçamento
    public function getValor(): float
    {
        return $this->VL_ORCAMENTO;
    }

    public function setValor(float $valor) : void 
    {
        $this->VL_ORCAMENTO= $valor;   
    }

    //Cliente que fez o orçamento
    public function getCliente() : int 
    {
        return $this->CD_CLIENTE;    
    }

    public function setCliente(Cliente $cliente) : void 
    {
        $this->CD_CLIENTE = $cliente->getCodigo();    
    }
}