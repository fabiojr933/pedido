<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\itemService;
use app\models\service\Service;
use app\util\UtilService;

class ItemController extends Controller
{
    private $tabela = "item_pedido";
    private $campo = "id_item";
   
    public function salvar()
    {
        $item = new \stdClass();
        $item->id_item  = null;
        $item->id_produto = $_POST["id_produto"];
        $item->id_pedido = $_POST["id_pedido"];
        $item->valor = $_POST["valor"];
        $item->qtde = $_POST["qtde"];
        $item->subtotal = $item->valor * $item->qtde;      

        Flash::setForm($item);
        i($item);
        ItemService::salvar($item, $this->campo, $this->tabela);
        $lista = itemService::listaPorPedido($item->id_pedido);
        echo json_encode($lista);
        
    }
    public function excluir($id_item)
    {
        Service::excluir($this->tabela, $this->campo, $id_item);
      //  $lista = itemService::listaPorPedido($id_pedido);
      //  echo json_encode($lista);
        $this->redirect(URL_BASE . "pedido/create");
    }
}
