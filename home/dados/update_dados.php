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
$sth->bindValue(":usu_email", $email);
$sth->execute();
$resultado = $sth->fetch(PDO::FETCH_ASSOC);
extract($resultado);

$new_name1 = date("Ymd").'_'. $email;
$dir = 'img_usuario/';
move_uploaded_file($_FILES['usu_img']['tmp_name'], $dir . $new_name1);

$new_name2 = date("Ymd").'_'. $email . '_'. $post['usu_organizacao'];
$dir = 'img_organizacao/';
move_uploaded_file($_FILES['usu_img_organizacao']['tmp_name'], $dir . $new_name2);

$sth = $pdo->prepare('UPDATE usuario SET usu_nome = :usu_nome, usu_email = :usu_email, usu_senha = :usu_senha ,usu_cidade = :usu_cidade, usu_telefone = :usu_telefone
,usu_uf_id = :usu_uf_id, usu_img = :usu_img,usu_organizacao = :usu_organizacao, usu_img_organizacao = :usu_img_organizacao WHERE usu_id LIKE :usu_id');
$sth->bindValue(":usu_id", ($usu_id));
$sth->bindValue(":usu_nome", ($post['usu_nome']));
$sth->bindValue(":usu_email", strtolower ($post['usu_email']));
$sth->bindValue(":usu_senha", MD5($post['usu_senha']));
$sth->bindValue(":usu_cidade", ($post['usu_cidade']));
$sth->bindValue(":usu_telefone", ($post['usu_telefone']));
$sth->bindValue(":usu_uf_id", ($post['usu_uf_id']));
$sth->bindValue(":usu_img", $new_name1);
$sth->bindValue(":usu_organizacao", ($post['usu_organizacao']));
$sth->bindValue(":usu_img_organizacao", $new_name2);
$sth->execute();

header ("LOCATION: dados.php");




