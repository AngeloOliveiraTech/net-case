<?php

include '../_app/conexao.php';

session_start();

unset($_SESSION['Som']);

header("Location: ../login/login.php");
?>