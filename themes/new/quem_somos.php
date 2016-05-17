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
<div class="parallax-container">
    <div class="parallax"><img src="<?= INCLUDE_PATH ?>/images/sobre-nos.jpg"></div>
</div>

<div class="container">
    <h2 class="como_funciona">Quem Somos?</h2>

    <div class="row">
        <div class="col s12 quem_somos_text ">
            <div class="col s4"><img class="z-depth-1 full-width" width="300" src="<?= INCLUDE_PATH ?>/images/familia.jpg"></div>
            <div class="col m8 quem_somos_text"><h5 class="como_funciona">Pensamos em sua família</h5>
                Somos uma ONG que pensa em sua familia. Queremos oferecer para você um cálculo preciso de sua conta de luz
            e outras informações para sua vida.</div>
        </div>

        <div class="col s12 quem_somos_text ">
            <div class="col m8 quem_somos_text">
                <h5 class="como_funciona">Somos transparentes</h5>
                Somos TRANSPARENTES!Levamos até você toda a informação que precisa sobre
            a conta de luz em sua cidade ou estado, nosso site está carregado de informações úteis a todos.</div>
            <div class="col s4"><img class="z-depth-1 full-width" width="300" src="<?= INCLUDE_PATH ?>/images/informacao.jpg"></div>
        </div>

        <div class="col s12 quem_somos_text ">
            <div class="col s4"><img class="z-depth-1 full-width" width="300" src="<?= INCLUDE_PATH ?>/images/dinheiro.jpg"></div>
            <div class="col m8 quem_somos_text">
                <h5 class="como_funciona">Você vai economizar!</h5>
                Faça um planejamento com antecedência e saiba o quanto vai gastar com a sua conta de luz. Nós te ajudaremos
            a cuidar de tudo!</div>
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