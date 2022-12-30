<?php
session_start();

if(!$_SESSION['Som']):
    header("Location: ../../login/login.php");
    die;
endif;

include '../../_app/conexao.php';

$id = filter_input(INPUT_GET, 'eve_id', FILTER_DEFAULT);

    $sth = $pdo->prepare("select * from eventos where eve_id = :eve_id");
    $sth->bindValue(":eve_id", $id, PDO::PARAM_INT);
    $sth->execute();
    $resultado = $sth->fetch(PDO::FETCH_ASSOC);
    extract($resultado); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NET Case | Editar Eventos</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../../_app/css/materialize.min.css"  media="screen,projection"/>
</head>
    <body class="grey lighten-2">
        <style>
                .colorwhite { color:#fff !important }
                
                .colorblack { color:#000000 !important }

                /* label color */
                .input-field label {
                color: #ffffff;
                }

                .arredondado {
                    border-radius: 25px;
                }

                .borda_roxa {
                    border: solid 2px;
                }
                .datepicker{
                    color: #ffffff;
                }

                .timepicker{
                    color: #ffffff;
                }
        </style>
        <div class="section black">
            <div class="row">
            <?php
                echo '<span class="white-text darken-1"><h2 class="center">Editar '.$eve_descricao.'</h2></span>';
            ?>
            </div>
        </div>
            <div class="container">
                <div class="arredondado card-panel purple darken-3">
                    <div class="container">
                        <form name="updte_eve" method="post" action="update.php">
                        <input type="hidden" name="eve_id" value="<?= $eve_id; ?>" />
                        <div class="row">
                                        <div class="input-field col s12">
                                            <input id="eve_descricao" name="eve_descricao" type="text" value="<?= $eve_descricao?>" class="validate colorwhite">
                                            <label for="eve_descricao">Descrição</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s10 m9">
                                            <input id="equ_contratante" name="eve_contratante" type="text" value="<?= $eve_contratante?>" class="validate colorwhite">
                                            <label for="equ_contratante">Contratante</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s4 m4">
                                            <input id="eve_data" name="eve_data" type="text" value="<?= $eve_data?>" class="datepicker">
                                            <label for="eve_data">Data</label>
                                        </div>

                                        <div class="input-field col s4 m4">
                                            <input id="eve_hora_ini" name="eve_hora_ini" type="time" value="<?= $eve_hora_ini?>" class="timepicker">
                                            <label for="eve_hora_ini">Início</label>
                                        </div>

                                        <div class="input-field col s4 m4">
                                            <input id="eve_hora_fim" name="eve_hora_fim" type="time" value="<?= $eve_hora_fim?>" class="timepicker">
                                            <label for="eve_hora_fim">Término</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s6 m6">
                                            <input id="eve_publico" name="eve_publico" type="text" value="<?= $eve_publico?>" class="validate colorwhite">
                                            <label for="eve_publico">Público Estimado</label>
                                        </div>

                                        <div class="input-field col s6 m6">
                                            <input id="eve_valor" name="eve_valor" type="text" value="<?= $eve_valor?>" class="validate colorwhite">
                                            <label for="eve_valor">Valor (R$):</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="eve_endereco" name="eve_endereco" type="text" value="<?= $eve_endereco?>" class="validate colorwhite">
                                            <label for="eve_endereco">Endereço</label>
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

    

        // Or with jQuery

        $(document).ready(function(){
            $('.datepicker').datepicker( {"format":'dd/mm/yyyy'} ).datepicker("setDate", new Date());
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