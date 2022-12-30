<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NET Case | Estrutura</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../_app/css/materialize.min.css"  media="screen,projection"/>
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
                    <li class="deep-orange darken-1"><a class="waves-effect waves-purple" href="../index.php"><span class="flow-text light">Home</span></a></li>
                    <li class="grey darken-2"><a class="waves-effect waves-orange" href="sobre.php"><span class="flow-text light">Sobre</span></a></li>
                    <li class="deep-orange darken-1"><a class="waves-effect waves-purple" href="estrutura.php"><span class="flow-text light">Estrutura</span></a></li>
                    <li class="grey darken-2"><a class="waves-effect waves-orange" href="contato.php"><span class="flow-text light">Contato </span></a></li>
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
                    <li class="grey darken-2"><a class="waves-effect waves-orange" href="hsobre.php"><span class="flow-text light">Sobre</span></a></li>
                    <li class="deep-orange darken-1"><a class="waves-effect waves-purple" href="estrutura.php"><span class="flow-text light">Estrutura</span></a></li>
                    <li class="grey darken-2"><a class="waves-effect waves-orange" href="contato.php"><span class="flow-text light">Contato </span></a></li>
                    <li class="deep-orange darken-1"><a class="waves-effect waves-purple" href="../login.php"><i class="material-icons right">account_box</i><span class="flow-text light">Entrar</span></a></li>
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
                <li><a href="sobre.php"><i class="material-icons" style="color: white">question_answer</i><span class="white-text">Sobre</span></a></li>
                <li><div class="laranja divider"></div></li>
                <li><a href="estrutura.php"><i class="material-icons"  style="color: white">gamepad</i><span class="white-text">Estrutura</span></a></li>
                <li><div class="laranja divider"></div></li>
                <li><a href="contato.php"><i class="material-icons"  style="color: white">contacts</i><span class="white-text">Contato</span></a></li>
                <li><div class="laranja divider"></div></li>
                <li class="active black"><a href="../login/login.php"><i class="material-icons" style="color: white">account_box</i><span class="white-text"><b>Fazer Login</b></span></a></li>
                <!--<a href="login/login.php" class="waves-effect waves-light btn red accent-4"><i class="material-icons right">account_box</i>LOGIN</a>-->
            </ul>
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