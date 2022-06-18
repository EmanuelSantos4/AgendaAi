<?php

namespace model;

use Conexao;
use PDOException;

class AgendamentosModel
{

//    /**
//     * AgendamentosModel constructor.
//     * @param string $email
//     */
//    public function __construct($email){
//         $this->email = $email;
//    }

    /**
     * @param boolean $exists
     */
    public function verLog($exists)
    {
        session_start();
        if (!$exists) {
            header("Location: ../../Agendamentos/view/index.php");
            exit();
        }
    }

    /**
     * @return string
     */
    public static function getUsername($email)
    {
        (new Conexao('tb_login'))->select('JOIN tb_login_user = ' . $email)->fetch();
        return;
    }

    /**
     * @param string $email
     * @param string $pass
     * @param string $passR
     */
    public function setCred($email, $pass, $passR)
    {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }

//        if(empty(filter_input(INPUT_POST, 'email')) || empty(filter_input(INPUT_POST, 'password')) || empty(filter_input(INPUT_POST, 'password-repeat'))){
//            header('Location: ../view/signup.php?err=1');
//            exit();
//        } else {
//            if(filter_input(INPUT_POST, 'password') == filter_input(INPUT_POST, 'password-repeat')){
//                $_SESSION['eAdress'] = filter_input(INPUT_POST, 'email');
//                $_SESSION['password'] = filter_input(INPUT_POST, 'password');
//                $_SESSION['passwordR'] = filter_input(INPUT_POST, 'password-repeat');
//                header('Location: ../view/regPerInf.php');
//            } else {
//                header('Location: ../view/signup.php?err=2');
//            }
//        }
        if (empty($email) || empty($pass) || empty($passR)) {
            header('Location: ../view/signup.php?err=1');
            exit();
        } else {
            if ($pass == $passR) {
                $_SESSION = [
                    'eAdress' => $email,
                    'password' => $pass,
                    'passwordR' => $passR];
//                return [
//                    'eAdress' => $email,
//                    'password' => $pass,
//                    'passwordR' => $passR];
                header('Location: ../view/regPerInf.php');
            } else {
                header('Location: ../view/signup.php?err=2');
            }
        }
    }

    /**
     * @param string $nome
     * @param string $apelido
     * @param string $dataNasc
     * @param string $cpf
     * @param string $numCel
     * @param string $gen
     * @param string $cep
     * @param string $cid
     * @param string $uf
     * @param string $logr
     * @param string $bai
     * @param string $numCas
     * @param string $userType
     */
    public function part2($nome, $apelido, $dataNasc, $cpf, $numCel, $gen, $cep, $cid, $uf, $logr, $bai, $numCas, $userType)
    {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }

        if (empty($nome) || empty($apelido) || empty($cpf) || empty($numCel) || empty($gen) || empty($cep) || empty($cid) || empty($uf) || empty($logr) || empty($bai) || empty($numCas) || empty($userType)) {
            header('Location: ../view/regPerInf.php?err=1');
            die();
        } else {
            try {
                if ($userType == "pds") {
                    $con = new Conexao('tb_pds');

                    $con->connect();

                    //inserts credentials into db
                    $email = (new Conexao('tb_login'))->select("tb_login_email = '" . $_SESSION['eAdress'] . "'", 'tb_login_email as email', null, null);
//                    $email = $email->fetch();
//                    $email = $email['email'];
                    if ($email->rowCount() == 0) {
                        (new Conexao('tb_login'))->insert([null, $_SESSION['eAdress'], password_hash($_SESSION['password'], PASSWORD_DEFAULT), $userType, null, null, null, null]);
                    } else {
                        header('Location: ../view/signup.php?err=3');
                        exit();
                    }

                    //inserts core info into db
                    $con->insert([null, $cpf, $nome, $apelido, null, $gen, $dataNasc, null]);

                    //inserts adress info into db
                    (new Conexao('tb_pds_endereco'))->insert([null, $logr, $numCas, $bai, $cid, $cep, $uf, null]);

                    //inserts contact info into db
                    (new Conexao('tb_pds_telefone'))->insert([null, $numCel, null]);

                    header('Location: ../view/choose.php');
                } else {
                    $con = new Conexao('tb_empregador');

                    $con->connect();

                    (new Conexao('tb_login'))->insert([null, $_SESSION['eAdress'], $_SESSION['password'], $userType, null, null, null, null]);

                    $con->insert([$nome, $apelido, $dataNasc, $cpf, $numCel, $gen, $cep, $cid, $uf, $logr, $bai, $numCas]);

                    header('Location: ../view/login.php');
                }
                //$data = [$nome, $apelido, $dataNasc, $cpf, $numCel, $gen, $cep, $cid, $uf, $logr, $bai, $numCas];
            } catch (PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }
            die();
        }
    }

    /**
     * @param array $ser
     * @param boolean $disp
     */
    public function setSerPtd($ser, $disp)
    {
        //1 == true, 0 == false
//        $string = implode(', ', array_slice($ser, 0, -1));
//        $string .= ' e '.$ser[count($ser)-1];

        try {
            $con = new Conexao();
            $con->connect();
            $sql = "";
            if ($disp == 1) {
                $sql = "UPDATE `tb_pds` JOIN `tb_login` ON `tb_pds`.`tb_pds_id` = `tb_login`.`tb_pds_id` SET `tb_pds_disponibilidade` = 1 WHERE `tb_login`.`tb_login_email` = '" . $_SESSION['eAdress'] . "';";
                for ($i = 0; $i < count($ser); $i++) {
                    $sql .= "INSERT INTO tb_servico VALUES(null, '" . $ser[$i] . "', null, null, null, null);";
                }
            } else {
                $sql = "UPDATE `tb_pds` JOIN `tb_login` ON `tb_pds`.`tb_pds_id` = `tb_login`.`tb_pds_id` SET `tb_pds_disponibilidade` = 0 WHERE `tb_login`.`tb_login_email` = '" . $_SESSION['eAdress'] . "';";
            }
            $con->excQuery($sql);
            header("Location: ../view/login.php");
        } catch (PDOException $e) {
            echo 'Error ' . $e->getMessage();
        }
    }

    /**
     * @param string $email
     * @param string $pwd
     * @return boolean
     */
    public function login($email, $pwd, $stayLogged)
    {
        if (!empty($email) || !empty($pwd)) {
            $result = (new Conexao('tb_login'))->excQuery("SELECT tb_login_email as email, tb_login_password as password FROM tb_login WHERE tb_login_email = '" . $email . "';");
            $obj = $result->fetch();
            if ($result->rowCount() == 1) {
                if (password_verify($pwd, $obj['password'])) {
                    if ($stayLogged == 'on') {
                        if (session_status() != PHP_SESSION_ACTIVE) {
                            session_start();
                        }
                        if (!filter_input(INPUT_COOKIE, 'email') && !filter_input(INPUT_COOKIE, 'password')) {
                            setcookie('email', $email, time() + 60 * 60 * 24);
                            setcookie('password', $pwd, time() + 60 * 60 * 24);
                        }
                        $_SESSION['email'] = $obj['email'];

                        header('Location: ../view/catalog-page.php');
                    } else {
                        if (session_status() != PHP_SESSION_ACTIVE) {
                            session_start();
                        }
                        $_SESSION['email'] = $obj['email'];

                        header('Location: ../view/catalog-page.php');
                    }
                } else {
                    header('Location: ../view/login.php?err=3');
                }
            } else {
                header('Location: ../view/login.php?err=2');
            }
        } else {
            header('Location: ../view/login.php?err=1');
        }
    }
}