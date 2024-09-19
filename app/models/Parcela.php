<?php

namespace app\models;

use DateTime;

class Parcela extends Model 
{
    private int $CD_PAGAMENTO;
    private DateTime $DT_VENCIMENTO;
    private string $DS_STATUS_PAGAMENTO;
    private float $VL_PARCELA;
    private float $VL_JUROS;  
    private DateTime $DT_PAGAMENTO;  

    public function __construct()
    {
        $this->table = "tb_parcelas";   
    }

    //Codigo
    public function getCodigo(): int
    {
        return $this->CD_PAGAMENTO;
    }

    public function setCodigo(int $codigo): void
    {
        $this->CD_PAGAMENTO = $codigo;
    }

    //Data de vencimento do pagamento da parcela
    public function getVencimento(): DateTime
    {
        return $this->DT_VENCIMENTO;
    }

    public function setVencimento(DateTime $data): void
    {
        $this->DT_VENCIMENTO = $data->format('d/m/Y');
    }

    //Data de pagamento da parcela 
    public function getPagamento() : DateTime
    {
        return $this->DT_PAGAMENTO;
    }

    public function setPagamento(DateTime $data): void
    {
        $this->DT_PAGAMENTO = $data->format('d/m/Y');
    }

    //O status do pagamento
    public function getStatus() : string 
    {
        return $this->DS_STATUS_PAGAMENTO;
    }

    public function setStatus(string $status) : void 
    {
        $this->DS_STATUS_PAGAMENTO = $status;
    }

    public function getValor() : float
    {
        return $this->VL_PARCELA;    
    }

    public function setValor(float $valor) : void
    {
        $this-> VL_PARCELA = $valor;
    }

    public function getJuros() : float
    {
        return $this-> VL_JUROS;
    }

    public function setJuros(float $valor) : void
    {
        $this->VL_JUROS = $valor;
    }
}