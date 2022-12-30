<?php
    include '../../_app/conexao.php';

    session_start();

    if(!$_SESSION['Som']):
        header("Location: ../../index.php");
        die;
    endif;
    
    $post= filter_input_array(INPUT_POST, FILTER_DEFAULT);

    $Dados = array (
        'lis_descricao' => $post['lis_descricao'],
        'lis_usu_id' => $post['lis_usu_id'],
        'lis_eve_id' => $post['lis_eve_id'],
        'lis_data' => $post['lis_data'],
        'lis_hora' => $post['lis_hora'],
        'lis_status' => $post['lis_status']
    );

$Fields = implode(', ', array_keys($Dados));
$Places = ':' . implode(', :', array_keys($Dados));
$Tabela = 'lista';
$Create = "INSERT INTO {$Tabela} ({$Fields}) VALUES ({$Places})";

$sth = $pdo->prepare($Create);
$sth->execute($Dados);
header ("LOCATION: lista.php");

?>