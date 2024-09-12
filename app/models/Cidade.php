<?php

namespace app\models;

class Cidade extends Model
{
    private int $codigo;
    private string $nome;
    private string $estado;

    function __construct($nome, $estado)
    {
        $this->setNome($nome);   
        $this->setEstado($estado);
        $this->table = 'TB_CIDADE';
    }

    public function getCodigo(): int
    {
        return $this->codigo;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome($nome): void
    {
        $this->nome = $nome;
    }

    public function getEstado(): string
    {
        return $this->estado;
    }

    public function setEstado($estado): void
    {
        $this->estado = $estado;
    }
}
