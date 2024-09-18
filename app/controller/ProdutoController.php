<?php 
    namespace app\controller;

use app\models\Produto;
use app\static\Request;

    class ProdutoController extends Controller
    { 

        private function buscarPorNome(string $name) : Produto{
            $product = new Produto();
            $product-> setNome("");
            $product-> setCodigo(0);
            $product-> setValor(0);
            $product-> setQuantidade(0);

            $produto = new Produto();
            $produto = $produto->findby('NM_PRODUTO',$name);

            return $produto?$produto: $product;
        } 

        public function salvar() 
        {
            $request = Request::all();
            $filtro = $this->buscarPorNome($request['name']);
            $produto= new Produto();
            if($filtro->getNome() != $request['name']){
                $result= $produto->create([
                    "NM_PRODUTO" => $request['name'],
                    "VL_PRODUTO" => $request['valor'],
                    "QTD_PRODUTO"=> $request['quantidade']
                ]);
                if(!$result){
                    $this->views('cadastro',[
                        'title'=>"Estética Automotiva",
                        'pag'=> "cadastro realizado",
                        'resposta'=>"Ocorreu um erro no cadastro!",
                    ]);
                } else {
                    $this->views('cadastro',[
                        'title'=>"Estética Automotiva",
                        'pag'=> "cadastro realizado",
                        'resposta'=>"O produto {$request['name']} foi cadastrado com sucesso!",
                    ]);
                }
            } else {
                $this->views('cadastro',[
                    'title'=>"Estética Automotiva",
                    'pag'=> "cadastro realizado",
                    'resposta'=>"Este produto ja foi cadastrado!",
                ]);
            }


        }
    }
?>