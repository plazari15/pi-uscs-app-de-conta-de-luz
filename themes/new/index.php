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


    <?php
    $data = array(
        array('2001',  60,  35,  20),
        array('2002',  65,  30,  30),
        array('2003',  70,  25,  40),
        array('2004',  72,  20,  60),
        array('2005',  75,  15,  70),
        array('2006',  77,  10,  80),
        array('2007',  80,   5,  90),
        array('2008',  85,   4,  95),
        array('2009',  90,   3,  98),
    );
    $p = new PHPlot(800, 400);

    # Use TrueType fonts:
   // $p->SetDefaultTTFont('./arial.ttf');

    # Set the main plot title:
    $p->SetTitle('PHPlot Customer Satisfaction (estimated)');

    # Select the data array representation and store the data:
    $p->SetDataType('text-data');
    $p->SetDataValues($data);

    # Select the plot type - bar chart:
    $p->SetPlotType('bars');

    # Define the data range. PHPlot can do this automatically, but not as well.
    $p->SetPlotAreaWorld(0, 0, 9, 100);

    # Select an overall image background color and another color under the plot:
    $p->SetBackgroundColor('#ffffcc');
    $p->SetDrawPlotAreaBackground(True);
    $p->SetPlotBgColor('#ffffff');

    # Draw lines on all 4 sides of the plot:
    $p->SetPlotBorderType('full');

    # Set a 3 line legend, and position it in the upper left corner:
    $p->SetLegend(array('Features', 'Bugs', 'Happy Users'));
    $p->SetLegendWorld(0.1, 95);

    # Turn data labels on, and all ticks and tick labels off:
    $p->SetXDataLabelPos('plotdown');
    $p->SetXTickPos('none');
    $p->SetXTickLabelPos('none');
    $p->SetYTickPos('none');
    $p->SetYTickLabelPos('none');

    # Generate and output the graph now:
    $p->DrawGraph();

    ?>




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
<script>
    var ctx = document.getElementById("myChart").getContext("2d");
    ctx.canvas.width = 300;
    ctx.canvas.height = 300;
    var data = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [
            {
                label: "My First dataset",
                fill: false,
                lineTension: 0.2,
                backgroundColor: "rgba(75,192,192,0.4)",
                borderColor: "rgba(75,192,192,1)",
                borderCapStyle: 'butt',
                borderDash: [],
                borderDashOffset: 0.0,
                borderJoinStyle: 'miter',
                pointBorderColor: "rgba(75,192,192,1)",
                pointBackgroundColor: "#fff",
                pointBorderWidth: 1,
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(75,192,192,1)",
                pointHoverBorderColor: "rgba(220,220,220,1)",
                pointHoverBorderWidth: 2,
                pointRadius: 1,
                pointHitRadius: 10,
                data: [65, 59, 80, 81, 56, 55, 40],
            }
        ]
    };

    new Chart(ctx, {
        type: 'line',
        responsive: true,
        data: data,
    });
</script>