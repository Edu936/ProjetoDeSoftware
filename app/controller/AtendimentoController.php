<?php

namespace app\controller;

class AtendimentoController extends Controller
{
   public function index() : void
   {
      $this->views('atendimento', [
         'title' => "Estética Automotiva",
         'pag' => "index",
      ]);
   }
   
   public function pedido() : void
   {
      $this->views('atendimento', [
         'title' => "Estética Automotiva",
         'pag' => "pedido"
      ]);
   }

   public function orcamento() : void
   {
      $this->views('atendimento', [
         'title' => "Estética Automotiva",
         'pag' => "orcamento",
      ]);
   }

   public function cliente() : void
   {
      $this->views('atendimento', [
         'title' => "Estética Automotiva",
         'pag' => "cliente",
      ]);
   }

   public function veiculo() : void
   {
      $this->views('atendimento', [
         'title' => "Estética Automotiva",
         'pag' => "veiculo",
      ]);
   }

}
