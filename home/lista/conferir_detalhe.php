<?php

session_start();

if(!$_SESSION['Som']):
    header("Location: ../../login/login.php");
    die;
endif;

include '../../_app/conexao.php';

$lis_id_central = filter_input(INPUT_GET, 'lis_id', FILTER_DEFAULT);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NET CASE | Conferir Equipamento  </title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../../_app/css/materialize.min.css"  media="screen,projection"/>
    <link rel="sortcut icon" href="../img/icone_net.jpg">
</head>
<body>

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

                .borda_preta {
                    border: solid 2px;
                }

            </style>
            <div class="section indigo darken-4">
                <div class="hide-on-small-only">
                        <div class="row">
                            <?php
                            $sth = $pdo->prepare('SELECT lis_descricao FROM lista WHERE lis_id LIKE :lis_id');
                            $sth->bindValue(":lis_id", $lis_id_central);
                            $sth->execute();
                            $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                            extract($resultado);

                            echo '<span class="white-text darken-1"><h3 class="center">Conferir Equipamentos em '. $lis_descricao.'</h3></span>';
                            ?>
                        </div>
                </div>

                <div class="hide-on-med-and-up">
                    <div class="row">
                        <?php
                        $sth = $pdo->prepare('SELECT lis_descricao FROM lista WHERE lis_id LIKE :lis_id');
                        $sth->bindValue(":lis_id", $lis_id_central);
                        $sth->execute();
                        $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                        extract($resultado);

                        echo '<span class="white-text darken-1"><h5 class="center">Conferir Equipamentos em '. $lis_descricao.'</h5></span>';
                        ?>
                    </div>
                </div>
            </div>

            <div class="section grey lighten-2">
                <div class="container">
                    <div class="grey lighten-2">
                        <div class="col s12">
                            <a href="../home.php" class="breadcrumb colorblack">Menu</a>
                            <a href="lista.php" class="breadcrumb colorblack">Lista de Equipamentos</a>
                            <a href="conferir_detalhes.php" class="breadcrumb colorblack">Conferir Equipaentos</a>
                        </div>
                    </div>

                    <div class="row container">
                        <div class="valign-wrapper col s12 m2">
                            <h5>Legenda:</h5>
                        </div>
                        <div class="valign-wrapper col s12 m3">
                            <a href="#" class="arredondado waves-effect waves-black red darken-3 btn"><i class="material-icons left">highlight_off</i>NÃO LOCALIZADO</a>
                        </div>
                        <div class="valign-wrapper col s12 m4">
                            <a href="#" class="arredondado waves-effect waves-black deep-purple darken-4 btn"><i class="material-icons left">done</i>Equipamento CONFERIDO</a>
                        </div>
                    </div>

                <div class="hide-on-small-only">

                    <div class="row">
                        <div class="left-align">
                            <?php
                            $sth = $pdo->prepare("SELECT det_id, det_status, equ_id, equ_nome,equ_quantidade, cat_descricao, cat_sub, equ_img FROM detalhe_lista d
                            INNER JOIN equipamentos e ON e.equ_id = d.det_equ_id
                            INNER JOIN categoria c ON c.cat_id = e.equ_cat_id
                            WHERE det_lis_id LIKE :det_lis_id");
                            $sth->bindValue(":det_lis_id", ($lis_id_central));
                            $sth->execute();
                            //echo '<h5 class="light">'.$sth->rowCount().' Equipamentos Reservados.</h5>';
                            ?>
                        </div>

                            <div class="divider"></div>
                            <?php
                            foreach ($sth as $res) :
                                extract($res);
                            ?>
                        
                                <div class="arredondado borda_preta col s12 m4 card horizontal card z-depth-4 grey lighten-4">
                                    <div class="valign-wrapper card-image">
                                        <img src="../equipamentos/equipamentos/<?= $equ_img?>" height="100px">
                                    </div>

                                    <div class="card-stacked">
                                        <div class="card-content">
                                            <h5><?=$equ_nome?></h5>
                                            <div class="divider"></div>
                                            <p class="light">QTDE:<?=$equ_quantidade?></p>
                                            <p class="light"><?=$cat_descricao?>  <?=$cat_sub?></p>
                                        </div>

                                        <div class="center-align card-action ">
                                        <?php
                                            if ($det_status == 'Reservado') {
                                                echo '<a href="check.php?det_id='.$det_id.'&lis_id='.$lis_id_central.'" class="arredondado waves-effect waves-black red darken-3 btn" style="width:30%"><i class="material-icons center">highlight_off</i></a>';
                                            } else {
                                                echo '<a href="check.php?det_id='.$det_id.'&lis_id='.$lis_id_central.'" class="arredondado waves-effect waves-black deep-purple darken-4 btn" style="width:30%"><i class="material-icons center">done</i></a>';
                                            }
                                           
                                        ?>
                                        </diV>
                                    </div>
                                </div>

                            <?php
                            endforeach;
                            ?>

                        
                       
                    </div>
                </div>
            </div>

                <div class="hide-on-med-and-up">
                    <div class="container">
                            <?php
                            $sth = $pdo->prepare("SELECT det_id, det_status, equ_id, equ_nome,equ_quantidade, cat_descricao, cat_sub, equ_img FROM detalhe_lista d
                            INNER JOIN equipamentos e ON e.equ_id = d.det_equ_id
                            INNER JOIN categoria c ON c.cat_id = e.equ_cat_id
                            WHERE det_lis_id LIKE :det_lis_id");
                            $sth->bindValue(":det_lis_id", ($lis_id_central));
                            $sth->execute();
                            //echo '<h5 class="light">'.$sth->rowCount().' Equipamentos Reservados.</h5>';
                            ?>
                            <?php
                            foreach ($sth as $res) :
                                extract($res);
                            ?>
                        <br>
                        <div class="z-depth-1 arredondado borda_preta grey lighten-1">
                            <div class="row">
                                <div class="col s9">
                                    <h5><?=$equ_nome?></h5>
                                    <div class="purple divider"></div>
                                    <p class="light"> QTDE: <?=$equ_quantidade?> | <?=$cat_descricao?>  <?=$cat_sub?></p>
                                    <a href="../equipamentos/equipamentos/<?=$equ_img?>"><p class="light">Ver Foto do Equipamento</p></a>
                                </div>
                                <div class="center col s3">
                                                 <?php
                                            if ($det_status == 'Reservado') {
                                                echo '</br>';
                                                echo '</br>';
                                                echo '<a href="check.php?det_id='.$det_id.'&lis_id='.$lis_id_central.'" class="waves-effect waves-black red darken-3 btn-large" style="width:30%"><i class="material-icons">highlight_off</i></a>';
                                            } else {
                                                echo '</br>';
                                                echo '</br>';
                                                echo '<a href="check.php?det_id='.$det_id.'&lis_id='.$lis_id_central.'" class="waves-effect waves-black deep-purple darken-4 btn-large" style="width:30%"><i class="material-icons">done</i></a>';
                                            }
                                           
                                        ?>
                                
                                </div>
                            </div>
                        </div>
                        <?php
                            endforeach;
                        ?>
                    </div>
                </div>

                    <br>
                    <div class="center-align">
                            <a href="lista.php" class="waves-effect waves-light btn black" style="width:20%;"><i class="material-icons left">arrow_back</i>voltar para listas</a>
                    </div>
                </div>
            </div>    
                    
      
</body>
    <script type="text/javascript" src="../../_app/js/jquery-3.3.1.min.js" ></script>
    <script type="text/javascript" src="../../_app/js/materialize.min.js"></script>
    
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.sidenav');
        var instances = M.Sidenav.init(elems, options);
        });

        document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.parallax');
        var instances = M.Parallax.init(elems, options);
        });

        document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.fixed-action-btn');
        var instances = M.FloatingActionButton.init(elems, options);
        });

        document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems, options);
        });

        document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, options);
  });

  // Or with jQuery

        $(document).ready(function(){
        $('.modal').modal();
        });

        // Or with jQuery

        $(document).ready(function(){
        $('select').formSelect();
        });

        // Or with jQuery

        $(document).ready(function(){
        $('.fixed-action-btn').floatingActionButton();
        });

        // Or with jQuery

        $(document).ready(function(){
        $('.parallax').parallax();
        });

        // Or with jQuery

        $(document).ready(function(){
        $('.sidenav').sidenav();
        });

        
    </script>
</html>
</html>