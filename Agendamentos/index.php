<?php

use model\AgendamentosModel;

if (file_exists("model/AgendamentosModel.php")) {
    require_once "model/AgendamentosModel.php";
    $model = new AgendamentosModel();
    $model->verLog((bool)$_POST);
}