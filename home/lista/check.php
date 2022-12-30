<?php

session_start();

if(!$_SESSION['Som']):
    header("Location: ../../login/login.php");
    die;
endif;
include '../../_app/conexao.php';

$id = filter_input(INPUT_GET, 'det_id', FILTER_DEFAULT);

$lis_id_central = filter_input(INPUT_GET, 'lis_id', FILTER_DEFAULT);

$sth = $pdo->prepare('SELECT det_status FROM detalhe_lista WHERE det_id LIKE :det_id');
$sth->bindValue(":det_id", ($id));
$sth->execute();
$resultado = $sth->fetch(PDO::FETCH_ASSOC);
extract($resultado);

if ($det_status == 'Reservado') {

    $sth = $pdo->prepare("UPDATE detalhe_lista SET det_status = 'Conferido' WHERE det_id = :id");
    $sth->bindValue(":id", $id, PDO::PARAM_INT);
    $sth->execute();

    header("LOCATION: conferir_detalhe.php?lis_id=$lis_id_central");

} else {

    $sth = $pdo->prepare("UPDATE detalhe_lista SET det_status = 'Reservado' WHERE det_id = :id");
    $sth->bindValue(":id", $id, PDO::PARAM_INT);
    $sth->execute();

    header("LOCATION: conferir_detalhe.php?lis_id=$lis_id_central");

}
