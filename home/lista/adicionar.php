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
    <title>NET CASE | Adicionar Equipamentos na Lista</title>
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
            <div class="section black">
                <div class="row">
                    <?php
                    $sth = $pdo->prepare('SELECT lis_descricao FROM lista WHERE lis_id LIKE :lis_id');
                    $sth->bindValue(":lis_id", $lis_id_central);
                    $sth->execute();
                    $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                    extract($resultado);

                    echo '<span class="white-text darken-1"><h3 class="center">Adicionar Equipamentos em '. $lis_descricao.'</h3></span>';
                    ?>
                </div>
            </div>

            <div class="section grey lighten-2">
                <div class="container">
                    <div class="grey lighten-2">
                        <div class="col s12">
                            <a href="../home.php" class="breadcrumb colorblack">Menu</a>
                            <a href="lista.php" class="breadcrumb colorblack">Lista de Equipamentos</a>
                            <a href="adicionar.php" class="breadcrumb colorblack">Adicionar Equipamentos a Lista</a>
                        </div>
                    </div>

                    
                        <div class="row">
                            <div class="col s12 m6">
                            <div class="arredondado z-depth-3 card-panel center-align">
                            <?php
                                $sth = $pdo->prepare('SELECT equ_id, equ_nome, equ_quantidade, equ_img, arm_descricao FROM equipamentos e
                                INNER JOIN armazenamento a ON a.arm_id = e.equ_arm_id 
                                INNER JOIN usuario u ON u.usu_id = e.equ_usu_id
                                WHERE usu_email LIKE :usu_email ORDER BY equ_id');
                                $sth->bindValue(":usu_email", $_SESSION['Som']['usu_email']);
                                $sth->execute();
                               
                                echo '<div class="container"><h5><b>Seus Equipamentos Cadastrados</b></h5></div>'; 
                                echo '<div class="divider"></div>';
                                echo '<br>';
                                echo '<table class="responsive-table highlight">';

                                echo '<tr>';
                                echo '<th> ID </th>';
                                echo '<th> Equipamento </th>';
                                echo '<th> Qtde </th>';
                                echo '<th> Armazenado em</th>';
                                echo '<th> Foto </th>';
                                echo '<th> Reservar </th>';
                                echo '</tr>';
                                
                                foreach ($sth as $res) {
                                    extract($res);

                                    echo '<tr>';
                                    echo '<td> '.$equ_id.' </td>';
                                    echo '<td> '.$equ_nome.' </td>';
                                    echo '<td> '.$equ_quantidade.' </td>';
                                    echo '<td> '.$arm_descricao.' </td>';
                                    echo '<td><a href="../equipamentos/equipamentos/'.$equ_img.'">Ver Foto</a></td>';
                                    echo '<td class="center-align"><a href="insert_detalhe.php?lis_id='.$lis_id_central.'&equ_id='.$equ_id.'" class="btn-floating btn-small waves-effect waves-light purple"><i class="material-icons">list</i></a></td>';
                                    echo '</tr>';
                                }

                                echo '</table>';

                                ?>
                            </div>


                            </div>

                            <div class="col s12 m6">
                                <div class=" borda_preta arredondado z-depth-3 card-panel center-align">
                            <?php
                                
                                $sth = $pdo->prepare('SELECT det_id, equ_nome, equ_quantidade, arm_descricao FROM detalhe_lista d
                                INNER JOIN equipamentos e ON e.equ_id = d.det_equ_id
                                INNER JOIN armazenamento a ON a.arm_id = e.equ_arm_id
                                WHERE det_lis_id LIKE :det_lis_id');
                                $sth->bindValue(":det_lis_id", ($lis_id_central));
                                $sth->execute();
                                $contarbotao = $sth->rowCount();

                                echo '<div class="container"><h5><b>Lista de Equipamentos Reservados</b></h5></div>'; 
                                echo '<div class="divider"></div>';
                                echo '<br>';

                                echo '<table class="responsive-table highlight">';

                                echo '<tr>';
                                echo '<th> Equipamento </th>';
                                echo '<th> Qtde </th>';
                                echo '<th> Armazenado em</th>';
                                echo '<th> Foto </th>';
                                echo '<th> Retornar </th>';
                                echo '</tr>';
                                
                                foreach ($sth as $res) {
                                    extract($res);
                                    
                                    echo '<tr>';
                                    echo '<td> '.$equ_nome.' </td>';
                                    echo '<td> '.$equ_quantidade.' </td>';
                                    echo '<td> '.$arm_descricao.' </td>';
                                    echo '<td><a href="../equipamentos/equipamentos/'.$equ_img.'">Ver Foto</a></td>';
                                    echo '<td class="center-align"><a href="delete_detalhe.php?lis_id='.$lis_id_central.'&det_id='.$det_id.'" class="btn-floating btn-small waves-effect waves-light deep-orange darken-1"><i class="material-icons">backspace</i></a></td>';
                                    echo '</tr>';
                                }

                                echo '</table>';
                                
                                ?>
                                </br>
                                <?php

                                 if($contarbotao > 0){
                                    echo '<a href="delete_lista_2.php?lis_id='.$lis_id_central.'" class="waves-effect waves-light btn red"><i class="material-icons left">delete</i>apagar todos os registros</a>';
                                 }else {
                                    echo '<h5 class="light">Não há equipamentos reservados, adicione a partir da tabela ao lado esquerdo.</h5>';
                                 }
                                ?>
                            </div>
                        </div>
                        
                        
                    
                </div>
                <br>
                        <div class="center-align">
                            <a href="lista.php" class="waves-effect waves-light btn black" style="width:20%;"><i class="material-icons left">arrow_back</i>voltar para listas</a>
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