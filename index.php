<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NET Case | Gerenciamento de Equipamentos</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="_app/css/materialize.min.css"  media="screen,projection"/>
    <link rel="sortcut icon" href="img/icone_net.jpg">
</head>
    <body class="grey lighten-2">

    <style>

        .laranja {
            background-color: #f4511e;
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
                    <li class="deep-orange darken-1"><a class="waves-effect waves-purple" href="index.php"><span class="flow-text light">Home</span></a></li>
                    <li class="grey darken-2"><a class="waves-effect waves-orange" href="home/sobre.php"><span class="flow-text light">Sobre</span></a></li>
                    <li class="deep-orange darken-1"><a class="waves-effect waves-purple" href="home/estrutura.php"><span class="flow-text light">Estrutura</span></a></li>
                    <li class="grey darken-2"><a class="waves-effect waves-orange" href="home/contato.php"><span class="flow-text light">Contato </span></a></li>
                    <li class="deep-orange darken-1"><a class="waves-effect waves-purple" href="login/login.php"><i class="material-icons right">account_box</i><span class="flow-text light">Entrar</span></a></li>
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
                    <li class="deep-orange darken-1"><a class="waves-effect waves-purple" href="index.php"><span class="flow-text light">Home</span></a></li>
                    <li class="grey darken-2"><a class="waves-effect waves-orange" href="home/sobre.php"><span class="flow-text light">Sobre</span></a></li>
                    <li class="deep-orange darken-1"><a class="waves-effect waves-purple" href="home/estrutura.php"><span class="flow-text light">Estrutura</span></a></li>
                    <li class="grey darken-2"><a class="waves-effect waves-orange" href="home/contato.php"><span class="flow-text light">Contato </span></a></li>
                    <li class="deep-orange darken-1"><a class="waves-effect waves-purple" href="login/login.php"><i class="material-icons right">account_box</i><span class="flow-text light">Entrar</span></a></li>
                    <!--<a href="login/login.php" class="waves-effect waves-light btn red accent-4"><i class="material-icons right">account_box</i>LOGIN</a>-->
                </ul>
                </div>
            </nav>
        </div>
    </div>

            <!--NavBar para Mobile-->
            <ul class="purple darken-3 sidenav" id="mobile-demo">
                <li><div class="laranja divider"></div></li>
                <li><a href="index.php"><i class="material-icons" style="color: white";>home</i><span class="white-text">Home</span></a></li>
                <li><div class="laranja divider"></div></li>
                <li><a href="home/sobre.php"><i class="material-icons" style="color: white">question_answer</i><span class="white-text">Sobre</span></a></li>
                <li><div class="laranja divider"></div></li>
                <li><a href="home/estrutura.php"><i class="material-icons"  style="color: white">gamepad</i><span class="white-text">Estrutura</span></a></li>
                <li><div class="laranja divider"></div></li>
                <li><a href="home/contato.php"><i class="material-icons"  style="color: white">contacts</i><span class="white-text">Contato</span></a></li>
                <li><div class="laranja divider"></div></li>
                <li class="active black"><a href="login/login.php"><i class="material-icons" style="color: white">account_box</i><span class="white-text"><b>Fazer Login</b></span></a></li>
                <!--<a href="login/login.php" class="waves-effect waves-light btn red accent-4"><i class="material-icons right">account_box</i>LOGIN</a>-->
            </ul>

        <!-- Parallax com Foto -->
        <div class="parallax-container">
            <div class="parallax"><img src="img/wall_1.jpg"></div>
        </div>
        <div class="section grey lighten-2">
            <div class="row container">
                <div class="col m6 s12">

                    <!--Ínicio do Card-->
                    <div class="row">
                        <div class="col s12 m12">
                            <div class="card z-depth-4">
                                <div class="card-content">
                                    <span class="purple-text accent-3"><h4 class="light">Cadastro</h4></span>
                                    <!--<div class="divider"></div>-->
                                </div>
                                <div class="card-action">
                                    <span><h6 class="flow-text light">O Cadastro é Rápido e Fácil, você poderá acessar pelo PC, Tablet e Celular, de forma a facilitar o acesso.</h6></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Fim do Card-->
                </div>

                <div class="col m6 s12">

                    <!--Ínicio do Card-->
                    <div class="row">
                        <div class="col s12 m12">
                            <div class="card z-depth-4">
                                <div class="card-content">
                                    <span class="purple-text accent-3"><h4 class="light">Inventário Online</h4></span>
                                    <!--<div class="divider"></div>-->
                                </div>
                                <div class="card-action">
                                    <span><h6 class="flow-text light">Com seus Equipamentos cadastrados será possível criar um inventário.
                                                        Ele poderá te ajudar do início ao fim dos eventos.</h6></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Fim do Card-->
                </div>

            </div>

            <!--Segunda Linha de Cards-->
            <div class="row container">
                <div class="col m6 s12">

                    <!--Ínicio do Card-->
                    <div class="row">
                        <div class="col s12 m12">
                            <div class="card z-depth-4">
                                <div class="card-content">
                                    <span class="purple-text accent-3"><h4 class="light">Eventos</h4></span>
                                    <!--<div class="divider"></div>-->
                                </div>
                                <div class="card-action">
                                    <span><h6 class="flow-text light">No NET Case é possivel adicionar e editar eventos, preparar uma lista com seus Equipamentos
                                                            para evitar perdas.</h6></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Fim do Card-->
                </div>

                <div class="col m6 s12">

                    <!--Ínicio do Card-->
                    <div class="row">
                        <div class="col s12 m12">
                            <div class="card z-depth-4">
                                <div class="card-content">
                                    <span class="purple-text accent-3"><h4 class="light">Check-Out</h4></span>
                                    <!--<div class="divider"></div>-->
                                </div>
                                <div class="card-action">
                                    <span><h6 class="flow-text light">Ao final do Evento, você poderá fazer um ckeck dos seus Equipamentos,
                                                                      permitindo agilizar a saída de um evento.</h6></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Fim do Card-->
                </div>
            </div>
        </div>

        <div class="parallax-container">
            <div class="parallax"><img src="img/wall_2.jpg"></div>
        </div>

    </body>
    
    <script type="text/javascript" src="_app/js/jquery-3.3.1.min.js" ></script>
    <script type="text/javascript" src="_app/js/materialize.min.js"></script>
    
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