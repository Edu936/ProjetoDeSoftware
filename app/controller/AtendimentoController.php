<?php

namespace app\controller;

use app\Controller\Controller;

class AtendimentoController extends Controller {
   public function index () 
   {
        $this->views('atendimento');
   }
}