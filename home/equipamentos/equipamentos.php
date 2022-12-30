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
    <title>NET Case | Seus Equipamentos</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../../_app/css/materialize.min.css"  media="screen,projection"/>
    <link rel="sortcut icon" href="img/icone_net.jpg">
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

                .select-dropdown{
                    color: #ffffff;
                }
            </style>

        <div class="section black">     
            <div class="row">
                <span class="white-text darken-1"><h2 class="center">Meus Equipamentos</h2></span>
            </div>
        </div>
        
        <div class="section grey lighten-2">
            <div class="container">
                <div class="grey lighten-2">
                        <div class="col s12">
                            <a href="../home.php" class="breadcrumb colorblack">Menu</a>
                            <a href="equipamentos.php" class="breadcrumb colorblack">Meus Equipamentos</a>
                        </div>
                </div> 
            
                <div class="arredondado z-depth-3 card-panel center-align">
                    <?php
                    include '../../_app/conexao.php';
                    ?>

                    <!--Botão do Modal de Adicionar -->
                    <a class="waves-effect waves-purple btn purple darken-3 modal-trigger" href="#adicionar"><i class="material-icons left">library_add</i>Adicionar Equipamentos</a>
  
                    <!-- Modal Structure -->
                    <div id="adicionar" class="modal">
                        <form name="add_equ" method="post" action="insert_equipamentos.php" enctype="multipart/form-data">
                            <div class="modal-content purple darken-3">
                                <span class="white-text"><h3 class="light">Adicionar Equipamentos</h3></span>
                                <div class="container">
                                    <div class="divider"></div>
                                </div>
                                </br>

                                <div class="container">
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="equ_nome" name="equ_nome" type="text" required="equ-nome" class="validate colorwhite">
                                            <label for="equ_nome">Modelo<label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s4 m3">
                                            <input id="equ_quantidade" name="equ_quantidade" type="text" required="equ_quantidade" class="validate colorwhite">
                                            <label for="equ_quantidade">Quantidade</label>
                                        </div>
                                        <div class="input-field col s8 m9">
                                            <select name="equ_cat_id" required="equ_cat_id" class="validate">
                                            <?php
                                                $sth = $pdo->prepare('select * from categoria');
                                                $sth->execute();
                                                foreach($sth as $res){
                                                extract($res);
                                                echo '<option value="' . $cat_id. '">' . $cat_descricao . $cat_sub .'</option>';
                                                }
                                            ?>
                                            </select>
                                            <label>Categoria</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12">
                                        <select name="equ_arm_id" required="equ_arm_id" class="validate">
                                            <?php
                                                $email = $_SESSION['Som']['usu_email'];
                                                $sth = $pdo->prepare('SELECT arm_id, arm_descricao, arm_cidade FROM armazenamento a
                                                                      INNER JOIN usuario u ON u.usu_id = a.arm_usu_id
                                                                      WHERE u.usu_email LIKE :usu_email');
                                                $sth->bindValue(":usu_email", ($email));
                                                $sth->execute();
                                                foreach($sth as $res){
                                                extract($res);
                                                echo '<option value="' . $arm_id. '">' . $arm_descricao . ' '.$arm_cidade .'</option>';
                                            }
                                            ?>
                                        </select>
                                        <label>Local de Armazenamento</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="equ_obs" name="equ_obs" type="text" class="validate colorwhite">
                                            <label for="equ_obs">Observação</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="equ_img" name="fileUpload" type="file" required="equ_img" class="validate colorwhite">
                                            <label for="equ_img">Foto</label>
                                        </div>
                                    </div>
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

                <!-- Fim do Modal-->

                <!-- Começo do View-->
                
                <div class="row center">
            
                <div class="left-align">
                    <?php
                    //Criar "Não há Equipamentos Cadastrados"
                    $email = $_SESSION['Som']['usu_email'];
                    $sth = $pdo->prepare("SELECT * FROM equipamentos e
                    INNER JOIN usuario u ON u.usu_id = e.equ_usu_id
                    INNER JOIN armazenamento a ON a.arm_id = e.equ_arm_id  
                    WHERE u.usu_email LIKE :usu_email");
                    $sth->bindValue(":usu_email", ($email));
                    $sth->execute();
                        echo '<h5 class="light">'.$sth->rowCount().' Equipamentos Cadastrados.</h5>';
                    ?>
                    <div class="divider"></div>
                </div>

                <?php
                foreach ($sth as $res) :
                    extract($res);
                ?>
                    <!--ínicio do card-->
                    <div class="borda_roxa card z-depth-4 grey lighten-4 col s12 m4">
                        <div class="card-image waves-effect waves-block waves-purple">
                            <img class="activator" src="equipamentos\<?= $equ_img?>" height="200px">
                        </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4"><?= $equ_nome?><i class="material-icons right">more_vert</i></span>
                            <div class=" divider"></div>
                            <p><?= $equ_obs?></p>   
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4"><?= $equ_nome?><i class="material-icons right">close</i></span>
                            <p><?= $equ_obs?></p>
                            <div class="row left-align">
                                <p class="light">Qtde: <?= $equ_quantidade?></p>
                                <p class="light">Armazenado em: <?= $arm_descricao?></p>
                            </div>
                            <div class="row">
                                <div class="col s6 m6">
                                    <?php echo '<a href="update_equipamentos.php?equ_id='.$equ_id.'" class="waves-effect waves-orange btn deep-orange darken-1" style="width: 100%;"><i class="material-icons left">mode_edit</i><span class="light">EDITAR</span></a>'?>
                                </div>

                                </script>

                                <div class="col s6 m6">
                                    <?php echo'<a href="delete.php?equ_id='.$equ_id.'" class="waves-effect waves-purple btn purple darken-3" style="width: 100%;"><i class="material-icons left">delete_forever</i><span class="light">APAGAR</span></a>' ?>
                                </div>

                               
                            </div>
                            
                        </div>                         
                    </div>    
                    <!--Fim do Card-->
                <?php
                    endforeach;
                ?>
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

        $(document).ready(function(){
        $('.timepicker').timepicker();
        });

        // Or with jQuery

        $(document).ready(function(){
        $('.datepicker').datepicker();
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