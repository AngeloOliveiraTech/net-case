<?php
session_start();

if(!$_SESSION['Som']):
    header("Location: ../../login/login.php");
    die;
endif;

include '../../_app/conexao.php';

    $id = filter_input(INPUT_GET, 'equ_id', FILTER_DEFAULT);

    $sth = $pdo->prepare("select * from equipamentos where equ_id = :equ_id");
    $sth->bindValue(":equ_id", $id, PDO::PARAM_INT);
    $sth->execute();
    $resultado = $sth->fetch(PDO::FETCH_ASSOC);
    extract($resultado); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NET Case | Editar Equipamento</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../../_app/css/materialize.min.css"  media="screen,projection"/>
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

</head>

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
    <body class="grey lighten-2">
        <div class="section black">
            <div class="row">
            <?php
                echo '<span class="white-text darken-1"><h2 class="center">Editar '.$equ_nome.'</h2></span>';
            ?>
            </div>
        </div>
            <div class="container">
                <div class="arredondado card-panel purple darken-3">
                    <div class="container">
                        <form name="updte_equ" method="post" action="update.php" enctype="multipart/form-data">
                        <input type="hidden" name="equ_id" value="<?= $equ_id; ?>" />
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input id="equ_nome" name="equ_nome" type="text" value="<?= $equ_nome?>" class="colorwhite validate">
                                                <label for="equ_nome">Modelo<label>
                                            </div>
                                        </div>

                                        <div class="row">
                                        <div class="input-field col s6 m6">
                                            <input id="equ_quantidade" name="equ_quantidade" type="text" value="<?= $equ_quantidade?>" class="colorwhite validate">
                                            <label for="equ_quantidade">Quantidade</label>
                                        </div>
                                        <div class="input-field col s6 m6">
                                            <select class="colorwhite validate" name="equ_cat_id">
                                            <?php
                                                            
         
                                                                $sth = $pdo->prepare('select cat_id, cat_descricao, cat_sub from equipamentos e
                                                                INNER JOIN categoria c ON c.cat_id = e.equ_cat_id 
                                                                WHERE equ_id LIKE :equ_id');
                                                                $sth->bindValue(":equ_id", ($id));
                                                                $sth->execute();

                                                                foreach ($sth as $res) {
                                                                extract($res);

                                                                echo '<optgroup label="Categoria Atual:"><option value="'.$cat_id.'">'.$cat_descricao. $cat_sub.'</option></optgroup>';
                                                            
                                                                }

                                                                echo '<optgroup label="Selecione uma Categoria para mudar:">';

                                                                $sth = $pdo->prepare('SELECT cat_id, cat_descricao, cat_sub FROM categoria');
                                                                $sth->execute();

                                                                foreach ($sth as $res) {
                                                                extract($res);
                                                                echo '<option value="'.$cat_id.'">'.$cat_descricao. $cat_sub.'</option>';
                                                                }
                                                                
                                            
                                            ?>
                                            </select>
                                            <label>Categoria</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12">
                                        <select name="equ_arm_id"  class="validate">
                                            <?php
                                                 $sth = $pdo->prepare('select arm_id, arm_descricao from equipamentos e
                                                 INNER JOIN armazenamento a ON a.arm_id = e.equ_arm_id 
                                                 WHERE equ_id LIKE :equ_id');
                                                 $sth->bindValue(":equ_id", ($id));
                                                 $sth->execute();

                                                 foreach ($sth as $res) {
                                                 extract($res);

                                                 echo '<optgroup label="Local de Armazenamento Atual:"><option value="'.$arm_id.'">'.$arm_descricao.'</option></optgroup>';
                                             
                                                 }

                                                 echo '<optgroup label="Selecione uma Local para mudar:">';

                                                 $sth = $pdo->prepare('SELECT arm_id, arm_descricao FROM armazenamento a
                                                 LEFT JOIN usuario u ON u.usu_id = a.arm_usu_id
                                                 WHERE usu_email LIKE :usu_email');
                                                 $sth->bindValue(":usu_email", ($_SESSION['Som']['usu_email']));
                                                 $sth->execute();

                                                 foreach ($sth as $res) {
                                                 extract($res);
                                                 echo '<option value="'.$arm_id.'">'.$arm_descricao.'</option>';
                                                 }
                                            
                                            ?>
                                        </select>
                                        <label>Local de Armazenamento</label>
                                        </div>
                                    </div>
                                    

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="equ_obs" name="equ_obs" type="text"  value="<?= $equ_obs?>" class="colorwhite validate">
                                            <label for="equ_obs">Observação</label>
                                        </div>
                                    </div>
                                    
                                    

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="equ_img" name="fileUpload" type="file" class="colorwhite validate">
                                            <label for="equ_img">Atualizar Foto</label>
                                        </div>
                                    </div>
                                    
                                    <div class="container center-align">
                                        <div class="hide-on-small-only">
                                            <button class="z-depth-2 waves-effect waves-orange btn deep-orange darken-1" href="equipamentos.php" style="width: 40%;"><span class="white-text light">VOLTAR</span>
                                                <i class="material-icons left">arrow_back</i>
                                            </button>
                                        
                                            </script>
                                            <button class="z-depth-2 waves-effect waves-orange btn deep-orange darken-1" type="submit" name="action" style="width: 40%;"><span class="white-text light">Atualizar</span>
                                                <i class="material-icons right">update</i>
                                             </button>
                                        </div>

                                        <div class="hide-on-med-and-up">
                                            <div class="row">
                                            <button class="z-depth-2 waves-effect waves-orange btn deep-orange darken-1" href="equipamentos.php" style="width: 100%;"><span class="white-text light">VOLTAR</span>
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