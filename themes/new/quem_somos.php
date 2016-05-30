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
    <div class="row">
        <h3 class="como_funciona">Quem Somos?</h3>
        <div class="col s12">

            <div class="col s12">
                <p> EcoLight é uma startup com objetivo de informatizar a população  sobre o consumo de energia e consequentemente ajudá-la a exercer o seu uso
                    consciente, já que hoje estamos vivendo uma crise financeira crescente.</p>

                <p>O que começou como um projeto simples de faculdade, tornou-se uma ONG com o intuito
                    de ajudar toda uma população, auxiliando de maneira prática e funcional os usuários
                    a conseguir economizar energia e, consequentemente, diminuir despesas.</p>

                <p><b>MISSÃO:</b> Conscientizar os usuários a economizar energia e despesas com uma interface simples e minimalista.</p>

                <p><b>VISÃO:</b> Ser reconhecida como uma ONG de respeito e incentivar campanhas de economia em todo o país.</p>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col s12  ">
            <h3 class="como_funciona">Nossas Caracteristicas</h3>
            <div class="col m12">
                <h5 class="como_funciona">Pensamos em sua família</h5>
                Somos uma ONG que pensa em sua familia. Queremos oferecer para você um cálculo preciso de sua conta de luz
                e outras informações para sua vida.
                <div class="divider"></div>
                <h5 class="como_funciona">Somos transparentes</h5>
                Somos TRANSPARENTES! Levamos até você toda a informação que precisa sobre
            a conta de luz em sua cidade ou estado, nosso site está carregado de informações úteis a todos.
                <div class="divider"></div>
                <h5 class="como_funciona">Você vai economizar!</h5>
                Faça um planejamento com antecedência e saiba o quanto vai gastar com a sua conta de luz. Nós te ajudaremos
                a cuidar de tudo!</div>
            </div>
        </div>

    </div>

<?php
$x = 6;
$y = 4;
$z = $x + $y;

$z = $y-- + ($z +2);
$y = ++$z +2;
//
$x *= $y;
//
$x = $x % 5;
//
$x *=5;
//
//$y = $y + (3*3+2);
//
//if($x < 30){
//    $x +=10;
//}elseif($x < 40){
//    $x +=15;
//}else{
//    $x +=2;
//}
//
//$z = ($z %10 ) + ($x -7 );

echo  '$x = '.$x .'<br>';
echo  '$y = '.$y .'<br>';
echo  '$z = '.$z .'<br>';

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
</body>
</html>