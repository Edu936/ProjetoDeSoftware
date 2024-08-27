<?php

namespace app\model;

final class Veiculo
{
    private $placa;
    private $marca;
    private $porte;
    private $modelo;
    private $codigo;
    private $cliente;

    function __construct($placa, $modelo, $marca, $porte, $cliente)
    {
        $this->setPlaca($placa);
        $this->setMarca($marca);
        $this->setPorte($porte);
        $this->setModelo($modelo);
        $this->setCliente($cliente);
    }

    public function getCodigo(): int
    {
        return $this->codigo;
    }

    public function getPlaca(): int
    {
        return $this->placa;
    }

    public function setPlaca($placa): void
    {
        $this->placa = $placa;
    }

    public function getModelo(): string
    {
        return $this->modelo;
    }

    public function setModelo($modelo): void
    {
        $this->modelo = $modelo;
    }

    public function getMarca(): string
    {
        return $this->marca;
    }

    public function setMarca($marca): void
    {
        $this->marca = $marca;
    }

    public function getPorte(): string
    {
        return $this->porte;
    }

    public function setPorte($porte): void
    {
        $this->porte = $porte;
    }

    public function getCliente(): int
    {
        return $this->cliente;
    }

    public function setCliente($cliente): void
    {
        $this->cliente = $cliente;
    }
}
