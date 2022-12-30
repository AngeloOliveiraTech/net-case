<?php
include '../../_app/conexao.php';
session_start();

if(!$_SESSION['Som']):
    header("Location: ../../login/login.php");
    die;
endif;


$id = filter_input(INPUT_GET, 'arm_id', FILTER_DEFAULT);
$sth = $pdo->prepare("DELETE from armazenamento where arm_id = :id");
$sth->bindValue(":id", $id, PDO::PARAM_INT);
$sth->execute();
header ("LOCATION: local.php");