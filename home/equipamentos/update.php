<?php
    include '../../_app/conexao.php';

    session_start();

    if(!$_SESSION['Som']):
        header("Location: ../../index.php");
        die;
    endif;
    
    $equ_id = filter_input(INPUT_POST, 'equ_id', FILTER_DEFAULT);
    $equ_nome = filter_input(INPUT_POST, 'equ_nome', FILTER_DEFAULT);
    $equ_obs = filter_input(INPUT_POST, 'equ_obs', FILTER_DEFAULT);
    $equ_quantidade = filter_input(INPUT_POST, 'equ_quantidade', FILTER_DEFAULT);
    $equ_cat_id = filter_input(INPUT_POST, 'equ_cat_id', FILTER_DEFAULT);
    $equ_arm_id = filter_input(INPUT_POST, 'equ_arm_id', FILTER_DEFAULT);
    //$equ_img = filter_input(INPUT_POST, 'equ_arm_id', FILTER_DEFAULT);


    
$sth = $pdo->prepare("UPDATE equipamentos SET equ_nome = :equ_nome, equ_obs = :equ_obs, equ_quantidade = :equ_quantidade, equ_cat_id = :equ_cat_id,
equ_arm_id = :equ_arm_id WHERE equ_id = :equ_id");
$sth->bindValue(":equ_id", ($equ_id));
$sth->bindValue(":equ_nome",($equ_nome));
$sth->bindValue(":equ_obs", ($equ_obs));
$sth->bindValue(":equ_quantidade", ($equ_quantidade));
$sth->bindValue(":equ_cat_id", ($equ_cat_id));
$sth->bindValue(":equ_arm_id", ($equ_arm_id));
//img$sth->bindValue(":equ_cat_id", ($equ_cat_id));
$sth->execute();
//echo $pdo->lastInsertId();
header ("LOCATION: equipamentos.php");


?>