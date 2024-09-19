<?php

namespace app\models;

class Veiculo extends Model
{
    private int $CD_VEICULO;
    private string $DS_PLACA;
    private string $DS_MODELO;
    private string $DS_MARCA;
    private string $DS_PORTE;
    private int $CD_CLIENTE;

    public function __construct()
    {
     $this->table = "tb_veiculo";   
    }

    //codigo
    public function getCodigo(): int
    {
        return $this->CD_VEICULO;
    }

    public function setCodigo(int $codigo): void
    {
        $this->CD_VEICULO = $codigo;
    }

    //Cliente
    public function getCliente(): int
    {
        return $this->CD_CLIENTE;
    }

    public function setCliente(Cliente $cliente): void
    {
        $this->CD_CLIENTE = $cliente->getCodigo();
    }

    //Placa
    public function getPlaca(): string
    {
        return $this->DS_PLACA;
    }

    public function setPlaca(string $placa): void
    {
        $this->DS_PLACA = $placa;
    }

    //Modelo
    public function getModelo(): string
    {
        return $this->DS_MODELO;
    }

    public function setModelo(string $modelo) : void 
    {
        $this->DS_MODELO = $modelo;   
    }

    //Porte
    public function setPorte(string $porte) : void
    {
        $this->DS_PORTE = $porte;
    }

    
    public function getPorte() : string
    {
        return $this->DS_PORTE;
    }

    //Marca
    public function getMarca() : string 
    {
        return $this->DS_MARCA;    
    }

    public function setMarca(string $marca) : void 
    {
        $this->DS_MARCA = $marca;
    }
}