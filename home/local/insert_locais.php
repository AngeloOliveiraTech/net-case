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
    'arm_descricao' => $post['arm_descricao'],
    'arm_endereco' => $post['arm_endereco'],
    'arm_cidade' => $post['arm_cidade'],
    'arm_numero' => $post['arm_numero'],
    'arm_uf_id' => $post['arm_uf_id'],
    'arm_usu_id' => $usu_id // O Campo que eu quero puxar o ID do Email que vem da SESSION.
);

$Fields = implode(', ', array_keys($Dados));
$Places = ':' . implode(', :', array_keys($Dados));
$Tabela = 'armazenamento';
$Create = "INSERT INTO {$Tabela} ({$Fields}) VALUES ({$Places})";

$sth = $pdo->prepare($Create);
$sth->execute($Dados);
//echo $pdo->lastInsertId();
header ("LOCATION: local.php");

?>