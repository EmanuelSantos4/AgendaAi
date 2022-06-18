<?php

use model\AgendamentosModel;

if (file_exists("../model/Conexao.php")) {
    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }

    if (isset($_SESSION['email'])) {
        if ($_SESSION['email'] != "") {
            header("Location: ../view/catalog-page.php");
        }
    }

    require_once "../model/Conexao.php";
    require_once "../model/AgendamentosModel.php";

    try {
        //creates object of Conexao
        $con = new Conexao();

        //creates object of AgendamentosModel
        $agdM = new AgendamentosModel();

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
    <title>AgendaAí - Cadastro</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link href="../assets/img/logo-agendaai.svg" rel="icon">
    <link rel="stylesheet" href="../assets/css/register.css">
</head>

<body>
<section class="text-primary register-photo">
    <div class="form-container">
        <div class="image-holder">
            <form method="POST">
                <h2 class="text-center align-items-center">
                    <img src="../assets/img/logo-agendaai.png" alt="Logo - AgendaAí" height="60">
                    <strong>Crie sua conta</strong>
                </h2>
                <?php
                if (filter_input(INPUT_GET, 'err') == 1) {
                    echo "<p class='text-white text-center bg-danger py-2 px-2 rounded-2'>Por favor, preencha todos os campos corretamente!</p>";
                } elseif (filter_input(INPUT_GET, 'err') == 2) {
                    echo "<p class='text-white text-center bg-danger py-2 px-2 rounded-2'>As senhas não são idênticas!</p>";
                } elseif (filter_input(INPUT_GET, 'err') == 3) {
                    echo "<p class='text-white text-center bg-danger py-2 px-2 rounded-2'>O e-mail informado já está cadastrado!</p>";
                }
                ?>
                <div class="mb-3"><input class="form-control" type="email" name="email" placeholder="E-mail"></div>
                <div class="mb-3"><input class="form-control" type="password" name="password" placeholder="Senha"></div>
                <div class="mb-3"><input class="form-control" type="password" name="password-repeat"
                                         placeholder="Senha (repetir)"></div>
                <div class="mb-3">
                    <?php
                    if (filter_input(INPUT_POST, 'email') !== null && filter_input(INPUT_POST, 'password') !== null && filter_input(INPUT_POST, 'password-repeat') !== null) {
                        $agdM->setCred(filter_input(INPUT_POST, 'email'), filter_input(INPUT_POST, 'password'), filter_input(INPUT_POST, 'password-repeat'));
                    }
                    ?>
                    <button id="continuar" class="btn btn-primary bg-primary border rounded-pill shadow d-block w-100"
                            type="submit">Continuar
                    </button>
                </div>
                <p>Você já tem uma conta? Faça login<a class="already" href="login.php"> aqui.</a></p>
            </form>
        </div>
    </div>
</section>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>