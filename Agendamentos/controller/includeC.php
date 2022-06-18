<?php
if (file_exists("Conexao.php")) {
    include "Conexao.php";
} else {
    header("Location: ../view/index.php");
}