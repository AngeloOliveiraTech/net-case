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
    <title>NET Case | Locais de Armazenamento</title>
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

                .arredondado {
                    border-radius: 25px;
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
                <span class="white-text darken-1"><h2 class="center">Locais de Armazenamento</h2></span>
            </div>
        </div>

        <div class="section grey lighten-2">
            <div class="container">

                <div class="grey lighten-2">
                    <div class="col s12">
                        <a href="../home.php" class="breadcrumb colorblack">Menu</a>
                        <a href="local.php" class="breadcrumb colorblack">Locais de Armazenamento</a>
                    </div>
                </div>
            
                <div class="arredondado z-depth-3 card-panel center-align">
                    <?php
                    include '../../_app/conexao.php';
                    ?>
                    <!--Botão do Modal de Adicionar -->
                    <a class="waves-effect waves-purple btn red darken-3 modal-trigger" href="#adicionar"><i class="material-icons left">library_add</i>Adicionar Local</a>
                    
                    <!-- Modal Structure -->
                    <div id="adicionar" class="modal">
                        <form name="add_ARM" method="post" action="insert_locais.php" enctype="multipart/form-data">
                            <div class="modal-content grey darken-1">
                                <span class="white-text"><h3 class="light">Adicionar Local</h3></span>
                                <div class="container">
                                    <div class="divider"></div>
                                </div>
                                <br>

                                <div class="container">
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="arm_descricao" name="arm_descricao" required="arm_descricao" type="text" class="validate colorwhite">
                                            <label for="arm_descricao">Descrição do Local<label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s8 m9">
                                            <input id="arm_endereco" name="arm_endereco" required="arm_endereco" type="text" class="validate colorwhite">
                                            <label for="arm_endereco">Endereço:</label>
                                        </div>
                                        <div class="input-field col s4 m3">
                                            <input id="arm_numero" name="arm_numero" required="arm_numero" type="number" class="validate colorwhite">
                                            <label for="arm_numero">Número:</label>
                                        </div>
                                    </div>
                                    

                                    <div class="row">
                                        <div class="input-field col s10 m8">
                                            <input id="arm_cidade" name="arm_cidade" required="arm_cidade" type="text" class="validate colorwhite">
                                            <label for="arm_cidade">Cidade:</label>
                                        </div>

                                        <div class="input-field col s2 m4">
                                            <select required="arm_uf_id" name="arm_uf_id">
                                            <?php
                                                $sth = $pdo->prepare('select * from uf');
                                                $sth->execute();
                                                foreach($sth as $res){
                                                extract($res);
                                                echo '<option value="' . $uf_id. '">' . $uf_sigla . '</option>';
                                            }
                                            ?>
                                            </select>
                                            <label>UF</label>
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
                
                <!-- Fim do Modal-->

                <!-- Começo do View-->
                
                <div class="row">
            
                <div class="left-align">
                    <?php
                    //Criar "Não há Equipamentos Cadastrados"
                    $email = $_SESSION['Som']['usu_email'];
                    $sth = $pdo->prepare("SELECT * FROM armazenamento a
                    INNER JOIN usuario u ON u.usu_id = a.arm_usu_id
                    INNER JOIN uf f ON f.uf_id = a.arm_uf_id
                    WHERE u.usu_email LIKE :usu_email");
                    $sth->bindValue(":usu_email", ($email));
                    $sth->execute();
                        echo '<h5 class="light">'.$sth->rowCount().' Locais Cadastrados.</h5>';
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
                            <span class="card-title"><b><?= $arm_descricao ?></b></span>
                            <p><?= $arm_endereco?>,
                               <?= $arm_numero?> |
                               <?= $arm_cidade?> -
                               <?= $uf_sigla?></p>
                               <?php
                               $email = $_SESSION['Som']['usu_email'];
                               $sth = $pdo->prepare("SELECT equ_id FROM equipamentos e
                                                     INNER JOIN usuario u ON u.usu_id = e.equ_usu_id
                                                     INNER JOIN armazenamento a ON a.arm_id = e.equ_arm_id
                                                     WHERE u.usu_email LIKE :usu_email AND a.arm_id = :arm_id");
                                $sth->bindValue(":usu_email", ($email));
                                $sth->bindValue(":arm_id", ($arm_id));
                                $sth->execute();  
                                echo '<h6 class="light">'.$sth->rowCount().' Equipamentos Cadastrados </h6>';   
                               ?>
                        </div>
                        <div class="card-action">
                            <?php echo '<a href="update_local.php?arm_id='.$arm_id.'">ATUALIZAR</a>' ?>
                            <?php echo '<a href="delete_local.php?arm_id='.$arm_id.'">DELETAR</a>' ?>
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