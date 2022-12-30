<?php

session_start();

if(!$_SESSION['Som']):
    header("Location: ../../login/login.php");
    die;
endif;

include '../../_app/conexao.php';

$id = filter_input(INPUT_GET, 'lis_id', FILTER_DEFAULT);
$sth = $pdo->prepare("DELETE from lista where lis_id = :id");
$sth->bindValue(":id", $id, PDO::PARAM_INT);
$sth->execute();

echo '<script> alert ("O Registro foi Apagado com Sucesso!"); location.href=("lista.php")</script>';
