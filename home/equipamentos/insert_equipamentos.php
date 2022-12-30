<?php
    include '../../_app/conexao.php';

    session_start();

    if(!$_SESSION['Som']):
        header("Location: ../../index.php");
        die;
    endif;
    
    $post= filter_input_array(INPUT_POST, FILTER_DEFAULT);

$ext = strtolower(substr($_FILES['fileUpload']['name'], -4));
$name = strtolower(substr($_FILES['fileUpload']['name'], 0, -4));
$new_name = $name . '' . date("YmdHis") . $ext;
$dir = 'equipamentos/';

    $email = $_SESSION['Som']['usu_email'];
    $sth = $pdo->prepare('SELECT usu_id FROM usuario WHERE usu_email LIKE :usu_email');
    $sth->bindValue('usu_email', $email);
    $sth->execute();
    $resultado = $sth->fetch(PDO::FETCH_ASSOC);
    extract($resultado);
    
move_uploaded_file($_FILES['fileUpload']['tmp_name'], $dir . $new_name);
$Dados = array (
    'equ_nome' => $post['equ_nome'],
    /*'equ_descricao' => $post['equ_descricao'],*/
    'equ_obs' => $post['equ_obs'],
    'equ_quantidade' => $post['equ_quantidade'],
    'equ_arm_id' => $post['equ_arm_id'],
    'equ_cat_id' => $post['equ_cat_id'],
    'equ_usu_id' => $usu_id, // O Campo que eu quero puxar o ID do Email que vem da SESSION.
    'equ_img' => $new_name
);

$Fields = implode(', ', array_keys($Dados));
$Places = ':' . implode(', :', array_keys($Dados));
$Tabela = 'equipamentos';
$Create = "INSERT INTO {$Tabela} ({$Fields}) VALUES ({$Places})";

$sth = $pdo->prepare($Create);
$sth->execute($Dados);
//echo $pdo->lastInsertId();
header ("LOCATION: equipamentos.php");

?>