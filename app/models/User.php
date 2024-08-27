<?php

namespace app\model;

abstract class User
{
    protected $nome;
    protected $endRua;
    protected $endCep;
    protected $codigo;
    protected $cidade;
    protected $endNumero;
    protected $endBairro;

    public function setNome($nome): void
    {
        $this->nome = $nome;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setEndRua($endRua): void
    {
        $this->endRua = $endRua;
    }

    public function getEndRua(): string
    {
        return $this->endRua;
    }

    public function setEndCep($endCep): void
    {
        $this->endCep = $endCep;
    }

    public function getEndCep(): int
    {
        return $this->endCep;
    }

    public function setEndNumero($endNumero): void
    {
        $this->endNumero = $endNumero;
    }

    public function getEndNumero(): string
    {
        return $this->endNumero;
    }

    public function setEndBairro($endBairro): void
    {
        $this->endBairro = $endBairro;
    }

    public function getEndBairro(): string
    {
        return $this->endBairro;
    }

    public function getCodigo(): int
    {
        return $this->codigo;
    }

    public function getCidade(): int
    {
        return $this->cidade;
    }

    public function setCidade($cidade): void
    {
        $this->cidade = $cidade;
    }
}
