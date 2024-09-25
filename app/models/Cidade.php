<?php

namespace app\models;

class Cidade extends Model
{
    private int $CD_CIDADE;
    private string $NM_CIDADE;
    private string $DS_ESTADO_CIDADE;

    function __construct()
    {
        $this->table = "tb_cidade";
    }

    public function getNome(): string
    {
        return $this->NM_CIDADE;
    }

    public function setNome($nome): void
    {
        $this->NM_CIDADE = $nome;
    }

    public function getEstado(): string
    {
        return $this->DS_ESTADO_CIDADE;
    }

    public function setEstado($estado): void
    {
        $this->DS_ESTADO_CIDADE = $estado;
    }

    public function getCodigo(): string
    {
        return $this->CD_CIDADE;
    }

    public function setCodigo($codigo): void
    {
        $this->CD_CIDADE = $codigo;
    }
}
