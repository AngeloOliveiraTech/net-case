<?php

session_start();

if(!$_SESSION['Som']):
    header("Location: ../../login/login.php");
    die;
endif;

include '../../_app/conexao.php';

$lis_id_central = filter_input(INPUT_POST, 'lis_id', FILTER_DEFAULT); 

$sth = $pdo->prepare('DELETE FROM detalhe_lista WHERE det_lis_id LIKE :lis_id');
$sth->bindValue(":lis_id", $lis_id_central);
$sth->execute();
echo $sth->rowCount();

echo '<script> alert ("Todos os Equipamentos Reservados foram Apagados com Sucesso!"); location.href=("adicionar.php?lis_id='.$lis_id_central.'")</script>';

?>