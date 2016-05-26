<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <link rel=icon href="<?= INCLUDE_PATH ?>/images/favicon.png" sizes="16x16" type="image/png">
    <title>Nosso Time - EcoLights</title>
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
<div class="parallax-container">
    <div class="parallax"><img src="<?= INCLUDE_PATH ?>/images/team.jpg"></div>
</div>

<div class="container">
    <h2 class="como_funciona">Nosso Time!</h2>

    <div class="row">
        <div class="col s4 quem_somos_text center-align ">
           <img class="z-depth-1 responsive-img circle max_altura" src="<?= INCLUDE_PATH ?>/images/perfil/gustavo.jpg">
            <h5 class="como_funciona  ">Gustavo Frias</h5>
                <p>Front-End Developer</p>
            <a href="https://www.facebook.com/gustavo.frias.9?fref=ts" target="_blank" title="Facebook do Gustavo"><i class="fa fa-facebook"></i></a>
        </div>

        <div class="col s4 quem_somos_text center-align">
            <img class="z-depth-1 responsive-img circle max_altura" src="<?= INCLUDE_PATH ?>/images/perfil/matheus.jpg">
            <h5 class="como_funciona ">Matheus Milani</h5>
            <p>Front-End Developer</p>
            <a href="https://www.facebook.com/matheus.milani.3?fref=ts" target="_blank" title="Facebook do Matheus"><i class="fa fa-facebook"></i></a>
        </div>

        <div class="col s4 quem_somos_text center-align">
            <img class="z-depth-1 responsive-img circle max_altura" src="<?= INCLUDE_PATH ?>/images/perfil/murilo.jpg">
            <h5 class="como_funciona">Murilo Garcia</h5>
            <p>Front-End Developer</p>
            <a href="https://www.facebook.com/murilo.garcia.16?fref=ts" target="_blank" title="Facebook do Murilo"><i class="fa fa-facebook"></i></a>
        </div>

        <div class="col s4 quem_somos_text center-align">
            <img class="z-depth-1 responsive-img circle max_altura" src="<?= INCLUDE_PATH ?>/images/perfil/pedro.jpg">
            <h5 class="como_funciona ">Pedro Lazari</h5>
            <p>Full-Stack Developer</p>
            <a href="https://www.facebook.com/pedroabucarma?fref=ts" target="_blank" title="Facebook do Pedro"><i class="fa fa-facebook"></i></a>
            <a href="https://github.com/plazari15" title="GitHub do Pedro" target="_blank"><i class="fa fa-github"></i></a>
        </div>

        <div class="col s4 quem_somos_text center-align">
            <img class="z-depth-1 responsive-img circle max_altura" src="<?= INCLUDE_PATH ?>/images/perfil/renan.jpg">
            <h5 class="como_funciona ">Renan Lima</h5>
            <p>Front-End Developer</p>
            <a href="https://www.facebook.com/renan.ribeiro.9404?fref=ts" target="_blank" title="Facebook do Renan"><i class="fa fa-facebook"></i></a>
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