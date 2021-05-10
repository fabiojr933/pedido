<?php
namespace app\models\service;

use app\models\dao\PedidoDao;
use app\models\validacao\PedidoValidacao;

class PedidoService{
    public static function salvar($pedido, $campo, $tabela){
        $validacao = PedidoValidacao::salvar($pedido);
        return Service::salvar($pedido, $campo, $validacao->listaErros(), $tabela);
    }
    public static function getPedidoNaoFinalizado($id_cliente){
        $dao = new PedidoDao();
        return $dao->getPedidoNaoFinalizado($id_cliente);
    }
    public static function getPedido($id_pedido){
        $dao = new PedidoDao();
        return $dao->getPedido($id_pedido);
    }
}