<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastre sua Conta | NET Case</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../_app/css/materialize.min.css"  media="screen,projection"/>
    <link rel="sortcut icon" href="img/icone_net.jpg">
</head>
    <body class="grey lighten-2">


    <style>
    .row .input-field input:focus {
    border-bottom: 2px #6a1b9a !important;
    box-shadow: 0 2px 0 0 #6a1b9a !important
    }
    </style>
    
        <!-- Nav Bar-->
    <!--Mostrar para PC-->
    <div class="hide-on-small-only">
        <div class="navbar-fixed">
            <nav>
                <div class="nav-wrapper purple darken-3">     
                        <img class="responsive" src="img/logo_site_expan.png" width="485"/>
                        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li class="deep-orange darken-1"><a class="waves-effect waves-purple" href="../index.php"><span class="flow-text light">Home</span></a></li>
                    <li class="grey darken-2"><a class="waves-effect waves-orange" href="../home/sobre.php"><span class="flow-text light">Sobre</span></a></li>
                    <li class="deep-orange darken-1"><a class="waves-effect waves-purple" href="../home/estrutura.php"><span class="flow-text light">Estrutura</span></a></li>
                    <li class="grey darken-2"><a class="waves-effect waves-orange" href="../home/contato.php"><span class="flow-text light">Contato </span></a></li>
                    <li class="deep-orange darken-1"><a class="waves-effect waves-purple" href="../login/login.php"><i class="material-icons right">account_box</i><span class="flow-text light">Entrar</span></a></li>
                    <!--<a href="login/login.php" class="waves-effect waves-light btn red accent-4"><i class="material-icons right">account_box</i>LOGIN</a>-->
                </ul>
                </div>
            </nav>
        </div>
    </div>

    <!--Mostrar para Celular-->
    <div class="hide-on-med-and-up">
    <div class="navbar-fixed">
            <nav>
                <div class="nav-wrapper purple darken-3">     
                        <img class="responsive" src="img/logo_site.png" width="300"/>
                    <a href="#" data-target="mobile-demo" class="sidenav-trigger right"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li class="deep-orange darken-1"><a class="waves-effect waves-purple" href="../index.php"><span class="flow-text light">Home</span></a></li>
                    <li class="grey darken-2"><a class="waves-effect waves-orange" href="../home/sobre.php"><span class="flow-text light">Sobre</span></a></li>
                    <li class="deep-orange darken-1"><a class="waves-effect waves-purple" href="../home/estrutura.php"><span class="flow-text light">Estrutura</span></a></li>
                    <li class="grey darken-2"><a class="waves-effect waves-orange" href="../home/contato.php"><span class="flow-text light">Contato </span></a></li>
                    <li class="deep-orange darken-1"><a class="waves-effect waves-purple" href="login.php"><i class="material-icons right">account_box</i><span class="flow-text light">Entrar</span></a></li>
                    <!--<a href="login/login.php" class="waves-effect waves-light btn red accent-4"><i class="material-icons right">account_box</i>LOGIN</a>-->
                </ul>
                </div>
            </nav>
        </div>
    </div>

            <!--NavBar para Mobile-->
            <ul class="purple darken-3 sidenav" id="mobile-demo">
                <li><div class="laranja divider"></div></li>
                <li><a href="../index.php"><i class="material-icons" style="color: white">home</i><span class="white-text">Home</span></a></li>
                <li><div class="laranja divider"></div></li>
                <li><a href="../home/sobre.php"><i class="material-icons" style="color: white">question_answer</i><span class="white-text">Sobre</span></a></li>
                <li><div class="laranja divider"></div></li>
                <li><a href="../home/estrutura.php"><i class="material-icons"  style="color: white">gamepad</i><span class="white-text">Estrutura</span></a></li>
                <li><div class="laranja divider"></div></li>
                <li><a href="../home/contato.php"><i class="material-icons"  style="color: white">contacts</i><span class="white-text">Contato</span></a></li>
                <li><div class="laranja divider"></div></li>
                <li class="active black"><a href="login.php"><i class="material-icons" style="color: white">account_box</i><span class="white-text"><b>Fazer Login</b></span></a></li>
                <!--<a href="login/login.php" class="waves-effect waves-light btn red accent-4"><i class="material-icons right">account_box</i>LOGIN</a>-->
            </ul>
            <!--Conteúdo-->
                <div class="section white">
                    <span class="purple-text darken-1"><h2 class="center">Faça seu Cadastro.</h2></span>
                </div>

            <div class="container">
                <div class="section grey lighten-2">
                    <form name="cadastro" action="insert_cadastrar.php" method="post">
                        <div class="row">
                            
                               <!--Campo Nome-->
                               <div class="row">
                                    <div class="col s12 m12">
                                        <div class="card z-depth-3">
                                            <div class="card-content">
                                                <span class=""><h5 class="flow-text light">Nome Completo</h5></span>
                                            </div>
                                            <div class="grey lighten-2 card-action">
                                                <div class="input-field">
                                                    <i class="material-icons prefix">account_circle</i>
                                                    <label for="usu_nome">Nome</label>
                                                    <input id="usu_nome" type="text" name="usu_nome" required name=usu_nome  class="validade"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <div class="row">
                                <!--Campo Email-->
                                <div class="col s12 m6">
                                <div class="row">
                                    <div class="col s12 m12">
                                        <div class="card z-depth-3">
                                            <div class="card-content">
                                                <span class=""><h5 class="flow-text light">Email</h5></span>
                                            </div>
                                            <div class="grey lighten-2 card-action">
                                                <div class="input-field">
                                                    <i class="material-icons prefix">mail</i>
                                                    <label for="usu_email">E-Mail</label>
                                                    <input id="usu_email" type="email" name="usu_email" required name=usu_email class="validate" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>

                                <div class="col s12 m6">
                                <!--Campo Senha-->
                                <div class="row">
                                    <div class="col s12 m12">
                                        <div class="card z-depth-3">
                                            <div class="card-content">
                                                <span class=""><h5 class="flow-text light">Senha</h5></span>
                                            </div>
                                            <div class="grey lighten-2 card-action">
                                                <div class="input-field">
                                                    <i class="material-icons prefix">verified_user</i>
                                                    <label for="usu_senha">Senha</label>
                                                    <input id="usu_senha" type="password" name="usu_senha" required name=usu_senha class="validate" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>

                            <div class="row">
                                <!--Cidade/UF-->
                                <div class="row">
                                    <div class="col s12 m12">
                                        <div class="card z-depth-3">
                                                <div class="card-content">
                                                    <span class=""><h5 class="center-align flow-text light">Dados Locais</h5></span>
                                                </div>
                                                <div class="grey lighten-2 card-action">
                                                    <div class="row">
                                                        

                                                            <div class="input-field col s6 m6">
                                                                <i class="material-icons prefix">location_city</i>
                                                                <label for="usu_cidade">Cidade</label>
                                                                <input id="usu_cidade" type="text" name="usu_cidade" required name=usu_cidade class="validate"/>
                                                            </div>

                                                        

                                                            <style>
                                                               
                                                            </style>

                                                            <div class="input-field col s6 m6">
                                                                <i class="material-icons prefix">location_searching</i>
                                                                <select name="usu_uf_id" required name=usu_uf_id class="validate">
                                                                    <?php
                                                                    require '../_app/conexao.php';
             
                                                                    $sth = $pdo->prepare("select * from uf");
                                                                    $sth->execute();

                                                                    foreach ($sth as $res) {
                                                                    extract($res);
                                                                    echo '<option value="'.$uf_id.'">'.$uf_nome.'</option>';
                                                                    }
                                                                    ?>
                                                                </select>
                                                                <label for="usu_if_id">Estado (UF)</label>
                                                            </div>

                                                        
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                                               
                            <!--Botão de Confirmação-->
                           

                        <div class="row">
                            <!--Mostrar para PC-->
                            <div class="hide-on-small-only">

                                <div class="col m12">
                                <!--Botão Cadastrar-->
                                    <button class="z-depth-2 btn-large grey darken-2 waves-effect waves-purple" type="submit" name="action" style="width: 100%;"><span class="flow-text white-text light">Cadastrar</span>
                                        <i class="material-icons center">check_circle</i>
                                    </button>
                                </div>
                            </div>

                            <!--Mostrar para Mobile-->
                            <div class="hide-on-med-and-up">

                                <div class="col s12 ">
                                <!--Botão Cadastrar-->
                                    <button class="z-depth-2 btn-large grey darken-2 waves-effect waves-purple" type="submit" name="action" style="width: 100%;"><span class="flow-text white-text light">Cadastrar</span>
                                        <i class="material-icons center">check_circle</i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>          
            </div>
            


            <!-- Parallax com Foto -->
            <div class="z-depth-2 parallax-container">
                <div class="parallax"><img src="img/wall_cadastrar.jpg"></div>
            </div>
    </body>

    <script type="text/javascript" src="../_app/js/jquery-3.3.1.min.js" ></script>
    <script type="text/javascript" src="../_app/js/materialize.min.js"></script>
    
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
    </script>
</html>