<?php
include '../../_app/conexao.php';
session_start();

if(!$_SESSION['Som']):
    header("Location: ../../login/login.php");
    die;
endif;


$id = filter_input(INPUT_POST, 'equ_id', FILTER_DEFAULT);
$sth = $pdo->prepare("DELETE from equipamentos where equ_id = :id");
$sth->bindValue(":id", $id, PDO::PARAM_INT);
$sth->execute();

echo '<script> alert ("O Registro foi Apagado com Sucesso!"); location.href=("equipamentos.php")</script>';
