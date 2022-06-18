<?php

use model\AgendamentosModel;

@ob_start();
if (file_exists("../model/Conexao.php")) {
    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }

    require_once "../model/Conexao.php";
    require_once "../model/AgendamentosModel.php";

    try {
        //verifies if user's already done previous part
        if (!$_SESSION['eAdress'] || !$_SESSION['password'] || !$_SESSION['passwordR']) {
            header('Location: signup.php');
            exit();
        }

        //creates object of Conexao
        $con = new Conexao();

        //creates object of AgendamentosModel
        $agdM = new AgendamentosModel();

        //establishes connection
        $con->connect();
        //        $agdM->verLog(filter_input(INPUT_POST, 'email'));
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
    <title>AgendaAí - Cadastro de informações adicionais</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link href="../assets/img/logo-agendaai.svg" rel="icon">
    <link rel="stylesheet" href="../assets/css/reg-personalInfo.css">
    <!--    <style>-->
    <!--        html{-->
    <!--            font-size: 62.5%;-->
    <!--            font-family: "Poppins", sans-serif;-->
    <!--        }-->
    <!---->
    <!--        label, input{-->
    <!--            font-size: 2rem;-->
    <!--        }-->
    <!---->
    <!--        h2{-->
    <!--            font-size: 3rem;-->
    <!--            font-weight: 700;-->
    <!--        }-->
    <!--    </style>-->
</head>

<body>
<div class="container-fluid">
    <div class="form-container">
        <h2>Informações adicionais</h2>
        <form method="POST" id="formSer">
            <div class="row mb-3">
                <div class="col">
                    <div class="form-group mb-3" id="servicos-prestados">
                        <p class="mx-3">Serviços prestados:</p>
                        <div class="ser-box">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="limpeza" name="serPtd[]"
                                       value="Limpeza">
                                <label class="form-check-label" for="limpeza">Limpeza</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="montagem" name="serPtd[]"
                                       value="Montagem">
                                <label class="form-check-label" for="montagem">Montagem</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="AssTec" name="serPtd[]"
                                       value="Assistência técnica eletrônica">
                                <label class="form-check-label" for="AssTec">Assistência técnica eletrônica</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="Cuidado" name="serPtd[]"
                                       value="Cuidado">
                                <label class="form-check-label" for="Cuidado">Cuidado</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="Reforço" name="serPtd[]"
                                       value="Reforço">
                                <label class="form-check-label" for="Reforço">Reforço escolar</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="Reforma" name="serPtd[]"
                                       value="Reforma">
                                <label class="form-check-label" for="Reforma">Reforma e construção</label>
                            </div>
                            <div class="outros-box">
                                <div class="form-group d-inline-flex align-items-center">
                                    <label class="form-check-label mx-3" for="outroSer">Outros:</label>
                                    <input class="form-control" type="text" name="outroSer" id="outroSer">
                                    <input type="button" value="Adicionar" class="btn btn-primary mx-3" id="addSer"
                                           name="addSer">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col d-inline-flex">
                    <p class="mx-3" style="margin-left: 0;">Atualmente, você está:</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="disp" id="disponivel" value="1">
                        <label class="form-check-label" for="disponivel">
                            Disponível
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="disp" id="ocupado" value="0">
                        <label class="form-check-label" for="ocupado">
                            Ocupado
                        </label>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary px-3" id="ant" type="button">Anterior</button>
            <input class="btn btn-primary float-end px-3" type="submit" id="nex" value="Próximo">
        </form>
        <?php
        if ($_POST) {
            if (isset($_POST['serPtd']) && filter_input(INPUT_POST, 'disp')) {
                $servicos = $_POST['serPtd'];
                $disp = filter_input(INPUT_POST, 'disp');

                $agdM->setSerPtd($servicos, $disp);
            }
        }

        ?>
        <script>
            document.getElementById('ant').addEventListener("click", function red() {
                window.location.href = "regPerInf.php";
            }, false);
        </script>
    </div>
</div>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../assets/js/choose-script.js"></script>
</body>

</html>