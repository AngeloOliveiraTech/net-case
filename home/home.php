<?php

session_start();

if(!$_SESSION['Som']):
    header("Location: ../login/login.php");
    die;
endif;

include '../_app/conexao.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NET Case | Menu Principal</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../_app/css/materialize.min.css"  media="screen,projection"/>
    <link rel="sortcut icon" href="img/icone_net.jpg">
</head>
    <body>
    <!--Logo-->
        <div class="section indigo darken-4">

            <div class="row">

                <div class="col m3 s12">
                  <div class="hide-on-small-only">
                    <img class="responsive" src="img/logo_home.png" width="460" height=""/>
                  </div>

                  <div class="hide-on-med-and-up">
                    <img class="responsive" src="img/logo_home.png" width="340" height=""/>
                  </div>
                </div>

                <div class="col m9 s12">
                    <?php 
                    $conta = $_SESSION['Som']['usu_email'];
                    $sth = $pdo->prepare('SELECT usu_nome FROM usuario WHERE usu_email LIKE :usu_email');
                    $sth->bindValue(':usu_email', ($conta));
                    $sth->execute();
                    $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                    extract($resultado);
                    foreach ($sth as $res) {
                        extract($res);
                    }
                    ?>
                    <span class="white-text "><h3 class="light center"><?= substr($usu_nome, 0, 18); ?>, bem-vindo ao NET Case.</h3></span>
                </div>

            </div>

        </div>

        <style>
        .borda_msg{
          border: thick double ;
          color: #1a237e;

        }

        .material-icons.tamanho_msg { 
          color: #f57c00;
          font-size: 30px; 
          }
        
        </style>

        <!--Opçoes-->
        <div class="section black">
            <span class="purple-text darken-1"><h2 class=" center">Menu Principal</h2></span>
        </div>       

        <?php

              $sth = $pdo->prepare("SELECT * FROM usuario WHERE usu_email LIKE :usu_email");
              $sth->bindValue(":usu_email", ($conta));
              $sth->execute();
              $resultado = $sth->fetch(PDO::FETCH_ASSOC);
              extract($resultado);

              if($usu_img == null or $usu_telefone == null or $usu_organizacao == null or $usu_img_organizacao == null){

              ?>
              <!--TELA PC -->
              <div class="grey lighten-2 hide-on-small-only">
                  <div class="container borda_msg blue-grey darken-1">
                    <div class="valign-wrapper">
                          <i class="tamanho_msg material-icons">info</i>
                          <p class="white-text"><b>Para melhor aproveitamento do Sistema, adicione sua foto, telefone e mais dados na sua conta.</b>
                          <a href="dados/dados.php"><p><u>Ver Seus Dados</u></p></a>   
                    </div>
                  </div>
              </div>

              <!--TELA Celular -->
              <div class="grey lighten-2 hide-on-med-and-up">
                  <div class="borda_msg blue-grey darken-1">
                    <div class="valign-wrapper">
                          <i class="tamanho_msg material-icons">info</i>
                          <p class="white-text"><b>Para melhor aproveitamento do Sistema, adicione sua foto, telefone e mais dados na sua conta.</b>
                          <a href="dados/dados.php"><p><u>Ver Seus Dados</u></p></a>   
                    </div>
                  </div>
              </div>
        <?php
          }
        ?>

        <!--Site para PC -->
      <div class="hide-on-small-only ">
        <div class="section grey lighten-2 "> 
            <!--Card com Imagens e Links-->
            <div class="row container">
                <div class="col m12 s12">
                  <!--ínicio card-->     
                  <div class="card horizontal">
                      <div class="card-image">
                        <img class="responsive" src="img/card_equip.jpg" width="100" height="190">
                      </div>
                    <div class="card-stacked">
                      <div class="card-content">
                        <p class="light"><span class="black-text">Edite e Visualize os seus equipamentos de áudio profissional.</span></p>
                    </div>
                          <div class="card-action center-align">
                            <?php
                            $sth = $pdo->prepare("SELECT * FROM armazenamento a
                            INNER JOIN usuario u ON u.usu_id = a.arm_usu_id
                            WHERE u.usu_email LIKE :usu_email");
                            $sth->bindValue(":usu_email", ($conta));
                            $sth->execute();
                            $numero = $sth->rowCount();
                            
                            if ($numero > 0) 
                            {

                              echo '<a href="equipamentos/equipamentos.php" class="waves-effect waves-light btn-small blue-grey darken-1" style="width: 50%;">Ver Equipamentos</a>';
                            } else 
                            {
                              echo '<a class="btn disabled" href="equipamentos/equipamentos.php" class="waves-effect waves-light btn-small blue-grey darken-1" style="width: 50%;">Ver Equipamentos</a>';
                            }
                            
                            ?>
                            
                            
                          </div>
                      </div>
                  </div>
                  <!--Fim card-->
                </div>
            </div>
        
            <div class="row container">
              <div class="col m6 s12">
                <!--ínicio card-->     
    
                <div class="card horizontal">
                  <div class="card-image">
                    <img class="responsive" src="img/card_armazenamento.jpg" width="100" height="190">
                  </div>
                <div class="card-stacked">
                  <div class="card-content">
                    <p class="light"><span class="black-text">Edite e Visualize os locais aonde são guardados seus equipamentos de áudio profissional.</span></p>
                  </div>
                <div class="card-action center-align">
                    <a href="local/local.php" class="waves-effect waves-light btn-small deep-orange darken-2" style="width: 70%;">Ver Armazenamento</a>
                </div>
                </div>
                </div>
                <!--Fim card-->

              </div>
          
              <div class="col m6 s12">
                <!--ínicio card-->     
    
                <div class="card horizontal">
                  <div class="card-image">
                    <img class="responsive" src="img/card_evento.jpg" width="100" height="190">
                  </div>
                <div class="card-stacked">
                  <div class="card-content">
                    <p class="light"><span class="black-text">Edite e Visualize os eventos programados por sua organização.</span></p>
                  </div>
                <div class="card-action center-align">
                    <?php
                    if ($numero > 0) 
                    {
                      echo '<a href="eventos/eventos.php" class="waves-effect waves-light btn-small black" style="width: 70%;">Ver Eventos</a>';
                    } else 
                    {
                      echo '<a class="btn disabled" href="eventos/eventos.php" class="waves-effect waves-light btn-small black" style="width: 70%;">Ver Eventos</a>';
                    }
                    ?>
        
                </div>
                </div>
                </div>
                <!--Fim card-->

              </div>
        </div>

        <div class="row container">
                <div class="col m12 s12">
                  <!--ínicio card-->     
                  <div class="card horizontal">
                    <div class="card-image">
                      <img class="responsive" src="img/card_lista_equip.jpg" width="100" height="190">
                    </div>
                  <div class="card-stacked">
                    <div class="card-content">
                      <p class="light"><span class="black-text">Para evitar perdas de equipamentos, veja a lista de equipamentos de um evento para conferir..</span></p>
                    </div>
                  <div class="card-action center-align">
                  <?php
                  if ($numero > 0) 
                    {
                      echo '<a href="lista/lista.php" class="waves-effect waves-light btn-small deep-purple darken-4" style="width: 50%;">Ver Equipamentos por Evento</a>';
                    } else 
                    {
                      echo '<a class="btn disabled" href="lista/lista.php" class="waves-effect waves-light btn-small deep-purple darken-4" style="width: 50%;">Ver Equipamentos por Evento</a>';
                    }
                    ?>
                    
                  </div>
                  </div>
                  </div>
                  <!--Fim card-->
                </div>
        </div>
      </div>
    </div>  

      <!--Site para Mobile -->

    <div class="hide-on-med-and-up">
      <div class="section grey lighten-2">
            <!--Card com Imagens e Links-->
            <div class="row container">
                <div class="col m12 s12">
                  <!--ínicio card-->     
                  <div class="card horizontal">
                    <div class="card-image">
                      <img class="responsive" src="img/card_equip.jpg" width="100" height="190">
                    </div>
                  <div class="card-stacked">
                    <div class="card-content">
                      <p class="light"><span class="black-text">Edite e Visualize os seus equipamentos de áudio profissional.</span></p>
                    </div>
                  <div class="card-action center-align">
                    <?php
                    if ($numero > 0) 
                    {
                    echo '<a href="equipamentos/equipamentos.php"><span class="flow-text black-text">Equipamentos</span></a>';
                    } else ;
                    {
                      echo '<a class="btn disabled" href="equipamentos/equipamentos.php"><span class="flow-text black-text">Equipamentos</span></a>';
                    }
                    ?>
                     <a href="equipamentos/equipamentos.php"><span class="flow-text black-text">Equipamentos</span></a>
                  </div>
                  </div>
                  </div>
                  <!--Fim card-->
                </div>
            </div>

            <div class="row container">
              <div class="col m6 s12">
                <!--ínicio card-->     
    
                <div class="card horizontal">
                  <div class="card-image">
                    <img class="responsive" src="img/card_armazenamento.jpg" width="100" height="190">
                  </div>
                <div class="card-stacked">
                  <div class="card-content">
                    <p class="light"><span class="black-text">Edite e Visualize os locais aonde são guardados seus equipamentos de áudio profissional.</span></p>
                  </div>
                <div class="card-action center-align">
                    <a href="local/local.php"><span class="flow-text black-text">Armazenamento</span></a>
                </div>
                </div>
                </div>
                <!--Fim card-->

              </div>
          
              <div class="col m6 s12">
                <!--ínicio card-->     
                <div class="card horizontal">
                  <div class="card-image">
                    <img class="responsive" src="img/card_evento.jpg" width="100" height="190">
                  </div>
                <div class="card-stacked">
                  <div class="card-content">
                    <p class="light"><span class="black-text">Edite e Visualize os eventos programados por sua organização.</span></p>
                  </div>
                <div class="card-action center-align">
                <?php
                    if($numero > 0)
                    {
                      echo '<a href="eventos/eventos.php"><span class="flow-text black-text">Eventos</span></a>';
                    } else 
                    {
                      echo '<a class="btn disabled" href="eventos/eventos.php"><span class="flow-text black-text">Eventos</span></a>';
                    }
                    ?>
                  
                </div>
                </div>
                </div>
                <!--Fim card-->

              </div>
        </div>


        
        <div class="row container">
                <div class="col m12 s12">
                  <!--ínicio card-->     
                  <div class="card horizontal">
                    <div class="card-image">
                      <img class="responsive" src="img/card_lista_equip.jpg" width="100" height="190">
                    </div>
                  <div class="card-stacked">
                    <div class="card-content">
                      <p class="light"><span class="black-text">Para evitar perdas de equipamentos, veja a lista de equipamentos de um evento para conferir..</span></p>
                    </div>
                  <div class="card-action center-align">
                    <?php
                    if ($numero > 0) 
                    {
                      echo '<a href="lista/lista.php"><span class="flow-text black-text">Equipamentos por Evento</span></a>';
                    } else 
                    {
                      echo '<a class="btn disabled" href="lista/lista.php"><span class="flow-text black-text">Equipamentos por Evento</span></a>';
                    }
                    ?>
                  </div>
                  </div>
                  </div>
                  <!--Fim card-->
                </div>
        </div>
      </div>
    </div>

          <div class="section grey lighten-2">
            <div class="container center-align">
              <a href="sair.php" class="waves-effect waves-purple btn purple darken-3 " style="width: 60%;"><i class="material-icons left">arrow_back</i><span class="white-text">SAIR DO MENU</span></a>
            </div>
          </div>
      
      <div class="parallax-container">
            <div class="parallax"><img src="img/wall_show.jpg"></div>
      </div>

        <div class="fixed-action-btn">
          <a class="z-depth-4 waves-effect waves-light btn-floating btn-large deep-orange darken-1">
            <i class="large material-icons">menu</i>
          </a>
          <ul>
              <!--<li><a href="sair.php" class="btn-floating btn-large blue"><i class="material-icons">close</i></a></li>-->
              <li><a href="dados/dados.php" class="btn-floating btn-large black"><i class="material-icons">person</i></a></li>
          </ul>

        </div>

        <!--Modal de Boa Vindas-->
        <?php
                    if ($numero == 0)
                    {
                    ?>
                      
                      <!--<a class="waves-effect waves-purple btn red darken-3 modal-trigger" href="#teste"><i class="material-icons left">library_add</i>Adicionar Local</a>-->
                      <div id="boas_vindas" class="modal">
                        <div class="modal-content blue-grey lighten-2">
                            <style>

                          .arredondado {
                              border-radius: 10px;
                          }

                          .borda {
                              border: #f57c00 solid 1px;
                          }
                            </style>

                            <div class="arredondado borda card-panel purple darken-3">
                              <div class="center-align">
                                <h4 class="white-text light">Bem-Vindo ao NET CASE</h4>
                                <div class="divider"></div>
                              </div>

                              <div class="container">
                                <p class="white-text"><b>Parabéns! Pelo cadastro no Sistema, agradecemos sua preferência em cadastrar-se no nosso site.</b></p>
                                <p class="white-text light"> Como Primeira Vez no NET CASE, é necessário adiconar um Local onde é guardado os seus equipamentos
                                ,a partir disto, seu sistema estará totalmente liberado, sendo assim para melhor aproveitamento do sistema.</p>
                              </div>
                            </div>
                        </div>
                        <div class="modal-footer blue-grey lighten-4 ">
                                <div class="row container center-align col s12 m12">
                                  <a href="local/local.php" class="waves-effect waves-green btn-flat"><i class="material-icons right">add_circle_outline</i>ADICIONAR LOCAL</a>
                                  <a href="#" class="modal-close waves-effect waves-green btn-flat"><i class="material-icons right">close</i>FECHAR</a>
                                </div>
                        </div>
                    <?php
                    }
                    ?>
    </body>

    <script type="text/javascript" src="../_app/js/jquery-3.3.1.min.js" ></script>
    <script type="text/javascript" src="../_app/js/materialize.min.js"></script>
    
    <script type="text/javascript">

                    
        //alert('TESTE');
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


        // Or with jQuery

        
        $(document).ready(function(){
        $('.modal').modal();
        $('#boas_vindas').modal('open');
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