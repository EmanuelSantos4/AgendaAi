<?php

use model\AgendamentosModel;

if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}

if (file_exists("../model/Conexao.php")) {
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link href="../assets/img/logo-agendaai.svg" rel="icon">
    <link rel="stylesheet" href="../assets/css/loginStyle.css">
</head>

<body>
<section class="text-primary register-photo">
    <div class="form-container">
        <div class="image-holder">
            <form method="POST">
                <h2 class="text-center">
                    <img src="../assets/img/logo-agendaai.png" alt="Logo - AgendaAí" height="60">
                    <strong>Entre em sua conta</strong>
                </h2>
                <?php
                $err = filter_input(INPUT_GET, 'err');
                if ($err == 1) {
                    echo "<p class='text-white text-center bg-danger py-2 px-2 rounded-2'>Por favor, preencha todos os campos corretamente!</p>";
                } elseif ($err == 2) {
                    echo "<p class='text-white text-center bg-danger py-2 px-2 rounded-2'>Endereço de e-mail não cadastrado.</p>";
                } elseif ($err == 3) {
                    echo "<p class='text-white text-center bg-danger py-2 px-2 rounded-2'>Senha incorreta. Por favor, tente novamente.</p>";
                }
                ?>
                <div class="mb-3"><input class="form-control input" type="email" name="email" placeholder="E-mail">
                </div>
                <div class="mb-3"><input class="form-control input" type="password" name="password" id="input-pwd"
                                         placeholder="Senha"></div>
                <div><input type="checkbox" class="form-check-input" name="stayLoggedIn" id="stayLoggedIn"><label
                            class="form-check-label ms-2" for="keepLoggedIn">Manter a sessão aberta</label></div>
                <div class="mb-3">
                    <?php
                    $email = filter_input(INPUT_POST, 'email');
                    $pwd = filter_input(INPUT_POST, 'password');
                    $stayLogged = filter_input(INPUT_POST, 'stayLoggedIn');

                    if ($email !== null && $pwd !== null) {
                        $agdM->login($email, $pwd, $stayLogged);
                    }
                    ?>
                    <button id="continuar" class="btn btn-primary bg-primary border rounded-pill shadow d-block w-100"
                            type="submit">Continuar
                    </button>
                </div>
                <p>Ainda não possui uma conta? Cadastre-se<a class="already" href="signup.php"> aqui.</a></p>
            </form>
        </div>
    </div>
</section>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script>
    let state = false;

    function showPassword() {
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#input-pwd');

        togglePassword.addEventListener('click', function (e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
</script>
</body>

</html>