<?php
    include '../../_app/conexao.php';

    session_start();

    if(!$_SESSION['Som']):
        header("Location: ../../index.php");
        die;
    endif;
    
    $eve_id = filter_input(INPUT_POST, 'eve_id', FILTER_DEFAULT);
    $eve_descricao = filter_input(INPUT_POST, 'eve_descricao', FILTER_DEFAULT);
    $eve_contratante = filter_input(INPUT_POST, 'eve_contratante', FILTER_DEFAULT);
    $eve_data = filter_input(INPUT_POST, 'eve_data', FILTER_DEFAULT);
    $eve_hora_ini = filter_input(INPUT_POST, 'eve_hora_ini', FILTER_DEFAULT);
    $eve_hora_fim = filter_input(INPUT_POST, 'eve_hora_fim', FILTER_DEFAULT);
    $eve_publico = filter_input(INPUT_POST, 'eve_publico', FILTER_DEFAULT);
    $eve_valor = filter_input(INPUT_POST, 'eve_valor', FILTER_DEFAULT);
    $eve_endereco = filter_input(INPUT_POST, 'eve_endereco', FILTER_DEFAULT);
    
    
$sth = $pdo->prepare("UPDATE eventos SET eve_descricao = :eve_descricao, eve_contratante = :eve_contratante, eve_data = :eve_data, eve_hora_ini = :eve_hora_ini,
eve_hora_fim = :eve_hora_fim, eve_publico = :eve_publico, eve_valor = :eve_valor, eve_endereco = :eve_endereco WHERE eve_id = :eve_id");
$sth->bindValue(":eve_id", ($eve_id));
$sth->bindValue(":eve_descricao",($eve_descricao));
$sth->bindValue(":eve_contratante", ($eve_contratante));
$sth->bindValue(":eve_data", ($eve_data));
$sth->bindValue(":eve_hora_ini", ($eve_hora_ini));
$sth->bindValue(":eve_hora_fim", ($eve_hora_fim));
$sth->bindValue(":eve_publico", ($eve_publico));
$sth->bindValue(":eve_valor", ($eve_valor));
$sth->bindValue(":eve_endereco", ($eve_endereco));
$sth->execute();
//echo $pdo->lastInsertId();
header ("LOCATION: eventos.php");


?>