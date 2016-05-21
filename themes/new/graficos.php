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
Render('padrao/header.php'); ?>
<!-- header-->
<div class="parallax-container">
    <div class="parallax"><img src="<?= INCLUDE_PATH ?>/images/sobre-nos.jpg"></div>
</div>

<div class="container">
    <h2 class="como_funciona">Gráficos</h2>
    <p>Seja bem vindo a sessão de gráficos. Nosso projeto visa exibir para você todos os nossos dados compartilhados
    pelos usuários de forma limpa e transparente. Devido a isso apresentamos a você nossos gráficos. Se você pertencer
    a algum veículo de mídia, faça um CADASTRO em nosso site, para ter acesso ao download dos gráficos em alta
    definição.</p>

    <div class="col s12">
        <h4 class="center-align">Consumo médio de energia</h4>
        <div id="graficoOne" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    </div>

    <div class="col s12">
        <div id="graficoTwo" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    </div>

    <div class="col s12">
        <div id="graficoThree" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    </div>

    <div class="col s12">
        <div id="graficoFour" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    </div>


</div>
<?php $Media = new \Own\GeraMediaDosCalculos(); ?>
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
<!--<script src="--><?//= INCLUDE_PATH ?><!--/library/hightcharts/js/modules/exporting.js"></script>-->
</body>
</html>
<!-- GRAFICO ONE -->

<script type="text/javascript">
    $(function () {
        $('#graficoOne').highcharts({
            title: {
                text: 'Consumo de Energia Residências',
                x: -20 //center
            },
            subtitle: {
                text: 'Gráfico gerado com a ajuda de nossos usuários',
                x: -20
            },
            xAxis: {
                categories: ['Jan', 'Fev', 'Mar', 'Abr', 'Maio', 'Jun',
                    'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez']
            },
            yAxis: {
                title: {
                    text: 'Consumo (kWh)'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: 'kWh'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                name: 'Residencial 2015',
                data: [
                    <?= $Media->GeraMedia(1,2015 , 'residencial') ?>,
                    <?= $Media->GeraMedia(2,2015 , 'residencial') ?>,
                    <?= $Media->GeraMedia(3,2015 , 'residencial') ?>,
                    <?= $Media->GeraMedia(4,2015 , 'residencial') ?>,
                    <?= $Media->GeraMedia(5,2015 , 'residencial') ?>,
                    <?= $Media->GeraMedia(6,2015 , 'residencial') ?>,
                    <?= $Media->GeraMedia(7,2015 , 'residencial') ?>,
                    <?= $Media->GeraMedia(8,2015 , 'residencial') ?>,
                    <?= $Media->GeraMedia(9,2015 , 'residencial') ?>,
                    <?= $Media->GeraMedia(10,2015 , 'residencial') ?>,
                    <?= $Media->GeraMedia(11,2015 , 'residencial') ?>,
                    <?= $Media->GeraMedia(12,2015 , 'residencial') ?>,
                ]
            },
                {
                    name: 'Residencial 2016',
                    data: [
                        <?= $Media->GeraMedia(1,2016 , 'residencial') ?>,
                        <?= $Media->GeraMedia(2,2016 , 'residencial') ?>,
                        <?= $Media->GeraMedia(3,2016 , 'residencial') ?>,
                        <?= $Media->GeraMedia(4,2016 , 'residencial') ?>,
                        <?= $Media->GeraMedia(5,2016 , 'residencial') ?>,
                        <?= $Media->GeraMedia(6,2016 , 'residencial') ?>,
                        <?= $Media->GeraMedia(7,2016 , 'residencial') ?>,
                        <?= $Media->GeraMedia(8,2016 , 'residencial') ?>,
                        <?= $Media->GeraMedia(9,2016 , 'residencial') ?>,
                        <?= $Media->GeraMedia(10,2016 , 'residencial') ?>,
                        <?= $Media->GeraMedia(11,2016 , 'residencial') ?>,
                        <?= $Media->GeraMedia(12,2016 , 'residencial') ?>,
                    ]
                }
            ]
        });//Fim GráficoOne
        $('#graficoTwo').highcharts({
            title: {
                text: 'Consumo de Energia Comercial',
                x: -20 //center
            },
            subtitle: {
                text: 'Gráfico gerado com a ajuda de nossos usuários',
                x: -20
            },
            xAxis: {
                categories: ['Jan', 'Fev', 'Mar', 'Abr', 'Maio', 'Jun',
                    'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez']
            },
            yAxis: {
                title: {
                    text: 'Consumo (kWh)'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: 'kWh'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                name: 'Comercial 2015',
                data: [
                    <?= $Media->GeraMedia(1,2015 , 'comercial') ?>,
                    <?= $Media->GeraMedia(2,2015 , 'comercial') ?>,
                    <?= $Media->GeraMedia(3,2015 , 'comercial') ?>,
                    <?= $Media->GeraMedia(4,2015 , 'comercial') ?>,
                    <?= $Media->GeraMedia(5,2015 , 'comercial') ?>,
                    <?= $Media->GeraMedia(6,2015 , 'comercial') ?>,
                    <?= $Media->GeraMedia(7,2015 , 'comercial') ?>,
                    <?= $Media->GeraMedia(8,2015 , 'comercial') ?>,
                    <?= $Media->GeraMedia(9,2015 , 'comercial') ?>,
                    <?= $Media->GeraMedia(10,2015 , 'comercial') ?>,
                    <?= $Media->GeraMedia(11,2015 , 'comercial') ?>,
                    <?= $Media->GeraMedia(12,2015 , 'comercial') ?>,
                ]
            },
                {
                    name: 'Comercial 2016',
                    data: [
                        <?= $Media->GeraMedia(1,2016 , 'comercial') ?>,
                        <?= $Media->GeraMedia(2,2016 , 'comercial') ?>,
                        <?= $Media->GeraMedia(3,2016 , 'comercial') ?>,
                        <?= $Media->GeraMedia(4,2016 , 'comercial') ?>,
                        <?= $Media->GeraMedia(5,2016 , 'comercial') ?>,
                        <?= $Media->GeraMedia(6,2016 , 'comercial') ?>,
                        <?= $Media->GeraMedia(7,2016 , 'comercial') ?>,
                        <?= $Media->GeraMedia(8,2016 , 'comercial') ?>,
                        <?= $Media->GeraMedia(9,2016 , 'comercial') ?>,
                        <?= $Media->GeraMedia(10,2016 , 'comercial') ?>,
                        <?= $Media->GeraMedia(11,2016 , 'comercial') ?>,
                        <?= $Media->GeraMedia(12,2016 , 'comercial') ?>,
                    ]
                }
            ]
        });//Fim GráficoTwo
        $('#graficoThree').highcharts({
            title: {
                text: 'Consumo de Energia Residencias de Baixa Renda',
                x: -20 //center
            },
            subtitle: {
                text: 'Gráfico gerado com a ajuda de nossos usuários',
                x: -20
            },
            xAxis: {
                categories: ['Jan', 'Fev', 'Mar', 'Abr', 'Maio', 'Jun',
                    'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez']
            },
            yAxis: {
                title: {
                    text: 'Consumo (kWh)'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: 'kWh'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                name: 'Residencial Baixa Renda 2015',
                data: [
                    <?= $Media->GeraMedia(1,2015 , 'residencial_baixa') ?>,
                    <?= $Media->GeraMedia(2,2015 , 'residencial_baixa') ?>,
                    <?= $Media->GeraMedia(3,2015 , 'residencial_baixa') ?>,
                    <?= $Media->GeraMedia(4,2015 , 'residencial_baixa') ?>,
                    <?= $Media->GeraMedia(5,2015 , 'residencial_baixa') ?>,
                    <?= $Media->GeraMedia(6,2015 , 'residencial_baixa') ?>,
                    <?= $Media->GeraMedia(7,2015 , 'residencial_baixa') ?>,
                    <?= $Media->GeraMedia(8,2015 , 'residencial_baixa') ?>,
                    <?= $Media->GeraMedia(9,2015 , 'residencial_baixa') ?>,
                    <?= $Media->GeraMedia(10,2015 , 'residencial_baixa') ?>,
                    <?= $Media->GeraMedia(11,2015 , 'residencial_baixa') ?>,
                    <?= $Media->GeraMedia(12,2015 , 'residencial_baixa') ?>,
                ]
            },
                {
                    name: 'Residencial Baixa Renda 2016',
                    data: [
                        <?= $Media->GeraMedia(1,2016 , 'residencial_baixa') ?>,
                        <?= $Media->GeraMedia(2,2016 , 'residencial_baixa') ?>,
                        <?= $Media->GeraMedia(3,2016 , 'residencial_baixa') ?>,
                        <?= $Media->GeraMedia(4,2016 , 'residencial_baixa') ?>,
                        <?= $Media->GeraMedia(5,2016 , 'residencial_baixa') ?>,
                        <?= $Media->GeraMedia(6,2016 , 'residencial_baixa') ?>,
                        <?= $Media->GeraMedia(7,2016 , 'residencial_baixa') ?>,
                        <?= $Media->GeraMedia(8,2016 , 'residencial_baixa') ?>,
                        <?= $Media->GeraMedia(9,2016 , 'residencial_baixa') ?>,
                        <?= $Media->GeraMedia(10,2016 , 'residencial_baixa') ?>,
                        <?= $Media->GeraMedia(11,2016 , 'residencial_baixa') ?>,
                        <?= $Media->GeraMedia(12,2016 , 'residencial_baixa') ?>,
                    ]
                }
            ]
        });//Fim GráficoThree
        $('#graficoFour').highcharts({
            title: {
                text: 'Consumo de Energia Geral',
                x: -20 //center
            },
            subtitle: {
                text: 'Gráfico gerado com a ajuda de nossos usuários',
                x: -20
            },
            xAxis: {
                categories: ['Jan', 'Fev', 'Mar', 'Abr', 'Maio', 'Jun',
                    'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez']
            },
            yAxis: {
                title: {
                    text: 'Consumo (kWh)'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: 'kWh'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                name: 'Residencial 2015',
                data: [
                    <?= $Media->GeraMedia(1,2015 , 'residencial') ?>,
                    <?= $Media->GeraMedia(2,2015 , 'residencial') ?>,
                    <?= $Media->GeraMedia(3,2015 , 'residencial') ?>,
                    <?= $Media->GeraMedia(4,2015 , 'residencial') ?>,
                    <?= $Media->GeraMedia(5,2015 , 'residencial') ?>,
                    <?= $Media->GeraMedia(6,2015 , 'residencial') ?>,
                    <?= $Media->GeraMedia(7,2015 , 'residencial') ?>,
                    <?= $Media->GeraMedia(8,2015 , 'residencial') ?>,
                    <?= $Media->GeraMedia(9,2015 , 'residencial') ?>,
                    <?= $Media->GeraMedia(10,2015 , 'residencial') ?>,
                    <?= $Media->GeraMedia(11,2015 , 'residencial') ?>,
                    <?= $Media->GeraMedia(12,2015 , 'residencial') ?>,
                ]
            },
                {
                    name: 'Comercial 2015',
                    data: [
                        <?= $Media->GeraMedia(1,2015 , 'comercial') ?>,
                        <?= $Media->GeraMedia(2,2015 , 'comercial') ?>,
                        <?= $Media->GeraMedia(3,2015 , 'comercial') ?>,
                        <?= $Media->GeraMedia(4,2015 , 'comercial') ?>,
                        <?= $Media->GeraMedia(5,2015 , 'comercial') ?>,
                        <?= $Media->GeraMedia(6,2015 , 'comercial') ?>,
                        <?= $Media->GeraMedia(7,2015 , 'comercial') ?>,
                        <?= $Media->GeraMedia(8,2015 , 'comercial') ?>,
                        <?= $Media->GeraMedia(9,2015 , 'comercial') ?>,
                        <?= $Media->GeraMedia(10,2015 , 'comercial') ?>,
                        <?= $Media->GeraMedia(11,2015 , 'comercial') ?>,
                        <?= $Media->GeraMedia(12,2015 , 'comercial') ?>,
                    ]
                },
                {
                    name: 'Residencial Baixa Renda 2015',
                    data: [
                        <?= $Media->GeraMedia(1,2015 , 'residencial_baixa') ?>,
                        <?= $Media->GeraMedia(2,2015 , 'residencial_baixa') ?>,
                        <?= $Media->GeraMedia(3,2015 , 'residencial_baixa') ?>,
                        <?= $Media->GeraMedia(4,2015 , 'residencial_baixa') ?>,
                        <?= $Media->GeraMedia(5,2015 , 'residencial_baixa') ?>,
                        <?= $Media->GeraMedia(6,2015 , 'residencial_baixa') ?>,
                        <?= $Media->GeraMedia(7,2015 , 'residencial_baixa') ?>,
                        <?= $Media->GeraMedia(8,2015 , 'residencial_baixa') ?>,
                        <?= $Media->GeraMedia(9,2015 , 'residencial_baixa') ?>,
                        <?= $Media->GeraMedia(10,2015 , 'residencial_baixa') ?>,
                        <?= $Media->GeraMedia(11,2015 , 'residencial_baixa') ?>,
                        <?= $Media->GeraMedia(12,2015 , 'residencial_baixa') ?>,
                    ]
                },
                {
                    name: 'Residencial 2016',
                    data: [
                        <?= $Media->GeraMedia(1,2016 , 'residencial') ?>,
                        <?= $Media->GeraMedia(2,2016 , 'residencial') ?>,
                        <?= $Media->GeraMedia(3,2016 , 'residencial') ?>,
                        <?= $Media->GeraMedia(4,2016 , 'residencial') ?>,
                        <?= $Media->GeraMedia(5,2016 , 'residencial') ?>,
                        <?= $Media->GeraMedia(6,2016 , 'residencial') ?>,
                        <?= $Media->GeraMedia(7,2016 , 'residencial') ?>,
                        <?= $Media->GeraMedia(8,2016 , 'residencial') ?>,
                        <?= $Media->GeraMedia(9,2016 , 'residencial') ?>,
                        <?= $Media->GeraMedia(10,2016 , 'residencial') ?>,
                        <?= $Media->GeraMedia(11,2016 , 'residencial') ?>,
                        <?= $Media->GeraMedia(12,2016 , 'residencial') ?>,
                    ]
                },
                {
                    name: 'Comercial 2016',
                    data: [
                        <?= $Media->GeraMedia(1,2016 , 'comercial') ?>,
                        <?= $Media->GeraMedia(2,2016 , 'comercial') ?>,
                        <?= $Media->GeraMedia(3,2016 , 'comercial') ?>,
                        <?= $Media->GeraMedia(4,2016 , 'comercial') ?>,
                        <?= $Media->GeraMedia(5,2016 , 'comercial') ?>,
                        <?= $Media->GeraMedia(6,2016 , 'comercial') ?>,
                        <?= $Media->GeraMedia(7,2016 , 'comercial') ?>,
                        <?= $Media->GeraMedia(8,2016 , 'comercial') ?>,
                        <?= $Media->GeraMedia(9,2016 , 'comercial') ?>,
                        <?= $Media->GeraMedia(10,2016 , 'comercial') ?>,
                        <?= $Media->GeraMedia(11,2016 , 'comercial') ?>,
                        <?= $Media->GeraMedia(12,2016 , 'comercial') ?>,
                    ]
                },
                {
                    name: 'Residencial Baixa Renda 2016',
                    data: [
                        <?= $Media->GeraMedia(1,2016 , 'residencial_baixa') ?>,
                        <?= $Media->GeraMedia(2,2016 , 'residencial_baixa') ?>,
                        <?= $Media->GeraMedia(3,2016 , 'residencial_baixa') ?>,
                        <?= $Media->GeraMedia(4,2016 , 'residencial_baixa') ?>,
                        <?= $Media->GeraMedia(5,2016 , 'residencial_baixa') ?>,
                        <?= $Media->GeraMedia(6,2016 , 'residencial_baixa') ?>,
                        <?= $Media->GeraMedia(7,2016 , 'residencial_baixa') ?>,
                        <?= $Media->GeraMedia(8,2016 , 'residencial_baixa') ?>,
                        <?= $Media->GeraMedia(9,2016 , 'residencial_baixa') ?>,
                        <?= $Media->GeraMedia(10,2016 , 'residencial_baixa') ?>,
                        <?= $Media->GeraMedia(11,2016 , 'residencial_baixa') ?>,
                        <?= $Media->GeraMedia(12,2016 , 'residencial_baixa') ?>,
                    ]
                },
            ]
        });//Fim GráficoFour
    });
</script>