<?php

session_start();

if(!$_SESSION['Som']):
    header("Location: ../../login/login.php");
    die;
endif;

include '../../_app/conexao.php';
$a;
$b;
$c = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NET Case | Seus Eventos</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../../_app/css/materialize.min.css"  media="screen,projection"/>
</head>
    <body>
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

                .borda_preta {
                    border: solid 2px;
                }
            </style>
        <div class="section black">
            <div class="row">
                <span class="white-text darken-1"><h2 class="center">Meus Eventos</h2></span>
            </div>
        </div>

        <div class="section grey lighten-2">
            <div class="container">

            
                <div class="grey lighten-2">
                    <div class="col s12">
                        <a href="../home.php" class="breadcrumb colorblack">Menu</a>
                        <a href="eventos.php" class="breadcrumb colorblack">Meus Eventos</a>
                    </div>
                </div>
            
                <div class="z-depth-3 card-panel center-align">
                    <!--Botão do Modal de Adicionar -->
                    <a class="waves-effect waves-purple btn grey darken-2 modal-trigger" href="#adicionar" ><i class="material-icons left">library_add</i>Adicionar Eventos</a>
                    
                    <!-- Modal Structure -->
                    <div id="adicionar" class="modal">
                        <form name="add_eve" method="post" action="insert_eventos.php">
                            <div class="modal-content teal darken-3">
                                <span class="white-text"><h3 class="light">Adicionar Eventos</h3></span>
                                <div class="container">
                                    <div class="divider"></div>
                                </div>
                                <br>

                                <div class="container">
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="eve_descricao" name="eve_descricao" required="eve_descricao" type="text" class="validate colorwhite">
                                            <label for="eve_descricao">Descrição</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s10 m9">
                                            <input id="equ_contratante" name="eve_contratante" required="eve_contratante" type="text" class="validate colorwhite">
                                            <label for="equ_contratante">Contratante</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s4 m4">
                                            <input id="eve_data" name="eve_data" type="text" required="eve_data" class="datepicker colorwhite">
                                            <label for="eve_data">Data</label>
                                        </div>

                                        <div class="input-field col s4 m4">
                                            <input id="eve_hora_ini" name="eve_hora_ini" required="eve_hora_ini" type="time" class="timepicker colorwhite">
                                            <label for="eve_hora_ini">Início</label>
                                        </div>

                                        <div class="input-field col s4 m4">
                                            <input id="eve_hora_fim" name="eve_hora_fim" required="eve_hora_fim" type="time" class="timepicker colorwhite">
                                            <label for="eve_hora_fim">Término</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s6 m6">
                                            <input id="eve_publico" name="eve_publico" type="number" required="eve_publico" class="validate colorwhite">
                                            <label for="eve_publico">Público Estimado</label>
                                        </div>

                                        <div class="input-field col s6 m6">
                                            <input id="eve_valor" name="eve_valor" type="number" required="eve_valor" class="validate colorwhite">
                                            <label for="eve_valor">Valor(R$)</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="eve_endereco" name="eve_endereco" required="eve_endereco" type="text" class="validate colorwhite">
                                            <label for="eve_endereco">Endereço</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer grey lighten-4">
                                <div class="container center-align">
                                    <button class="waves-effect waves-green btn-flat" type="submit" name="action"><span class="light">Adicionar</span>
                                        <i class="material-icons right">add_circle</i>
                                    </button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>

            <!--Card dos Eventos-->
            <!------------------------------------->
            
            <div class="row center">
                <div class="left-align">
                <?php
                $email = $_SESSION['Som']['usu_email'];
                $sth = $pdo->prepare("select * from eventos e 
                INNER JOIN usuario u on u.usu_id = e.eve_usu_id
                INNER JOIN evento_status s on s.sta_id = e.eve_sta_id
                WHERE u.usu_email = :usu_email AND s.sta_id = 1");
                $sth->bindValue(":usu_email", ($email));
                $sth->execute();

                echo '<h5 class="light">Eventos Programados ('. $sth->rowCount().')</h5>';
                ?>
                <div class="divider"></div>
                </div>

                <?php
                    foreach ($sth as $res) :
                    extract($res);
                    $a = $c + 1;
                    $b = $a + 1;
                    $c = $b + 1;
                ?>
                    <div class="arredondado card hoverable grey lighten-2 col s12 m4">
                        <div class="card-content">
                            <span class="card-title grey-text text-darken-4"><?= $eve_descricao?></span>
                            <div class="divider"></div>
                            <p><?= $eve_contratante?></p>   
                            <p>Data: <?=$eve_data?></p>
                        </div>
                        <div class="card-tabs">
                            <ul class="tabs tabs-fixed-width">
                                <li class="tab deep-orange darken-1 "><a class="active waves-effect waves-purple" href="#test<?=$a?>"><span class="white-text">Detalhes</span></a></li>
                                <li class="tab grey darken-2"><a class="waves-effect waves-orange" href="#test<?=$b?>"><span class="white-text">Horários</span></a></li>
                                <li class="tab purple darken-3"><a class="waves-effect waves-light" href="#test<?=$c?>"><i class="material-icons iconepreto">edit</i></a></li>
                            </ul>
                        </div>
                        <div class="arredondado borda_preta card-content grey lighten-4">
                            <div id="test<?=$a?>"><p class="light"><b>Valor: R$ <?=$eve_valor?></b></p></div>
                            <div id="test<?=$b?>">
                                <div class="left-align">
                                    <p class="light">Início: <?=$eve_hora_ini?></p>
                                    <br>
                                    <p class="light">Término: <?=$eve_hora_fim?></p>
                                </div>
                            </div>
                            <div id="test<?=$c?>">
                                <div class="left-align">
                                    <p class="light">Endereço: <?=$eve_endereco?></p>
                                    <br>
                                    <p class="light">Público Estimado: <?=$eve_publico?> Pessoas</p>
                                    <?php echo '<a href="update_eventos.php?eve_id='.$eve_id.'" class="waves-effect waves-orange btn deep-orange darken-1" style="width: 100%;"><i class="material-icons left">mode_edit</i><span class="light">EDITAR</span></a>'?>
                                    <?php echo  '<a href="delete.php?eve_id='.$eve_id.'" class="waves-effect waves-purple btn purple darken-3" style="width: 100%;"><i class="material-icons left">delete_forever</i><span class="light">APAGAR</span></a>' ?>
                                </div>
                            </div>
                        </div>
                    </div>
                
                <?php
                    endforeach;
                ?>
            </div>
            
            <!------------------------------------->

            <div class="row center">
                <div class="left-align">
                <?php
                $email = $_SESSION['Som']['usu_email'];
                $sth = $pdo->prepare("select * from eventos e 
                INNER JOIN usuario u on u.usu_id = e.eve_usu_id
                INNER JOIN evento_status s on s.sta_id = e.eve_sta_id
                WHERE u.usu_email = :usu_email AND s.sta_id = 2");
                $sth->bindValue(":usu_email", ($email));
                $sth->execute();

                //echo '<h5 class="light">Eventos Realizados('. $sth->rowCount().')</h5>';
                ?>
                <div class="divider"></div>
                </div>

                <?php
                    foreach ($sth as $res) :
                    extract($res);
                    $a = $c + 1;
                    $b = $a + 1;
                    $c = $b + 1;
                ?>
                    <div class="card hoverable grey lighten-2 col s12 m4">
                        <div class="card-content">
                            <span class="card-title grey-text text-darken-4"><?= $eve_descricao?></span>
                            <div class="divider"></div>
                            <p><?= $eve_contratante?></p>   
                            <p>Data: <?=$eve_data?></p>
                        </div>
                        <div class="card-tabs">
                            <ul class="tabs tabs-fixed-width">
                                <li class="tab deep-orange darken-1 "><a class="active waves-effect waves-purple" href="#test<?=$a?>"><span class="white-text">Valor</span></a></li>
                                <li class="tab grey darken-2"><a class="waves-effect waves-orange" href="#test<?=$b?>"><span class="white-text">Horas</span></a></li>
                                <li class="tab purple darken-3"><a class="waves-effect waves-light" href="#test<?=$c?>"><span class="white-text">+</span></a></li>
                            </ul>
                        </div>
                        <div class="arredondado borda_preta card-content grey lighten-4">
                            <div id="test<?=$a?>"><p class="light"><b>Valor: R$ <?=$eve_valor?></b></p></div>
                            <div id="test<?=$b?>">
                                <div class="left-align">
                                    <p class="light">Início: <?=$eve_hora_ini?></p>
                                    <br>
                                    <p class="light">Término: <?=$eve_hora_fim?></p>
                                </div>
                            </div>
                            <div id="test<?=$c?>">
                                <div class="left-align">
                                    <p class="light">Endereço: <?=$eve_endereco?></p>
                                    <br>
                                    <p class="light">Público Estimado: <?=$eve_publico?> Pessoas</p>
                                    <?php echo '<a href="update_eventos.php?eve_id='.$eve_id.'" class="waves-effect waves-orange btn deep-orange darken-1" style="width: 100%;"><i class="material-icons left">mode_edit</i><span class="light">EDITAR</span></a>'?>
                                    <?php echo  '<a href="delete.php?eve_id='.$eve_id.'" class="waves-effect waves-purple btn purple darken-3" style="width: 100%;"><i class="material-icons left">delete_forever</i><span class="light">APAGAR</span></a>' ?>
                                </div>
                            </div>
                        </div>
                    </div>
                
                <?php
                    endforeach;
                ?>
            </div>
            
            <!------------------------------------->
            

            <div class="row center">
                <div class="left-align">
                <?php
                $email = $_SESSION['Som']['usu_email'];
                $sth = $pdo->prepare("select * from eventos e 
                INNER JOIN usuario u on u.usu_id = e.eve_usu_id
                INNER JOIN evento_status s on s.sta_id = e.eve_sta_id
                WHERE u.usu_email = :usu_email AND s.sta_id = 3");
                $sth->bindValue(":usu_email", ($email));
                $sth->execute();

                //echo '<h5 class="light">Eventos Cancelados('. $sth->rowCount().')</h5>';
                ?>
                <div class="divider"></div>
                </div>

                <?php
                    foreach ($sth as $res) :
                    extract($res);
                    $a = $c + 1;
                    $b = $a + 1;
                    $c = $b + 1;
                ?>
                    <div class="card hoverable grey lighten-2 col s12 m4">
                        <div class="card-content">
                            <span class="card-title grey-text text-darken-4"><?= $eve_descricao?></span>
                            <div class="divider"></div>
                            <p><?= $eve_contratante?></p>   
                            <p>Data: <?=$eve_data?></p>
                        </div>
                        <div class="card-tabs">
                            <ul class="tabs tabs-fixed-width">
                                <li class="tab deep-orange darken-1 "><a class="active waves-effect waves-purple" href="#test<?=$a?>"><span class="white-text">Valor</span></a></li>
                                <li class="tab grey darken-2"><a class="waves-effect waves-orange" href="#test<?=$b?>"><span class="white-text">Horas</span></a></li>
                                <li class="tab purple darken-3"><a class="waves-effect waves-light" href="#test<?=$c?>"><span class="white-text">+</span></a></li>
                            </ul>
                        </div>
                        <div class="arredondado borda_preta card-content grey lighten-4">
                            <div id="test<?=$a?>"><p class="light"><b>Valor: R$ <?=$eve_valor?></b></p></div>
                            <div id="test<?=$b?>">
                                <div class="left-align">
                                    <p class="light">Início: <?=$eve_hora_ini?></p>
                                    <br>
                                    <p class="light">Término: <?=$eve_hora_fim?></p>
                                </div>
                            </div>
                            <div id="test<?=$c?>">
                                <div class="left-align">
                                    <p class="light">Endereço: <?=$eve_endereco?></p>
                                    <br>
                                    <p class="light">Público Estimado: <?=$eve_publico?> Pessoas</p>
                                    <?php echo '<a href="update_eventos.php?eve_id='.$eve_id.'" class="waves-effect waves-orange btn deep-orange darken-1" style="width: 100%;"><i class="material-icons left">mode_edit</i><span class="light">EDITAR</span></a>'?>
                                    <?php echo  '<a href="delete.php?eve_id='.$eve_id.'" class="waves-effect waves-purple btn purple darken-3" style="width: 100%;"><i class="material-icons left">delete_forever</i><span class="light">APAGAR</span></a>' ?>
                                </div>
                            </div>
                        </div>
                    </div>
                
                <?php
                    endforeach;
                ?>
            </div>
            <!------------------------------------->

        </div>

        <div class="fixed-action-btn">
          <a class="z-depth-4 waves-effect waves-light btn-floating btn-large deep-orange darken-1">
            <i class="large material-icons">menu</i>
          </a>
          <ul>
              <li><a href="../dados/dados.php" class="z-depth-2 btn-floating btn-large black"><i class="material-icons">person</i></a></li>
          </ul>

        </div>
    </body>
    <script type="text/javascript" src="../../_app/js/jquery-3.3.1.min.js" ></script>
    <script type="text/javascript" src="../../_app/js/materialize.min.js"></script>
    
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.parallax');
        var instances = M.Parallax.init(elems, options);
        });

        document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.fixed-action-btn');
        var instances = M.FloatingActionButton.init(elems, options);
        });

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
        $('.tabs').tabs();
        });

        // Or with jQuery

        $(document).ready(function(){
        $('select').formSelect();
        });

        // Or with jQuery

        $(document).ready(function(){
        $('.modal').modal();
        });

        // Or with jQuery

        $(document).ready(function(){
        $('.fixed-action-btn').floatingActionButton();
        });

        // Or with jQuery

        $(document).ready(function(){
        $('.parallax').parallax();
        });

        
    </script>
</html>