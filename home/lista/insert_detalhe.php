<?php

session_start();

if(!$_SESSION['Som']):
    header("Location: ../../login/login.php");
    die;
endif;

include '../../_app/conexao.php';

$lis_id_central = filter_input(INPUT_GET, 'lis_id', FILTER_DEFAULT); 
$equ_id = filter_input(INPUT_GET, 'equ_id', FILTER_DEFAULT);  

$sth = $pdo->prepare('SELECT * FROM detalhe_lista WHERE det_lis_id LIKE :det_lis_id AND det_equ_id LIKE :det_equ_id');
$sth->bindValue(":det_lis_id",($lis_id_central));
$sth->bindValue(":det_equ_id",($equ_id));
$sth->execute();
$registroexistente = $sth->rowCount();

if ($registroexistente == 1) {
    echo '<script> alert ("Apenas 1 Registro por Equipamento"); location.href=("adicionar.php?lis_id='.$lis_id_central.'")</script>';

} else {
    $sth = $pdo->prepare('INSERT INTO detalhe_lista (det_lis_id, det_equ_id, det_status) VALUES (:det_lis_id, :det_equ_id, :det_status)');
    $sth->bindValue(":det_lis_id", ($lis_id_central));
    $sth->bindValue(":det_equ_id", ($equ_id));
    $sth->bindValue(":det_status", 'Reservado');
    $sth->execute();

    
    header ("LOCATION: adicionar.php?lis_id=$lis_id_central");
}
?>