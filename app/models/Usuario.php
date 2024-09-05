<?php

namespace app\models;

use app\database\MySql;

final class Usuario extends User
{
    private $cpf;
    private $user;
    private $senha;
    private $cargo;

    function __construct($nome, $endRua, $endCep, $endNumero, $endBairro, $cpf, $user, $senha, $cargo, $cidade)
    {
        $this->setCpf($cpf);
        $this->setNome($nome);
        $this->setUser($user);
        $this->setSenha($senha);
        $this->setCargo($cargo);
        $this->setEndRua($endRua);
        $this->setCidade($cidade);
        $this->setEndCep($endCep);
        $this->setEndNumero($endNumero);
        $this->setEndBairro($endBairro);
    }


    public function con(){
        $conn = MySql::connect();
        dd($conn);
    }

    function setCpf($cpf): void
    {
        $this->cpf = $cpf;
    }

    function getCpf(): int
    {
        return $this->cpf;
    }

    public function setUser($user): void
    {
        $this->user = $user;
    }

    public function getUser(): string
    {
        return $this->user;
    }

    public function setSenha($nome): void
    {
        $this->nome = $nome;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }

    public function setCargo($cargo): void
    {
        $this->cargo = $cargo;
    }

    public function getCargo(): string
    {
        return $this->cargo;
    }
}
