<?php
namespace app\models\dao;
use app\core\Model;

class PedidoDao extends Model{
    public function getPedidoNaoFinalizado($id_cliente){
        $sql = "SELECT * FROM PEDIDO P, CLIENTE C WHERE P.ID_CLIENTE = C.ID_CLIENTE AND
         P.ID_CLIENTE = $id_cliente AND FINALIZADO = 'N'";
        return $this->select($this->db, $sql, false);
    }
    public function getPedido($id_pedido){
        $sql = "SELECT * FROM PEDIDO P, CLIENTE C WHERE P.ID_CLIENTE = C.ID_CLIENTE AND 
        P.ID_PEDIDO = $id_pedido ";
        return $this->select($this->db, $sql, false);
    }
}
