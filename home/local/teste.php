<?php
session_start();

if(!$_SESSION['Som']):
    header("Location: ../../login/login.php");
    die;
endif;

include '../../_app/conexao.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../../_app/css/materialize.min.css"  media="screen,projection"/>
</head>
<body>  
                    <?php

$conta = $_SESSION['Som']['usu_email'];
$sth = $pdo->prepare("SELECT * FROM armazenamento a
INNER JOIN usuario u ON u.usu_id = a.arm_usu_id
WHERE u.usu_email LIKE :usu_email");
$sth->bindValue(":usu_email", ($conta));
$sth->execute();
$numero = $sth->rowCount();
                    if ($numero == 0)
                    {

                      echo 'testetetsts';
                    ?>
                      
                      <!--<a class="waves-effect waves-purple btn red darken-3 modal-trigger" href="#teste"><i class="material-icons left">library_add</i>Adicionar Local</a>-->
                      <div id="teste" class="modal">
                        <div class="modal-content purple darken-3">
                            <span class="white-text"><h3 class="light">Bem-Vindos ao NET Case</h3></span>
                        </div>
                        <div class="modal-footer grey lighten-4">
                                <div class="container center-align">
                                    <button class="waves-effect waves-green btn-flat" type="submit" name="action"><span class="light">Adicionar</span>
                                        <i class="material-icons right">add_circle</i>
                                    </button>
                                </div>
                        </div>

                        
                    <?php
                    }
                    ?>
</body>
    <script type="text/javascript" src="../../_app/js/jquery-3.3.1.min.js" ></script>
    <script type="text/javascript" src="../../_app/js/materialize.min.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function(){
        $('.modal').modal();
        $('#teste').modal('open');
        });
    </script>
</html>