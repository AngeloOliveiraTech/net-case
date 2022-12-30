<?php
    include '../../_app/conexao.php';

    session_start();

    if(!$_SESSION['Som']):
        header("Location: ../../index.php");
        die;
    endif;
    
    $post= filter_input_array(INPUT_POST, FILTER_DEFAULT);

    $email = $_SESSION['Som']['usu_email'];
    $sth = $pdo->prepare('SELECT usu_id FROM usuario WHERE usu_email LIKE :usu_email');
    $sth->bindValue('usu_email', $email);
    $sth->execute();
    $resultado = $sth->fetch(PDO::FETCH_ASSOC);
    extract($resultado);

    $Dados = array (
        'eve_descricao' => $post['eve_descricao'],
        'eve_contratante' => $post['eve_contratante'],
        'eve_valor' => $post['eve_valor'],
        'eve_data' => $post['eve_data'],
        'eve_hora_ini' => $post['eve_hora_ini'],
        'eve_hora_fim' => $post['eve_hora_fim'], 
        'eve_endereco' => $post['eve_endereco'],
        'eve_publico' => $post['eve_publico'],
        'eve_sta_id' => 1,
        'eve_usu_id' => $usu_id,
    );

$Fields = implode(', ', array_keys($Dados));
$Places = ':' . implode(', :', array_keys($Dados));
$Tabela = 'eventos';
$Create = "INSERT INTO {$Tabela} ({$Fields}) VALUES ({$Places})";

$sth = $pdo->prepare($Create);
$sth->execute($Dados);
//echo $pdo->lastInsertId();
header ("LOCATION: eventos.php");

?>