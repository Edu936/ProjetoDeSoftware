<?php

namespace app\models;

class PedidoServico extends Model
{
    private int $CD_PEDIDO;
    private int $CD_SERVICO;
    private string $DS_STATUS;

    public function __construct()
    {
        $this->table = "tb_pedido_servico";
    }

    public function setStatus($status) : void
    {
        $this->DS_STATUS = $status;
    }

    public function getStatus() : string 
    {
        return $this->DS_STATUS;
    }

    public function getPedido() : int
    {
        return $this->CD_PEDIDO;
    }

    public function getServico() : int 
    {
        return $this->CD_SERVICO;
    }

    public function setPedido($codigo) : void 
    {
        $this->CD_PEDIDO = $codigo;
    }

    public function setServico($codigo) : void 
    {
        $this->CD_SERVICO = $codigo;
    }
}

