<?php
    include '../../_app/conexao.php';

    session_start();

    if(!$_SESSION['Som']):
        header("Location: ../../index.php");
        die;
    endif;
    
    $arm_id = filter_input(INPUT_POST, 'arm_id', FILTER_DEFAULT);
    $arm_descricao = filter_input(INPUT_POST, 'arm_descricao', FILTER_DEFAULT);
    $arm_endereco = filter_input(INPUT_POST, 'arm_endereco', FILTER_DEFAULT);
    $arm_numero = filter_input(INPUT_POST, 'arm_numero', FILTER_DEFAULT);
    $arm_cidade = filter_input(INPUT_POST, 'arm_cidade', FILTER_DEFAULT);
    //$arm_uf_id = filter_input(INPUT_POST, 'arm_uf_id', FILTER_DEFAULT);
  /*$equ_arm_id
    $equ_img*/
    
$sth = $pdo->prepare("UPDATE armazenamento SET arm_descricao = :arm_descricao, arm_endereco = :arm_endereco, arm_numero = :arm_numero, 
arm_cidade = :arm_cidade WHERE arm_id = :arm_id");
$sth->bindValue(":arm_id", ($arm_id));
$sth->bindValue(":arm_descricao",($arm_descricao));
$sth->bindValue(":arm_endereco", ($arm_endereco));
$sth->bindValue(":arm_numero", ($arm_numero));
$sth->bindValue(":arm_cidade", ($arm_cidade));
$sth->execute();
//echo $pdo->lastInsertId();
header ("LOCATION: local.php");


?>