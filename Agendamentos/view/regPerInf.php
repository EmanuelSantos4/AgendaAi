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
    <title>AgendaAí - Cadastro de informações pessoais</title>
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
        <h2>Informações pessoais e endereço</h2>
        <form method="POST">
            <?php
            if (filter_input(INPUT_GET, 'err') == 1) {
                echo "<p class='text-white text-center bg-danger py-2 px-2 rounded-2'>Por favor, preencha todos os campos!</p>";
            }
            ?>
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group mb-3"><label for="nome" class="form-label d-md-flex">Nome
                            completo:</label><input class="form-control" id="nome" name="nome" type="text"></div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group mb-3"><label for="apelido" class="form-label">Apelido:</label><input
                                class="form-control" id="apelido" name="apelido" type="text"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group mb-3"><label for="dataNasc" class="form-label">Data de
                            nascimento:<br></label><input class="form-control" id="dataNasc" name="dataNasc"
                                                          type="date"></div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group mb-3"><label for="cpf" class="form-label">CPF:</label><input
                                class="form-control" id="cpf" name="cpf" type="text"></div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group mb-3"><label for="numCel" class="form-label">Número de celular:</label><input
                                class="form-control" id="numCel" name="numCel" type="text"></div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group mb-3">
                        <label for="gen" class="form-label">Sexo:</label>
                        <select name="gen" id="gen" class="form-select">
                            <option value="0">Selecione</option>
                            <option value="1">Masculino</option>
                            <option value="2">Feminino</option>
                            <option value="3">Outro</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2 col-md-4">
                    <div class="form-group mb-3"><label for="cep" class="form-label">CEP:</label><input
                                class="form-control" id="cep" name="cep" type="text"></div>
                </div>
                <div class="col-sm-2 col-md-5">
                    <div class="form-group mb-3"><label for="cid" class="form-label">Cidade:</label><input
                                class="form-control" id="cid" name="cid" type="text"></div>
                </div>
                <div class="col-sm-2 col-md-3">
                    <div class="form-group mb-3"><label for="est" class="form-label">Estado:</label><input
                                class="form-control" id="est" name="est" type="text"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2 col-md-6">
                    <div class="form-group mb-3"><label for="logr" class="form-label">Logradouro:</label><input
                                class="form-control" id="logr" name="logr" type="text"></div>
                </div>
                <div class="col-sm-2 col-md-4">
                    <div class="form-group mb-3"><label for="bai" class="form-label">Bairro:</label><input
                                class="form-control" id="bai" name="bai" type="text"></div>
                </div>
                <div class="col-sm-2 col-md-2">
                    <div class="form-group mb-3"><label for="numCas" class="form-label">Número:</label><input
                                class="form-control" id="numCas" name="numCas" type="text"></div>
                </div>
            </div>
            <div class="row mb-3">
                <h5 class="text-center">Escolha seu papel dentro da plataforma:</h5>
                <div class="col col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="proType" id="pds" value="pds">
                        <label class="form-check-label" for="pds">
                            <!--                            <img src="../assets/img/empregador.svg" width="50px">-->
                            Prestador de serviços
                        </label>
                    </div>
                </div>
                <div class="col col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="proType" id="emp" value="emp">
                        <label class="form-check-label" for="emp">
                            <!--                            <img src="../assets/img/prestador-de-servico.svg" width="50px">-->
                            Empregador
                        </label>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary px-3" id="ant" type="button">Anterior</button>
            <input class="btn btn-primary float-end px-3" type="submit" id="nex" value="Próximo">
            <?php
            //                $data = [
            //                  'nome' => filter_input(INPUT_POST, 'nome'),
            //                  'apelido' => filter_input(INPUT_POST, 'apelido'),
            //                  'dataNasc' => filter_input(INPUT_POST, 'dataNasc'),
            //                  'cpf' => filter_input(INPUT_POST, 'cpf'),
            //                  'numCel' => filter_input(INPUT_POST, 'numCel'),
            //                  'gen' => filter_input(INPUT_POST, 'gen'),
            //                  'cep' => filter_input(INPUT_POST, 'cep'),
            //                  'cid' => filter_input(INPUT_POST, 'cid'),
            //                  'uf' => filter_input(INPUT_POST, 'est'),
            //                  'logr' => filter_input(INPUT_POST, 'logr'),
            //                  'bai' => filter_input(INPUT_POST, 'bai'),
            //                  'numCas' => filter_input(INPUT_POST, 'numCas')
            //                ];
            $nome = filter_input(INPUT_POST, 'nome');
            $apelido = filter_input(INPUT_POST, 'apelido');
            $dataNasc = filter_input(INPUT_POST, 'dataNasc');
            $cpf = filter_input(INPUT_POST, 'cpf');
            $numCel = filter_input(INPUT_POST, 'numCel');
            $gen = filter_input(INPUT_POST, 'gen');
            $cep = filter_input(INPUT_POST, 'cep');
            $cid = filter_input(INPUT_POST, 'cid');
            $uf = filter_input(INPUT_POST, 'est');
            $logr = filter_input(INPUT_POST, 'logr');
            $bai = filter_input(INPUT_POST, 'bai');
            $numCas = filter_input(INPUT_POST, 'numCas');
            $userType = filter_input(INPUT_POST, 'proType');


            //                if($data !== null){
            //                    $agdM->part2($data['nome'], $data['apelido'], $data['$$dataNasc'], $data['$cpf'], $data['$numCel'], $data['$gen'], $data['$cep'], $data['$cid'], $data['$uf'], $data['$logr'], $data['$bai'], $data['$numCas']);
            //                }

            if ($nome !== null || $apelido !== null || $cpf !== null || $numCel || $gen !== null || $cep !== null || $cid !== null || $uf !== null || $logr !== null || $bai !== null || $numCas !== null || $userType !== null) {
                $agdM->part2($nome, $apelido, $dataNasc, $cpf, $numCel, $gen, $cep, $cid, $uf, $logr, $bai, $numCas, $userType);
            }
            ?>
        </form>
        <script>
            document.getElementById('ant').addEventListener("click", function red() {
                window.location.href = "signup.php";
            }, false);
            document.getElementById('nex').addEventListener("click", function red() {
                window.location.href = "choose.php";
            }, false);
        </script>
    </div>
</div>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>