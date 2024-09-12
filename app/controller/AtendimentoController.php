<?php

namespace app\controller;

class AtendimentoController extends Controller
{
   public function index()
   {
      $this->views('atendimento', [
         'title' => "Estetica Automotiva",
         'pag' => "index",
      ]);
   }

   public function createClient()
   {
      $this->views('atendimento', [
         'title' => "Estetica Automotiva",
         'pag' => "client",
      ]);
   }
}
