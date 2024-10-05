<?php

namespace app\models;

class EmailFornecedor extends Model {
    private int $CD_FORNECEDOR;
    private string $DS_EMAIL_FORNECEDOR;

    public function __construct()
    {
        $this->table = "tb_email_fornecedor";
    }

    //codigo
    public function getCodigo(): int
    {
        return $this->CD_FORNECEDOR;
    }

    public function setCodigo(int $codigo): void
    {
        $this->CD_FORNECEDOR = $codigo;
    }

    //Telefone
    public function getTelefone(): string
    {
        return $this->DS_EMAIL_FORNECEDOR;
    }

    public function setTelefone(string $telefone): void
    {
        $this->DS_EMAIL_FORNECEDOR = $telefone;
    }
}