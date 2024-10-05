<?php

namespace app\models;

class TelefoneUsuario extends Model {
    private int $CD_USUARIO;
    private string $DS_FONE_USUARIO;

    public function __construct()
    {
        $this->table = "tb_fone_usuario";
    }

    //codigo
    public function getCodigo(): int
    {
        return $this->CD_USUARIO;
    }

    public function setCodigo(int $codigo): void
    {
        $this->CD_USUARIO = $codigo;
    }

    //Telefone
    public function getTelefone(): string
    {
        return $this->DS_FONE_USUARIO;
    }

    public function setTelefone(string $telefone): void
    {
        $this->DS_FONE_USUARIO = $telefone;
    }
}