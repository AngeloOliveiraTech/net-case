<?php

include '../_app/conexao.php';
    
    $post= filter_input_array(INPUT_POST, FILTER_DEFAULT);

    $Dados = array (
        'usu_nome' => $post['usu_nome'],
        'usu_email' => strtolower ($post['usu_email']),
        'usu_senha' => MD5(($post['usu_senha'])),
        'usu_cidade' => $post['usu_cidade'],
        'usu_uf_id' => $post['usu_uf_id'],
    );

    // Pegando tudo
$sth = $pdo->prepare("SELECT usu_email FROM usuario WHERE usu_email LIKE usu_email");
$sth->bindValue('usu_email', $post['usu_email']);
$sth->execute();
$contaexistente = $sth->rowCount();

if ($contaexistente >= 1) {
    echo '<script> alert ("A Conta ,'.$post['usu_email'].', já existe no Sistema, tente inserir outra Conta Novamente!"); location.href=("cadastrar.php")</script>';
} else {

    $Fields = implode(', ', array_keys($Dados));
    $Places = ':' . implode(', :', array_keys($Dados));
    $Tabela = 'usuario';
    $Create = "INSERT INTO {$Tabela} ({$Fields}) VALUES ({$Places})";

    $sth = $pdo->prepare($Create);
    $sth->execute($Dados);

    echo '<script> alert ("A Conta '.$post['usu_email'].' foi Cadastrada com Sucesso na Base de Dados, faça seu Login na próxima página!"); location.href=("login.php")</script>';
};



