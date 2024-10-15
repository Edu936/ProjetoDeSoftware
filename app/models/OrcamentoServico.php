<?php

namespace app\models;

class OrcamentoServico extends Model
{
    private int $CD_ORCAMENTO;
    private int $CD_SERVICO;

    public function __construct()
    {
        $this->table = "tb_orcamento_servico";
    }

    public function getOrcamento() : int
    {
        return $this->CD_ORCAMENTO;
    }

    public function getServico() : int 
    {
        return $this->CD_SERVICO;
    }

    public function setOrcamento($codigo) : void 
    {
        $this->CD_ORCAMENTO = $codigo;
    }

    public function setServico($codigo) : void 
    {
        $this->CD_SERVICO = $codigo;
    }
}
