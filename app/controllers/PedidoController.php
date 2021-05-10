<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\ItemService;
use app\models\service\PedidoService;
use app\models\service\Service;
use app\util\UtilService;

class PedidoController extends Controller
{
    private $tabela = "pedido";
    private $campo = "id_pedido";

    public function __construct()
    {
        $this->usuario = UtilService::getUsuario();
        if (!$this->usuario) {
            $this->redirect(URL_BASE . "login");
            exit;
        }
    }
    public function index()
    {
        $dados["lista"] = Service::lista($this->tabela);
        $dados["view"] = "Pedido/index";
        $this->load("template", $dados);
    }
    public function create()
    {
        $id_cliente = $this->usuario->id_cliente;
        $pedido = PedidoService::getPedidoNaoFinalizado($id_cliente);
        if(!$pedido){
            $id_pedido = Service::inserir(["id_cliente"=> $id_cliente, "data"=>hoje(), "hora"=>agora()], "pedido");
            $pedido = PedidoService::getPedido($id_pedido);
        }
        $dados["pedido"] = $pedido;
        $dados["itens"] = ItemService::listaPorPedido($pedido->id_pedido);
        $dados["view"] = "Pedido/create";
        $this->load("template", $dados);
    }
   
}
