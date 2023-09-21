<?php
//ini_set('display_errors', 0 );
//error_reporting(0);

session_start();
require '../_app/conexao.php';
$email = filter_input(INPUT_POST, 'usu_email', FILTER_DEFAULT);
$senha = filter_input(INPUT_POST, 'usu_senha', FILTER_DEFAULT);
$novasenha = MD5($senha);

    $sth = $pdo->prepare('SELECT *FROM usuario where usu_email = :usu_email and usu_senha = :usu_senha');
    $sth->bindValue(':usu_email', $email);
    $sth->bindValue(':usu_senha', $novasenha);
    $sth->execute();
    if ($sth->rowCount() > 0){
        $_SESSION['Som']['usu_email'] = $email;
        $_SESSION['Som']['usu_senha'] = $senha;
        header('LOCATION: ../home/home.php'); 
    } else {   
        echo '<script> alert ("E-mail ou Senhas Incorretos!"); location.href=("login.php")</script>';
    };
  
