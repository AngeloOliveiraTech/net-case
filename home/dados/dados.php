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
    <title>NET Case | Minha Conta</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../../_app/css/materialize.min.css"  media="screen,projection"/>
    <link rel="sortcut icon" href="../img/icone_net.jpg">
</head>
    <?php
    $sth = $pdo->prepare('SELECT * FROM usuario WHERE usu_email LIKE :usu_email');
    $sth->bindValue(":usu_email", ($_SESSION['Som']['usu_email']));
    $sth->execute();
    $resultado = $sth->fetch(PDO::FETCH_ASSOC);
    extract($resultado);

    ?>
    <style>
    .contorno {
        border: solid 5px;
        border-color: #6a1b9a !important;
    }

    .contorno2 {
        border: solid 5px;
        border-color: #000000 !important;
        border-radius: 10px;
    }

    .contorno3 {
        border: solid 5px;
        border-color: #f4511e !important;
        border-radius: 10px;
    }

    .contorno4 {
        border: solid 5px;
        border-color: #1a237e !important;
        border-radius: 10px;
    }

    .contorno5 {
        border: solid 5px;
        border-color: #6a1b9a !important;
        border-radius: 10px;
    }

    .arredondado {
      border-radius: 20px;
    }

    .arredondado2 {
      border-radius: 20px;
    }

    .row .input-field input:focus {
    border-bottom: 2px #6a1b9a !important;
    box-shadow: 0 2px 0 0 #6a1b9a !important
    }

    .select-dropdown{
                    color: #000000      ;
                }

    </style>
    <body>
    <form name="upd_dados" method="post" action="update_dados.php" enctype="multipart/form-data">
        <div class="contorno center-align section indigo darken-4">
                  <div class="hide-on-small-only">
                    <img class="responsive" href="../home.php" src="../img/logo_home.png" width="460" height=""/> 
                  </div>
                  
                  <div class="hide-on-med-and-up">
                    <img class="responsive" href="../home.php" src="../img/logo_home.png" width="340" height=""/>
                  </div>
        </div>

        <br>
        <div class="container">
            <div class="arredondado z-depth-3 row section grey lighten-1">
                 <div class="container">
                    <div class="center-align contorno2 card-panel">
                        <?php
                        if ($usu_img == NULL) {
                        ?>
                            <div class="hide-on-small-only">
                                <img class="circle responsive-img" src="img_usuario/icone_sem_foto.png" width="250">
                            </div>
                            <div class="hide-on-med-and-up">
                                <img class="circle responsive-img" src="img_usuaio/icone_sem_foto.png" width="150">
                            </div>
                              
                        <div class="divider"></div>
                        <h4 class="center-align"><b>Foto de Perfil</b></h4>

                        <div class="container file-field input-field">
                          <div class="btn-small indigo darken-4">
                            <i class="material-icons left">add</i>
                            <span>Adicione uma Foto</span>
                            <input type="file">
                          </div>
                          <div class="file-path-wrapper">
                            <input id="usu_img" name="usu_img" class="file-path validate" type="file">
                          </div>
                        </div>
                        <br>
                        <?php
                        //echo '<a class="waves-effect waves-purple btn purple darken-3 btn-small"><i class="material-icons left">add_a_photo</i>ADICIONAR UMA FOTO</a>';

                        }else {
                        ?>

                        <div class="hide-on-small-only">
                                <img class="circle responsive-img" src="img_usuario/<?= $usu_img?>" width="250">
                            </div>
                            <div class="hide-on-med-and-up">
                                <img class="circle responsive-img" src="img_usuario/<?= $usu_img?>" width="150">
                            </div>
                              
                        <div class="divider"></div>
                        <h4 class="center-align"><b>Foto de Perfil</b></h4>

                        <div class="container file-field input-field">
                          <div class="btn-small indigo darken-4">
                            <i class="material-icons left">mode_edit</i>
                            <span>Edite a Foto</span>
                            <input type="file">
                          </div>
                          <div class="file-path-wrapper">
                            <input id="usu_img" name="usu_img" required="usu_img" class="file-path validate" type="file">
                          </div>
                        </div>

                        <?php
                        //echo '<a class="waves-effect waves-purple btn indigo darken-3 btn-small"><i class="material-icons left">mode_edit</i>EDITAR SUA FOTO</a>';
                        }
                        ?>
                        <br>
                    </div>

                    <div class="center-align contorno3 card-panel">
                        <h4 class="center-align"><b>Meus Dados Pessoais</b></h4>
                        <div class="divider"></div>

                        <div class="row">
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">account_circle</i>
                                <label for="usu_nome">Nome</label>
                                <input id="usu_nome" type="text" name="usu_nome" value="<?= $usu_nome ?>" required="usu_nome" class="validade"/>
                            </div>

                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">location_city</i>
                                <label for="usu_cidade">Cidade</label>
                                <input id="usu_cidade" type="text" name="usu_cidade" value="<?= $usu_cidade?>" required="usu_cidade" class="validade"/>
                            </div>
                        </div>

                        <div class="row">
                              <div class="input-field col s12 m6">
                              
                                                                <select name="usu_uf_id" required name="usu_uf_id" class="validate">
                                                                    <?php
                                                                    include '../../_app/conexao.php';
             
                                                                    $sth = $pdo->prepare('select uf_id, uf_nome from usuario u
                                                                    INNER JOIN uf e  ON e.uf_id = u.usu_uf_id 
                                                                    WHERE usu_email LIKE :usu_email');
                                                                    $sth->bindValue(":usu_email", ($_SESSION['Som']['usu_email']));
                                                                    $sth->execute();

                                                                    foreach ($sth as $res) {
                                                                    extract($res);
                                                                    echo '<optgroup label="Seu Atual Estado:"><option value="'.$uf_id.'">'.$uf_nome.'</option></optgroup>';
                                                                    }

                                                                    echo '<optgroup label="Selecione para mudar de Estado:">';
                                                                    $sth = $pdo->prepare('SELECT uf_id, uf_nome FROM uf');
                                                                    $sth->execute();

                                                                    foreach ($sth as $res) {
                                                                    extract($res);
                                                                    echo '<option value="'.$uf_id.'">'.$uf_nome.'</option>';
                                                                    }
                                                                    ?>
                                                                </select>
                                                                <label for="usu_if_id">Estado (UF)</label>
                                </div>
                                

                                <div class="input-field col s12 m6">
                                    <i class="material-icons prefix">call</i>
                                    <label for="usu_telefone">Telefone</label>
                                    <input id="usu_telefone" placeholder="Ex: 12996761999" type="text" name="usu_telefone" value="<?= $usu_telefone?>" required="usu_telefone" class="validade"/>
                                </div>
                        </div>
                    </div>

                    <div class="center-align contorno4 card-panel">
                    <h4 class="center-align"><b>Dados de Login</b></h4>
                        <div class="divider"></div>

                        <div class="row">
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">mail</i>
                                <label for="usu_email">Email</label>
                                <input id="usu_email" type="text" name="usu_email" value="<?= $usu_email ?>" required="usu_email"  class="validade"/>
                            </div>

                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">location_city</i>
                                <label for="usu_senha">Senha</label>
                                <input id="usu_senha" type="text" name="usu_senha" value="<?= $usu_senha?>" class="validade"/>
                            </div>
                        </div>
                    </div>

                    <div class="center-align contorno5 card-panel">
                        <h4 class="center-align"><b>Minha Organização</b></h4>
                        <div class="divider"></div>     
                        <?php
                        if ($usu_img_organizacao == NULL) {
                        ?>
                            <div class="hide-on-small-only">
                                <img class="circle responsive-img" src="img_organizacao/icone_sem_organizacao.png" width="150">
                            </div>
                            <div class="hide-on-med-and-up">
                                <img class="circle responsive-img" src="img_organizacao/icone_sem_organizacao.png" width="100">
                            </div>
                              
                        <div class="divider"></div>
                        <h6 class="center-align"><b>Foto da Organização</b></h6>

                        <div class="container file-field input-field">
                          <div class="btn-small purple darken-3">
                            <i class="material-icons left">add</i>
                            <span>Adicione uma Foto</span>
                            <input type="file">
                          </div>
                          <div class="file-path-wrapper">
                            <input id="usu_img_organizacao" name="usu_img_organizacao" class="file-path validate" type="file">
                          </div>
                        </div>
                        <?php
                        //echo '<a class="waves-effect waves-purple btn purple darken-3 btn-small"><i class="material-icons left">add_a_photo</i>ADICIONAR UMA FOTO</a>';

                        }else {
                        ?>

                        <div class="hide-on-small-only">
                                <img class="circle responsive-img" src="img_organizacao/<?= $usu_img_organizacao?>" width="150">
                            </div>
                            <div class="hide-on-med-and-up">
                                <img class="circle responsive-img" src="img_organizacao/<?= $usu_img_organizacao?>" width="100">
                            </div>
                              

                        <h6 class="center-align"><b>Foto da Organização</b></h6>

                        <div class="container file-field input-field">
                          <div class="btn-small purple darken-3">
                            <i class="material-icons left">mode_edit</i>
                            <span>Edite a Foto</span>
                            <input type="file">
                          </div>
                          <div class="file-path-wrapper">
                            <input id="usu_img_organizacao" name="usu_img_organizacao" required="usu_img_organizacao" class="file-path validate" type="file">
                          </div>
                        </div>

                        <?php
                        //echo '<a class="waves-effect waves-purple btn indigo darken-3 btn-small"><i class="material-icons left">mode_edit</i>EDITAR A FOTO</a>';
                        }
                        ?>
                        <div class="row">
                            <div class="center-align input-field col s12 m8">
                                <i class="material-icons prefix">business</i>
                                <label for="usu_organizacao">Nome da Sua Organização:</label>
                                <input id="usu_organizacao" type="text" name="usu_organizacao" value="<?=$usu_organizacao?>" required=usu_organizacao class="validade"/>
                            </div>
                        </div>
                    </div>

                    <div class="center-align contorno5 card-panel">
                                
                                <a class="btn waves-effect waves-black btn deep-orange darken-1" href="../home.php">VOLTAR PARA HOME
                                <i class="material-icons left">arrow_back</i>
                                </a>
                                <button class="btn waves-effect waves-purple btn black" type="submit" name="action">Atualizar Dados
                                <i class="material-icons right">send</i>
                                </button>
                    </div>
              </form>
                 </div>               
            </div>

        </div>

        <div class="fixed-action-btn">
          <a class="z-depth-4 waves-effect waves-light btn-floating btn-large black">
            <i class="large material-icons">menu</i>
          </a>
          <ul>
              <li><a href="../equipamentos/equipamentos.php" class="z-depth-2 btn-floating btn-large purple darken-3"><span class="light">EQUIPAMENTOS</span></a></li>
              <li><a href="../eventos/eventos.php" class="z-depth-2 btn-floating btn-large grey darken-2"><span class="light">Eventos</span></a></li>
              <li><a href="../local/local.php" class="z-depth-2 btn-floating btn-large red darken-2"><span class="light">Locais</span></a></li>
              <li><a href="../lista/lista.php" class="z-depth-2 btn-floating btn-large deep-orange darken-1"><span class="light">Lista</span></a></li>
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
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems, options);
        });

        // Or with jQuery

        $(document).ready(function(){
        $('select').formSelect();
        });

        // Or with jQuery

        $(document).ready(function(){
        $('.parallax').parallax();
        });

        // Or with jQuery

        $(document).ready(function(){
        $('.sidenav').sidenav();
        });

        $(document).ready(function(){
        $('.fixed-action-btn').floatingActionButton();
        });
    </script>
</html>