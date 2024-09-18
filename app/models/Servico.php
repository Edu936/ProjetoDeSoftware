<?php

namespace app\models;

class Servico extends Model 
{
    private int $CD_SERVICO;
    private string $NM_SERVICO;
    private float $VL_SERVICO;

    public function __construct()
    {
        $this->table = 'tb_servico';
    }

    public function getCodigo() : int 
    {
        return $this->CD_SERVICO;
    }

    public function setCodigo($codigo) : void 
    {
        $this->CD_SERVICO=$codigo;
    }

    public function getNome() : string 
    {
        return $this->NM_SERVICO;
    }

    public function setNome($nome) : void 
    {
        $this->NM_SERVICO=$nome;
    }

    public function getValor() : float 
    {
        return $this->VL_SERVICO;
    } 
     
    public function setValor($valor) : void 
    {
        $this->VL_SERVICO=$valor;
    }
}