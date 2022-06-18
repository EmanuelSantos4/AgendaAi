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

        //fetches basic info about user as an array
        $user_con = $con->getUserCon($eAdress);
        //fetches user contact info
        $user_ctt = $con->getUserCtt($eAdress);
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
    <title>AgendaAí - Perfil</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap-profile.min.css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="../assets/css/nav.css">
    <link rel="stylesheet" href="../assets/vendor/bootstrap-icons/bootstrap-icons.css">
    <link href="../assets/img/logo-agendaai.svg" rel="icon">
</head>

<body>
<?php
include "nav.php";
?>
<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <div class="container-fluid">
            <div class="row py-3 text-center"><h3 class="text-dark mb-4"><strong>Perfil</strong></h3></div>
            <div class="row mb-3">
                <div class="col-lg-4 align-self-center">
                    <div class="card mb-3">
                        <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4"
                                                                       alt="Profile Photo"
                                                                       src="<?= '../assets/img/' . $user_con['foto'] ?>"
                                                                       width="160" height="160">
                            <div class="mb-3">
                                <button class="btn btn-primary btn-sm" type="button">Alterar foto</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col">
                            <div class="card shadow mb-3">
                                <div class="card-header py-3">
                                    <p class="text-primary m-0 fw-bold text-center">Configurações de usuário</p>
                                </div>
                                <div class="card-body">
                                    <form method="POST">
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3"><label class="form-label"
                                                                         for="name"><strong>Nome</strong></label><input
                                                            class="form-control" type="text" id="name" name="name"
                                                            value="<?= $user_con['name'] ?>"></div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3"><label class="form-label" for="bday"><strong>Data de
                                                            nascimento</strong></label><input class="form-control"
                                                                                              type="date" id="bday"
                                                                                              name="bday"
                                                                                              value="<?= $user_con['bday'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3"><label class="form-label" for="nickname"><strong>Apelido</strong></label><input
                                                            class="form-control" type="text" id="nickname"
                                                            name="nickname" value="<?= $user_con['apelido'] ?>"></div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3"><label class="form-label"
                                                                         for="email"><strong>E-mail</strong></label><input
                                                            class="form-control" type="email" id="email" name="email"
                                                            value="<?= filter_input(INPUT_POST, 'email') ?>"></div>
                                            </div>
                                        </div>
                                        <div class="row text-center">
                                            <div class="col">
                                                <div class="mb-3"><label class="form-label" for="serPtd"><strong>Descrição
                                                            dos serviços prestados</strong></label><input type="text"
                                                                                                          class="form-control"
                                                                                                          id="serPtd"
                                                                                                          name="serPtd"
                                                                                                          value="<?= $user_con['serPtd'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <button class="btn btn-primary" type="submit">Salvar configurações</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card shadow mb-3">
                                <div class="card-header py-3">
                                    <p class="text-primary m-0 fw-bold text-center">Alterar senha</p>
                                </div>
                                <div class="card-body">
                                    <form method="POST">
                                        <?php
                                        //                                        if($con->uptPass(filter_input(INPUT_POST, 'curPass'), filter_input(INPUT_POST, 'newPass'))){
                                        //                                            echo "<div class='row py-3 bg-success rounded-3 text-white text-center'><p>Senha alterada com sucesso!</p></div>";
                                        //                                        } else {
                                        //                                            echo "<div class='row py-3 bg-success rounded-3 text-white text-center'><p>Não foi possível aterar a sua senha. Por favor, tente novamente.</p></div>";
                                        //                                        }
                                        ?>
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3"><label class="form-label" for="cPass"><strong>Senha
                                                            atual</strong></label><input class="form-control"
                                                                                         type="password" id="cPass"
                                                                                         name="curPass"></div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3"><label class="form-label" for="nPass"><strong>Nova
                                                            senha</strong></label><input class="form-control"
                                                                                         type="password" id="nPass"
                                                                                         name="newPass"></div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <button class="btn btn-primary" type="submit">Resetar senha</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <p class="text-primary m-0 fw-bold text-center">Informações de contato</p>
                                </div>
                                <div class="card-body">
                                    <form method="POST">
                                        <div class="row py-5">
                                            <div class="col col-md-5">
                                                <label class="form-label"
                                                       for="address"><strong>Logradouro</strong></label><input
                                                        class="form-control" type="text" id="address" name="address"
                                                        value="<?= $user_ctt['logradouro'] ?>">
                                            </div>
                                            <div class="col col-md-3">
                                                <label class="form-label"
                                                       for="adrNumber"><strong>Número</strong></label><input
                                                        class="form-control" type="text" id="adrNumber" name="adrNumber"
                                                        value="<?= $user_ctt['numero'] ?>">
                                            </div>
                                            <div class="col col-md-4">
                                                <label class="form-label"
                                                       for="adrBai"><strong>Bairro</strong></label><input
                                                        class="form-control" type="text" id="adrBai" name="adrBai"
                                                        value="<?= $user_ctt['bairro'] ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3"><label class="form-label"
                                                                         for="city"><strong>Cidade</strong></label><input
                                                            class="form-control" type="text" id="city" name="city"
                                                            value="<?= $user_ctt['cidade'] ?>"></div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3"><label class="form-label"
                                                                         for="uf"><strong>Estado</strong></label><input
                                                            class="form-control" type="text" id="uf" name="uf"
                                                            value="<?= $user_ctt['cep'] ?>"></div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3"><label class="form-label"
                                                                         for="cep"><strong>CEP</strong></label><input
                                                            class="form-control" type="text" id="cep" name="cep"
                                                            value="<?= $user_ctt['uf'] ?>"></div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <button class="btn btn-primary" type="submit">Salvar configurações</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/js/theme-profile.js"></script>
</body>

</html>