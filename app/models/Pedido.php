<?php

namespace app\models;

use DateTime;

class Pedido extends Model
{
    private int $CD_PEDIDO;
    private mixed $DT_PEDIDO;
    private string $DS_STATUS;
    private float $VL_TOTAL;
    private float $VL_DESCONTO;
    private float $VL_LIQUIDO;
    private int $NU_PARCELAS;
    private string $DS_TIPO;
    private int $CD_USUARIO;
    private int $CD_CLIENTE;
    private ?int $CD_VEICULO;
    private ?int $CD_ORCAMENTO;

    public function __construct()
    {
        $this->table = "tb_pedido";
    }

    //codigo
    public function getCodigo(): int
    {
        return $this->CD_PEDIDO;
    }

    public function setCodigo(int $codigo): void
    {
        $this->CD_PEDIDO = $codigo;
    }

    //Data do pedido
    public function getData(): mixed
    {
        $data_formatada = new DateTime($this->DT_PEDIDO);
        return $data_formatada->format('d/m/Y');
    }

    public function setData(mixed $data): void
    {
        $this->DT_PEDIDO = $data;
    }

    //Status
    public function getStatus(): string
    {
        return $this->DS_STATUS;
    }

    public function setStatus(string $status): void
    {
        $this->DS_STATUS= $status;
    }

    //Valor total do pedido
    public function getValor(): float
    {
        return $this->VL_TOTAL;
    }

    public function setValor(float $valor) : void 
    {
        $this->VL_TOTAL= $valor;   
    }

    //Valor do desconto pedido
    public function getDesconto(): float
    {
        return $this->VL_DESCONTO;
    }

    public function setDesconto(float $desconto) : void 
    {
        $this->VL_DESCONTO = $desconto;   
    }

    //Valor liquido do pedido
    public function getValorLiquido(): float
    {
        return $this->VL_LIQUIDO;
    }

    public function setValorLiquido(float $valorLiquido) : void 
    {
        $this->VL_LIQUIDO = $valorLiquido;   
    }

    //Numero de parcelas do pedido
    public function setParcelas(int $parcelas) : void
    {
        $this->NU_PARCELAS = $parcelas;
    }

    
    public function getParcelas() : int
    {
        return $this->NU_PARCELAS;
    }

    //Tipo de pagamento
    public function getTipoPagamento() : string 
    {
        return $this->DS_TIPO;    
    }

    public function setTipoPagamento(string $tipo) : void 
    {
        $this->DS_TIPO = $tipo;
    }

    //Usuario que cadastrou o pedido
    public function getUsuario() : int 
    {
        return $this->CD_USUARIO;    
    }

    public function setUsuario(Usuario $usuario) : void 
    {
        $this->CD_USUARIO = $usuario->getCodigo();    
    }

    //Cliente que fez o pedido
    public function getCliente() : int 
    {
        return $this->CD_CLIENTE;    
    }

    public function setCliente(Cliente $cliente) : void 
    {
        $this->CD_CLIENTE = $cliente->getCodigo();    
    }

    //Veiculo que sera feito o pedido
    public function getVeiculo() : int 
    {
        return $this->CD_VEICULO;    
    }

    public function setVeiculo(Veiculo $veiculo) : void 
    {
        $this->CD_VEICULO = $veiculo->getCodigo();    
    }

    //Orcamento que originou o pedido
    public function getOrcamento() : int
    {
        return $this->CD_ORCAMENTO; 
    }

    public function setOrcamento(Orcamento $orcamento) : void 
    {
        $this->CD_ORCAMENTO = $orcamento->getCodigo(); 
    }
}