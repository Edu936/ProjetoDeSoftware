<?php

namespace app\models;

class PedidoProduto extends Model
{
    private int $CD_PEDIDO;
    private int $CD_PRODUTO;
    private string $DS_STATUS;

    public function __construct()
    {
        $this->table = "tb_pedido_produto";
    }

    public function getPedido() : int
    {
        return $this->CD_PEDIDO;
    }

    public function getProduto() : int 
    {
        return $this->CD_PRODUTO;
    }

    public function getStatus() : string 
    {
        return $this->DS_STATUS;
    }

    public function setPedido($codigo) : void 
    {
        $this->CD_PEDIDO = $codigo;
    }

    public function setProduto($codigo) : void 
    {
        $this->CD_PRODUTO = $codigo;
    }

    public function setStatus($status) : void
    {
        $this->DS_STATUS = $status;
    }
}
