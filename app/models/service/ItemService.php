<?php
namespace app\models\service;

use app\core\Validacao;
use app\models\dao\ItemDao;
use app\models\validacao\ItemValidacao;

class ItemService{
    public static function listaPorPedido($pedido){
        $dao = new ItemDao();
        return $dao->listaPorPedido($pedido);
    }
    public static function salvar($item, $campo, $tabela){
        $validacao = ItemValidacao::salvar($item);
        return Service::salvar($item, $campo, $validacao->listaErros(), $tabela);
    }
}