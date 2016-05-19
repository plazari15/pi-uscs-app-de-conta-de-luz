<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <link rel=icon href="<?= INCLUDE_PATH ?>/images/favicon.png" sizes="16x16" type="image/png">
    <title>EcoLights</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?= INCLUDE_PATH ?>/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="<?= INCLUDE_PATH ?>/css/principal.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="<?= INCLUDE_PATH ?>/font-awesome/css/font-awesome.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <style type="text/css">
        ${demo.css}
    </style>
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
                <h3>Calcule a sua conta de luz!</h3>
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


    <div class="col s12 m4">
        <h2 class="center">Gráfico de Consumo</h2>
        <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
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
<!--<script src="--><?//= INCLUDE_PATH ?><!--/library/hightcharts/js/modules/exporting.js"></script>-->
    <script type="text/javascript">
        $(function () {
            $('#container').highcharts({
                title: {
                    text: 'Consumo de Energia',
                    x: -20 //center
                },
                subtitle: {
                    text: 'Gráfico gerado com a ajuda de nossos usuários',
                    x: -20
                },
                xAxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                        'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                },
                yAxis: {
                    title: {
                        text: 'Concumo (kWh)'
                    },
                    plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
                },
                tooltip: {
                    valueSuffix: '°C'
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle',
                    borderWidth: 0
                },
                series: [{
                    name: 'Residencial',
                    data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
                }, {
                    name: 'Comercial',
                    data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
                }, {
                    name: 'Residencial Baixa Renda',
                    data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
                }]
            });
        });
    </script>

</body>
</html>