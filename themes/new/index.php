<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>EcoLights</title>
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

<!-- SLIDER -->
<div class="slider">
    <ul class="slides">
        <li>
            <img src="<?= INCLUDE_PATH ?>/images/lampadas.jpg">
            <div class="caption center-align shadow-slider">
                <h3>Cálcule a sua conta de luz!</h3>
                <h5 class="light grey-text text-lighten-3">Você pode ter todas as informações referentes a sua conta bem aqui!</h5>
            </div>
        </li>
    </ul>
</div>


<!-- SLIDER -->

<!-- GRID -->
<div class="section">

    <!--   Icon Section   -->
    <div class="row">
        <h2 class="center-align como_funciona">Como funciona?</h2>
        <div class="col s12 m4">
            <div class="icon-block">
                <h2 class="center icons"><i class="fa fa-money" aria-hidden="true"></i></h2>
                <h5 class="center">Receba sua conta</h5>

                <p class="light">Você recebe a sua conta de luz em casa, ou faz uma estimativa e informa os dados em nossa calculadora</p>
            </div>
        </div>

        <div class="col s12 m4">
            <div class="icon-block">
                <h2 class="center icons"><i class="fa fa-calculator"></i></h2>
                <h5 class="center">Nosso sistema faz o cálculo</h5>

                <p class="light">Utilizamos um método muito preciso para validar o valor da conta de luz.</p>
            </div>
        </div>

        <div class="col s12 m4">
            <div class="icon-block">
                <h2 class="center icons"><i class="fa fa-line-chart"></i></h2>
                <h5 class="center">Faremos um relatório</h5>

                <p class="light">Vamos fazer um relatório bem legal para você e nossos usuários, se você deixar.</p>
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
</body>
</html>