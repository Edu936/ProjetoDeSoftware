<?php

/** 
 * O metodo index está sendo inicializado assim que o servidor inica. A primeira coisa que acontece quando 
 * o index e inicalizado e a exportação da classe Router que possui o metod estatico run esse metodo e res-
 * ponsavel por identificar o que está na minha url e saber qual pagina deve ser exibida.
 */

use app\core\Router;

require '../vendor/autoload.php';

session_start();

$path = Router::run();

extract(['name' => 'Eduardo']);

require $path['path'];