<?php
session_start();

if(!$_SESSION['Som']):
    header("Location: ../../login/login.php");
    die;
endif;

include '../../_app/conexao.php';

$id = filter_input(INPUT_GET, 'arm_id', FILTER_DEFAULT);

    $sth = $pdo->prepare("select * from armazenamento where arm_id = :arm_id");
    $sth->bindValue(":arm_id", $id, PDO::PARAM_INT);
    $sth->execute();
    $resultado = $sth->fetch(PDO::FETCH_ASSOC);
    extract($resultado); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NET Case | Editar Locais de Armazenamento</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../../_app/css/materialize.min.css"  media="screen,projection"/>
</head>
<style>
                .colorwhite { color:#fff !important }
                
                .colorblack { color:#000000 !important }

                /* label color */
                .input-field label {
                color: #ffffff;
                }
                
                .iconepreto {
                   color:#fff !important 
                }

                .arredondado {
                    border-radius: 25px;
                }
            </style>
    <body class="grey lighten-2">
        <div class="section black">
            <div class="row">
            <?php
                echo '<span class="white-text darken-1"><h2 class="center">Editar '.$arm_descricao.'</h2></span>';
            ?>
            </div>
        </div>
            <div class="container">
                <div class="arredondado card-panel purple darken-3">
                    <div class="container">
                        <form name="updte_arm" method="post" action="update.php" enctype="multipart/form-data">
                        <input type="hidden" name="arm_id" value="<?= $id; ?>" />
                        <div class="row">
                                        <div class="input-field col s12">
                                            <input id="arm_descricao" name="arm_descricao" type="text" required="arm_descricao" value="<?= $arm_descricao?>" class="validate colorwhite">
                                            <label for="arm_descricao">Descrição</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s10 m9">
                                            <input id="arm_endereco" name="arm_endereco" type="text" required="arm_endereco" value="<?= $arm_endereco?>" class="validate colorwhite">
                                            <label for="arm_endereco">Endereço</label>
                                        </div>

                                        <div class="input-field col s12 m3">
                                            <input id="arm_numero" name="arm_numero" required="arm_numero" type="text" value="<?= $arm_numero?>" class="validate colorwhite">
                                            <label for="arm_numero">Número</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12 m9">
                                            <input id="arm_cidade" name="arm_cidade" required="arm_cidade" type="text" value="<?= $arm_cidade?>" class="validate colorwhite">
                                            <label for="arm_cidade">Cidade</label>
                                        </div>
                                    </div>
                                    
                                    <div class="container center-align">
                                        <div class="hide-on-small-only">
                                            <button class="z-depth-2 waves-effect waves-orange btn deep-orange darken-1" href="eventos.php" style="width: 40%;"><span class="white-text light">VOLTAR</span>
                                                <i class="material-icons left">arrow_back</i>
                                            </button>

                                            <button class="z-depth-2 waves-effect waves-orange btn deep-orange darken-1" type="submit" name="action" style="width: 40%;"><span class="white-text light">Atualizar</span>
                                                <i class="material-icons right">update</i>
                                             </button>
                                        </div>

                                        <div class="hide-on-med-and-up">
                                            <div class="row">
                                            <button class="z-depth-2 waves-effect waves-orange btn deep-orange darken-1" href="eventos.php" style="width: 100%;"><span class="white-text light">VOLTAR</span>
                                                <i class="material-icons left">arrow_back</i>
                                            </button>
                                            </div>

                                            <div class="row">
                                            <button class="z-depth-2 waves-effect waves-orange btn deep-orange darken-1" type="submit" name="action" style="width: 100%;"><span class="white-text light">Atualizar</span>
                                                <i class="material-icons right">update</i>
                                            </button>
                                            </div>
                                        </div>

                                        <!--<input class="waves-effect waves-light btn white" type="submit" value="ATUALIZAR" />
                                        <a href="equipamentos.php" class="waves-effect waves-light btn white"><VOLTAR</a> -->
                                    </div>
                        </form>
                    </div>
                </div>
            </div>

        </body>
    <script type="text/javascript" src="../../_app/js/jquery-3.3.1.min.js" ></script>
    <script type="text/javascript" src="../../_app/js/materialize.min.js"></script>
    
    <script type="text/javascript">

        document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems, options);
        });

        document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems, options);
        });

        document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.datepicker');
        var instances = M.Datepicker.init(elems, options);
        });

        document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.timepicker');
        var instances = M.Timepicker.init(elems, options);
        });

        // Or with jQuery

        $(document).ready(function(){
        $('.timepicker').timepicker();
        });

        // Or with jQuery

        $(document).ready(function(){
        $('.datepicker').datepicker();
        });

        // Or with jQuery

        $(document).ready(function(){
        $('select').formSelect();
        });

        // Or with jQuery

        $(document).ready(function(){
        $('.modal').modal();
        });
    </script>
</html>