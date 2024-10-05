<?php

namespace app\models;

class TelefoneCliente extends Model {
    private int $CD_CLIENTE;
    private string $DS_FONE_CLIENTE;

    public function __construct()
    {
        $this->table = "tb_fone_cliente";
    }

    //codigo
    public function getCodigo(): int
    {
        return $this->CD_CLIENTE;
    }

    public function setCodigo(int $codigo): void
    {
        $this->CD_CLIENTE = $codigo;
    }

    //Telefone
    public function getTelefone(): string
    {
        return $this->DS_FONE_CLIENTE;
    }

    public function setTelefone(string $telefone): void
    {
        $this->DS_FONE_CLIENTE = $telefone;
    }
}