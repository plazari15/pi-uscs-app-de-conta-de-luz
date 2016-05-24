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
<?php
$Login = new \Models\Login(1);
if(!$Login->CheckLogin()){
    header("Location: ".HOME."/dashboard/login");
}
?>
<div class="container">
    <div class="row">
        <div class="col s12">
            <h3>Seja bem vindo, <?= $_SESSION['userlogin']['nome'] ?>.</h3>
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