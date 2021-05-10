<?php
namespace app\models\validacao;

use app\core\Validacao;

class PedidoValidacao
{
    public static function salvar($pedido)
    {
        $validacao = new Validacao();
        $validacao->setData("id_cliente", $pedido->id_cliente);

        //fazendo a validação
        $validacao->getData("id_cliente")->isVazio();
        return $validacao;
    }
}
