<?php

namespace app\models\dao;

use app\core\Model;

class ItemDao extends Model
{
    public function listaPorPedido($pedido)
    {
        $sql = "SELECT * FROM ITEM_PEDIDO I, PRODUTO P WHERE I.ID_PRODUTO = P.ID_PRODUTO
        AND I.ID_PEDIDO = $pedido";
        return $this->select($this->db, $sql);
    }
}
