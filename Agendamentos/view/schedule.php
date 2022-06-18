<?php

use model\AgendamentosModel;

if (file_exists("../model/Conexao.php" && file_exists("..model/AgendamentosModel.php"))) {
    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }
    require_once "../model/Conexao.php";
    require_once "../model/AgendamentosModel.php";
    try {
        $eAdress = filter_input(INPUT_POST, 'email');
        $con = new Conexao();
        $mod = new AgendamentosModel();

        //verifies if user is logged in
        //$mod->verLog($eAdress);

        //establishes connection
        $con->connect();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>AgendaAí - Agendamentos</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap-profile.min.css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="../assets/css/nav.css">
    <link rel="stylesheet" href="../assets/css/scheduleS.css">
    <link href="../assets/img/logo-agendaai.svg" rel="icon">

    <!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
</head>

<body>
<?php
include "nav.php";
?>
<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <div class="container-fluid">
            <div class="row py-3 mt-3 text-center"><h3 class="text-dark mb-4"><strong>Agendamentos</strong></h3></div>
            <div class="filter mb-3">
                <form>
                    <div class="row py-3">
                        <div class="col col-md-10">
                            <div class="mb-3"><input class="form-control" name="srchNtf"
                                                     placeholder="Pesquise aqui por agendamentos específicos"></div>
                        </div>
                        <div class="col col-md-2 text-center">
                            <input class="btn btn-primary" name="" type="submit" value="Pesquisar">
                        </div>
                    </div>
                    <div class="row">
                        <div class="notification-container">
                            <div class="notification-header">
                                <h4>Título da notificação</h4>
                            </div>
                            <div class="notification-body">
                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ab amet
                                    asperiores aspernatur aut cum cumque fuga hic id laudantium natus, similique sit?
                                    Debitis facilis nulla odio quasi reiciendis sed!</p>
                                <form><input type="submit" class="btn btn-outline-success float-end"
                                             value="Marcar como lida"></form>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/theme-profile.js"></script>
</body>
</html>