<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <link rel=icon href="<?= INCLUDE_PATH ?>/images/favicon.png" sizes="16x16" type="image/png">
    <title>Login - EcoLights</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?= INCLUDE_PATH ?>/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="<?= INCLUDE_PATH ?>/css/principal.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="<?= INCLUDE_PATH ?>/font-awesome/css/font-awesome.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
<!-- BODY -->
<!--header-->
<?= Render('padrao/header.php'); ?>
<!-- header-->

<!-- GRID -->
<div class="section">

    <!--   Icon Section   -->
    <div class="container">
        <div class="row">
            <div class="col s12 m6  offset-m3">
                <h4>Faça seu login</h4>
                <form class="FormLogin" action="<?= HOME ?>/action/login" method="post">
                    <div class="input-field col s12">
                        <h3></h3>
                    </div>
                    <div class="input-field col s12">
                        <i class="material-icons prefix">email</i>
                        <input id="icon_prefix" name="Email" type="email" class="validate">
                        <label for="icon_prefix">Email</label>
                    </div>
                    <div class="input-field col s12">
                        <i class="material-icons prefix">vpn_key</i>
                        <input id="icon_telephone" name="Senha" type="password" class="validate">
                        <label for="icon_telephone">Senha</label>
                    </div>
                    <div class="col s6" style="text-align: center">

                        <button class="btn waves-effect waves-light btn_blue" type="submit">Login
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                    <div class="col s1" style="text-align: center">
                       <span style="font-size: 20px;">OU</span>
                    </div>
                    <div class="col s5" style="text-align: center">
                        <a href="<?= HOME ?>/recuperar/senha">Recuperar Senha!</a>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m6  offset-m3">
                <a href="<?= HOME ?>/cadastro"><button class="btn waves-effect waves-light" style="display: block; width: 100%; background-color:#8BDC1C" type="submit">Cadastre-se
                </button></a>
            </div>
        </div>
    </div>





    <!--footer-->
    <?= Render('padrao/footer.php'); ?>
    <!-- footer-->



    <!-- BODY -->
    <!-- SCRIPTS -->
    <!--    <script src="https://use.fontawesome.com/61e2ef8b94.js"></script>-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="<?= INCLUDE_PATH ?>/js/materialize.js"></script>
    <script src="<?= INCLUDE_PATH ?>/js/init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.3/Chart.bundle.js"></script>
    <script src="https://cdn.auth0.com/js/lock-9.1.min.js"></script>
</body>
</html>