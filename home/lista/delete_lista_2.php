<?php

session_start();

if(!$_SESSION['Som']):
    header("Location: ../../login/login.php");
    die;
endif;

include '../../_app/conexao.php';

$id = filter_input(INPUT_GET, 'lis_id', FILTER_DEFAULT);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NET Case | Apagar Registros</title>
    <link type="text/css" rel="stylesheet" href="../../_app/css/materialize.min.css"  media="screen,projection"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="grey lighten-2">
                <div class="container">
                    <div class="center-align container card-panel">
                                <h4>Deseja excluir todos os registro ?</h4>
                                <div class="divider"></div>
                                <br>
                        
                                <a class="btn waves-effect waves-black btn deep-orange darken-1" href="adicionar.php?lis_id=<?=$id?>">VOLTAR 
                                <i class="material-icons left">arrow_back</i>
                                </a>
                        <form name="del_lis" method="post" action="delete_all.php">
                                <input type="hidden" name="lis_id" value="<?= $id; ?>" />
                                <button class="btn waves-effect waves-purple btn black" type="submit" name="action">Apagar Todos Registros
                                <i class="material-icons right">send</i>
                                </button>
                        </form>
                    </div>
                </div>
    
</body>
</html>