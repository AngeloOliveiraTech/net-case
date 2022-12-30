<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesse sua Conta | NET Case</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../_app/css/materialize.min.css"  media="screen,projection"/>
    <link rel="sortcut icon" href="img/icone_net.jpg">
</head>
    <body class="grey lighten-2">

    <style>
    .row .input-field input:focus {
    border-bottom: 2px #000000 !important;
    box-shadow: 0 2px 0 0 #000000 !important
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
                    <li class="deep-orange darken-1"><a class="waves-effect waves-purple" href="login.php"><i class="material-icons right">account_box</i><span class="flow-text light">Entrar</span></a></li>
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
                <li class="active black"><a href="login/login.php"><i class="material-icons" style="color: white">account_box</i><span class="white-text"><b>Fazer Login</b></span></a></li>
                <!--<a href="login/login.php" class="waves-effect waves-light btn red accent-4"><i class="material-icons right">account_box</i>LOGIN</a>-->
            </ul>

            <!--Conteúdo-->
                <div class="section black">
                    <span class="purple-text darken-1"><h2 class="center">Faça seu Login.</h2></span>
                </div>
                
            <div class="container">
                <div class="section grey lighten-2">
                    <form name="login" action="validar.php" method="post">
                        <div class="row">
                            <div class="col s12 m6">
                               <!--Campo Email-->
                               <div class="row">
                                    <div class="col s12 m12">
                                        <div class="card z-depth-3">
                                            <div class="card-content">
                                                <span class=""><h5 class="flow-text light"><b>E-Mail</b></h5></span>
                                            </div>
                                            <div class="grey lighten-2 card-action">
                                                <div class="input-field">
                                                    <label for="usu_email">Digite seu E-Mail</label>
                                                    <input id="usu_email" type="email" name="usu_email" required name=usu_senha class="validate"/>
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
                                                <span class=""><h5 class="flow-text light"><b>Senha</b></h5></span>
                                            </div>
                                            <div class="grey lighten-2 card-action">
                                                <div class="input-field">
                                                    <label for="usu_senha">Digite sua Senha</label>
                                                    <input id="usu_senha" type="password" name="usu_senha" required name=usu_senha class="validate"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- Final do Form-->
                        </div>

                        <!-- Botões para Cadastro e Esquecer a senha-->
                        <div class="row">
                            <!--Mostrar para PC-->
                            <div class="hide-on-small-only">
                                <!--Botão Enviar-->
                                <div class="col s7 m2 offset-m2">
                                    <a class="z-depth-5 btn-large deep-orange darken-1 waves-effect waves-purple" href="cadastrar.php"><span class="light">Cadastre-se</span>
                                        <i class="material-icons right">add_circle</i>
                                    </a>
                                </div>

                                <div class="col s5 m3 offset-m4">
                                <!--Botão Cadastra-se-->
                                    <button class="z-depth-5 btn-large purple darken-3 waves-effect waves-orange" type="submit" name="action"><span class="light">Logar</span>
                                        <i class="material-icons right">send</i>
                                    </button>
                                </div>
                            </div>

                            <!--Mostrar para Mobile-->
                            <div class="hide-on-med-and-up">
                                <!--Botão Enviar-->
                                <div class="col s5">
                                    <a class="z-depth-5 btn-small deep-orange darken-1 waves-effect waves-purple" href="cadastrar.php"><span class="light">Cadastre-se</span>
                                        <i class="material-icons right">add_circle</i>
                                    </a>
                                </div>

                                <div class="col s7">
                                <!--Botão Cadastra-se-->
                                    <div class="col s5">
                                    <button class="z-depth-5 btn-small purple darken-3 waves-effect waves-orange" type="submit" name="action"><span class="light">Logar</span>
                                        <i class="material-icons right">send</i>
                                    </button>
                                </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

             <!-- Parallax com Foto -->
            <div class="parallax-container">
                <div class="parallax"><img src="img/wall_login.jpg"></div>
            </div>
    </body>

    <script type="text/javascript" src="../_app/js/jquery-3.3.1.min.js" ></script>
    <script type="text/javascript" src="../_app/js/materialize.min.js"></script>
    <script type="text/javascript" src="../_app/js/index.js"></script>
    <script type="text/javascript" src="login.js"></script>
    
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.sidenav');
        var instances = M.Sidenav.init(elems, options);
        });

        document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.parallax');
        var instances = M.Parallax.init(elems, options);
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