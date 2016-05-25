<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <link rel=icon href="<?= INCLUDE_PATH ?>/images/favicon.png" sizes="16x16" type="image/png">
    <title>Cadastro - EcoLights</title>
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
        <div class="container">
            <div class="row">
                <p>Altere o token de sua conta!</p>
                <div class="col s12 m6  offset-m3">
                    <form class="FormToken" action="<?= HOME ?>/action/login" method="post">
                        <div class="input-field col s12">
                            <h3></h3>
                        </div>
                        <div class="input-field col s12">
                            <input type="hidden" name="user_id" value="<?= $_SESSION['userlogin']['user_id']?>">
                            <i class="material-icons prefix">vpn_key</i>
                            <input id="icon_telephone" name="token" type="text" class="validate" length="6">
                            <label for="icon_telephone">Master Token</label>
                        </div>
                        <div class="col s12s" style="text-align: center">

                            <button class="btn waves-effect waves-light" type="submit">Alterar Token
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </form>
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
</body>
</html>