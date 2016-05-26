<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <link rel=icon href="<?= INCLUDE_PATH ?>/images/favicon.png" sizes="16x16" type="image/png">
    <title>Quem Somos - EcoLights</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?= INCLUDE_PATH ?>/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="<?= INCLUDE_PATH ?>/css/principal.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="<?= INCLUDE_PATH ?>/font-awesome/css/font-awesome.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
<!-- BODY -->
<!--header-->
<?php
Render('padrao/header.php');
$Media = new \Own\Ranking();
?>
<!-- header-->
<div class="parallax-container">
    <div class="parallax"><img src="<?= INCLUDE_PATH ?>/images/sobre-nos.jpg"></div>
</div>

<div class="container">
    <h2 class="como_funciona">Ranking da Economia</h2>
    <p>O Ranking da Economia é uma campanha da EcoLight em parceria com a Philips e o Grupo Promon projetos de infra-estrutura
        para recompensar o consumidor conciente de energia elétrica. Ou seja a cada medição inserida em nosso site, faremos a média mensal,
        sua média mensal será exibida junto com os outros usuários, ao fim do mês, você que ficar entre os três primeiros lugares receberá
        um prêmio.</p>
</div>

<div class="container">
    <?php
    $Read = new \Conn\Read();
    $Read->ExeRead("usuarios", "WHERE ranking = 1");
    foreach ($Read->GetResult() as $User){
        extract($User);
        echo $Media->ExibeResultado(date('n'),date('Y') ,$user_id ) . '<br>';
    }
    ?>
</div>

<div class="container">
    <p>As empresas acima citadas foram usadas de forma meramente ilustrativa, ambas empresas não tem nenhuma relação com
    o projeto EcoLight e foram retiradas de um ranking da <a href="http://exame.abril.com.br/negocios/noticias/as-20-empresas-modelo-em-responsabilidade-socioambiental#15" target="_blank" title="20 Empresas com responsabilidade ambiental"> Revista Exame</a>
    que qualifica as 20 empresas modelo em responsabilidade social.
        <br> A Philips tem um projeto que propõe lâmpadas de LED para iluminação pública.
        <br> O Grupo Promon tem um projeto de um "sustentômetro" que exibe em um painel eletrônico o impacto de seus projetos.
    </p>
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
<script src="<?= INCLUDE_PATH ?>/library/hightcharts/js/highcharts.js"></script>
<script src="<?= INCLUDE_PATH ?>/library/hightcharts/js/modules/exporting.js"></script>
</body>
</html>
