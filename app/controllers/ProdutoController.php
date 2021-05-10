<?php

namespace app\controllers;

use app\core\Controller;
use app\models\service\Service;
use app\util\UtilService;

class ProdutoController extends Controller
{
    public function __construct()
   {
      $this->usuario = UtilService::getUsuario();
      if (!$this->usuario) {
         $this->redirect(URL_BASE . "login");
         exit;
      }
   }
    public function buscar($q)
    {
        $lista = Service::getLike("produto", "produto", $q, true);
        echo json_encode($lista);
    }
}
