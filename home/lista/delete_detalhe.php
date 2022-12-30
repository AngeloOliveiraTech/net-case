<?php

session_start();

if(!$_SESSION['Som']):
    header("Location: ../../login/login.php");
    die;
endif;

include '../../_app/conexao.php';

$id = filter_input(INPUT_GET, 'det_id', FILTER_DEFAULT);

$lis_id_central = filter_input(INPUT_GET, 'lis_id', FILTER_DEFAULT);


$sth = $pdo->prepare("DELETE from detalhe_lista where det_id = :id");
$sth->bindValue(":id", $id, PDO::PARAM_INT);
$sth->execute();

header("LOCATION: adicionar.php?lis_id=$lis_id_central");
