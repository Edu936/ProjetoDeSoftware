<?php

namespace app\models;

class EmailCliente extends Model {
    private int $CD_CLIENTE;
    private string $DS_EMAIL_CLIENTE;

    public function __construct()
    {
        $this->table = "tb_email_cliente";
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
        return $this->DS_EMAIL_CLIENTE;
    }

    public function setTelefone(string $telefone): void
    {
        $this->DS_EMAIL_CLIENTE = $telefone;
    }
}