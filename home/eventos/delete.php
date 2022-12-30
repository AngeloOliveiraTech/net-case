<?php
include '../../_app/conexao.php';

session_start();

if(!$_SESSION['Som']):
    header("Location: ../../login/login.php");
    die;
endif;


$id = filter_input(INPUT_GET, 'eve_id', FILTER_DEFAULT);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NET Case | Apagar Registro</title>
    <link type="text/css" rel="stylesheet" href="../../_app/css/materialize.min.css"  media="screen,projection"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="center-align container grey lighten-2">
                    <div class="center-align container card-panel">
                                <h4>Deseja excluir este registro ?</h4>
                                <div class="divider"></div>
                                <br>
                        <form name="del_eve" method="post" action="delete2.php">
                                <a class="btn waves-effect waves-black btn deep-orange darken-1" href="eventos.php">VOLTAR 
                                <i class="material-icons left">arrow_back</i>
                                </a>

                                <input type="hidden" name="eve_id" value="<?= $id; ?>" />
                                <button class="btn waves-effect waves-purple btn black" type="submit" name="action">Apagar Registro
                                <i class="material-icons right">send</i>
                                </button>
                        </form>
                    </div>
    
</body>
</html>


