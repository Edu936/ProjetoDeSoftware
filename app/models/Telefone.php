<?php

namespace app\model;

final class Telefone
{
    private $user;
    private $codigo;
    private $numero;

    function __construct($numero, $user)
    {
        $this->setUser($user);
        $this->setNumero($numero);
    }

    public function getCodigo(): string
    {
        return $this->codigo;
    }

    public function getNumero(): int
    {
        return $this->numero;
    }

    public function setNumero($numero): void
    {
        $this->codigo = $numero;
    }

    public function getUser(): int
    {
        return $this->user;
    }

    public function setUser($user): void
    {
        $this->user = $user;
    }
}
