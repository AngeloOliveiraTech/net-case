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
    <title>NET CASE | Lista de Equipamentos</title>
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

                .select-dropdown{
                    color: #ffffff;
                }

            </style>
            <div class="section black">
                <div class="row">
                    <span class="white-text darken-1"><h2 class="center">Lista de Equipamentos</h2></span>
                </div>
            </div>

            <div class="section grey lighten-2">
                <div class="container">
                    <div class="grey lighten-2">
                        <div class="col s12">
                            <a href="../home.php" class="breadcrumb colorblack">Menu</a>
                            <a href="lista.php" class="breadcrumb colorblack">Lista de Equipamentos</a>
                        </div>
                    </div>

                    <div class="arredondado z-depth-3 card-panel center-align">
                            <!--Botão do Modal de Adicionar -->
                            <a class="waves-effect waves-purple btn green darken-2 modal-trigger" href="#adicionar"><i class="material-icons left">library_add</i>Adicionar Lista de Equipamentos por Eventos</a>

                            <div id="adicionar" class="modal">
                                <form name="add_lis" method="post" action="insert_lista.php">
                                    <div class="modal-content blue darken-4">
                                            <span class="white-text"><h3 class="light">Adicionar Lista de Equipamentos por Evento</h3></span>
                                            <div class="container">
                                                <div class="divider"></div>
                                            </div>
                                            </br>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="input-field col s12">
                                                        <input id="lis_descricao" name="lis_descricao" type="text" required="lis_descricao" class="validate colorwhite">
                                                        <label for="lis_descricao">Nome da Lista:<label>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="input-field col s12">
                                                        <select name="lis_eve_id" required="lis_eve_id" class="validate colorwhite">
                                                            <?php
                                                                $sth = $pdo->prepare('SELECT usu_id FROM usuario WHERE usu_email LIKE :usu_email');
                                                                $sth->bindValue(":usu_email", $_SESSION['Som']['usu_email']);
                                                                $sth->execute();
                                                                $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                                                                extract($resultado);

                                                                $sth = $pdo->prepare('SELECT eve_id, eve_descricao FROM eventos WHERE eve_usu_id LIKE :eve_usu_id');
                                                                $sth->bindValue(":eve_usu_id", $usu_id);
                                                                $sth->execute();
                                                                foreach($sth as $res){
                                                                extract($res);
                                                                echo '<option value="' . $eve_id. '">' . $eve_descricao .'</option>';
                                                                }
                                                            ?>
                                                        </select>
                                                        <label>Evento:</label>
                                                    </div>
                                                </div>

                                                <input type="hidden" name="lis_usu_id" value="<?= $usu_id; ?>" />

                                                <?php
                                                date_default_timezone_set('America/Sao_Paulo');;
                                                $lis_data = date("d/m/Y");
                                                $lis_hora = date("H:i");
                                                ?>
                                                <input type="hidden" name="lis_data" value="<?= $lis_data; ?>" />
                                                <input type="hidden" name="lis_hora" value="<?= $lis_hora; ?>" />
                                                <input type="hidden" name="lis_status" value="Programado" />
                                    </div>
                                    </div>
                                    <div class="modal-footer black">
                                        <div class="container center-align">
                                                    <button class="waves-effect waves-green btn-flat" type="submit" name="action"><span class="white-text light">Adicionar</span>
                                                        <i class="material-icons white right">add_circle</i>
                                                    </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                    </div>
                
                    <div class="row">
            
            <div class="left-align">
                <?php
                $email = $_SESSION['Som']['usu_email'];
                $sth = $pdo->prepare("SELECT lis_id, lis_descricao, lis_data, lis_hora, lis_status, eve_descricao FROM lista l 
                INNER JOIN usuario u ON u.usu_id = l.lis_usu_id
                INNER JOIN eventos e ON e.eve_id = l.lis_eve_id
                WHERE u.usu_email LIKE :usu_email");
                $sth->bindValue(":usu_email", ($email));
                $sth->execute();
                    echo '<h5 class="light">'.$sth->rowCount().' Listas Cadastradas.</h5>';
                ?>
                <div class="divider"></div>
            </div>

            <?php
            foreach ($sth as $res) :
                extract($res);
            ?>
                <!--ínicio do card-->
                <div class="borda_preta col s12 m6 card z-depth-4 blue-grey darken-4">
                    <div class="card-content white-text">
                        <span class="center-align card-title"><b><?= $lis_descricao ?></b></span>
                        <div class="divider"></div>
                        <p><?= 'Evento: '.$eve_descricao?><p>
                        <p><?= 'Lista criada em: '.$lis_data.' às '.$lis_hora.'Hs'?></p>
                        <p><?= 'Lista '.$lis_status?></p>
                           <?php
                           //$email = $_SESSION['Som']['usu_email'];
                           $sth = $pdo->prepare("SELECT det_id FROM detalhe_lista d
                                                 INNER JOIN lista l ON l.lis_id = d.det_lis_id
                                                 WHERE lis_id LIKE :lis_id");
                            $sth->bindValue(":lis_id", ($lis_id));
                            $sth->execute();  
                            echo '<h6 class="light">'. $linhas=$sth->rowCount().' Equipamentos Listados</h6>';   
                            
                           ?>
                    </div>
                    <div class="card-action">
                        <?php

                        if($linhas == 0){
                            echo '<a  href="adicionar.php?lis_id='.$lis_id.'">ADICIONAR EQUIPAMENTOS</a>';
                            echo '<a  href="delete2.php?lis_id='.$lis_id.'">DELETAR LISTA</a>';
                            
                        } else {
                            echo '<a  href="adicionar.php?lis_id='.$lis_id.'">EDITAR EQUIPAMENTOS</a>';
                            echo '<a  href="delete2.php?lis_id='.$lis_id.'">DELETAR LISTA</a>';
                            echo '<a href="conferir_detalhe.php?lis_id='.$lis_id.'">CONFERIR</a>';
                        }
                        ?>
                    </div>
                </div>    
                <!--Fim do Card-->
            <?php
                endforeach;
            ?>
            </div>
        </div>
        <div class="center-align">
                            <a href="../home.php" class="waves-effect waves-light btn black" style="width:20%;"><i class="material-icons left">arrow_back</i>voltar para home</a>
                    </div>
    </div>


                </div>
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