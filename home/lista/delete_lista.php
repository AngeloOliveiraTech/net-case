<?php

session_start();

if(!$_SESSION['Som']):
    header("Location: ../../login/login.php");
    die;
endif;

include '../../_app/conexao.php';

$id = filter_input(INPUT_POST, 'lis_id', FILTER_DEFAULT);

$sth = $pdo->prepare("DELETE from detalhe_lista where det_lis_id = :id");
$sth->bindValue(":id", $id, PDO::PARAM_INT);
$sth->execute();

echo '<script> alert ("Todos os Registro foram Apagados com Sucesso!"); location.href=("adicionar.php?lis_id='.$id.'")</script>';


?>

