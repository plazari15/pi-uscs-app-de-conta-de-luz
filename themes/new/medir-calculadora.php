
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <link rel=icon href="<?= INCLUDE_PATH ?>/images/favicon.png" sizes="16x16" type="image/png">
    <title>Calculadora - EcoLights</title>
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
    <div class="parallax"><img src="<?= INCLUDE_PATH ?>/images/calculadora.jpg"></div>
</div>

<div class="container" id="primeiro">
    <h2 class="como_funciona">Medidor de Kwh</h2>

    <div class="row">
        <div class="col s12 quem_somos_text ">
            Você não precisa esperar sua conta de luz chegar para medir a quantidade de Kwh, agora, você pode medir quantos Kwh consumiu
            lendo o seu próprio relógio, sem depender do leiturista da consecionária.<br>
            Para usar este serviço você precisa estar registrado no sistema, pois precisamos ter acesso ao valor de sua medição anterior

<!--            <p><a href="--><?//= HOME ?><!--/medir/sobre">Descubra como ler seu relógio</a></p>-->
        </div>

    <?php if (isset($_SESSION['userlogin'])):
        $Read = new \Conn\Read();
        $Read->ExeRead("usuarios", "WHERE user_id = :id", "id={$_SESSION['userlogin']['user_id']}");
        if($Read->GetResult() && $Read->GetResult()[0]['valor_medidor']){
            $Valor_Medidor = $Read->GetResult()[0]['valor_medidor'];
        }else{
            $Valor_Medidor = 'Você não cadastrou o valor da sua ultima leitura';
        }
        ?>
        
        <div class="col s12">
            <form id="medir_calculadora"  action="" class="" method="post">
                <input type="hidden" name="user_id" value="<?= isset($_SESSION['userlogin']['user_id']) ? $_SESSION['userlogin']['user_id'] : null ?>">

                <div id="Kwh" class="col s11 m6" name="kwh">
                    <label>Valor no seu medidor</label>
                    <input type="text" name="valor_medidor" id="valor_medidor" value="<?= $Valor_Medidor ?>" disabled>
                </div>

                <div id="Kwh" class="col s11 m6" name="kwh">
                    <label>Valor no seu medidor hoje</label>
                    <input type="text" name="valor_medidor_hoje" id="valor_medidor_hoje" placeholder="Valor em seu medidor hoje">
                </div>

                <div class="col s12">
                    <button class="waves-effect waves-light btn btn_blue" style="margin-top: 10%;"><i class="material-icons left">send</i>Processar</button>
                </div>
                <?php else: ?>
                <div class="col s12 ">
                    <h4>Faça login no sistema para usar este recurso</h4>
                </div>
                <?php endif; ?>

                


            </form><!-- FORM TOTAL -->
            <div id="resultado" class="col s6 offset-m3 medir_calculadora" style="display: none;"></div>

        </div><!-- COL S12 -->

</div><!-- ROW -->
</div><!-- CONTAINER -->
<!-- AQUI FIM DO FORM-->

<!-- AQUI VEM A MENSAGEM QUANDO DEU TUDO CERTO OU ERRADO" -->
<div class="container" id="segundo" style="display: none">
    <div class="row">
        <!-- EXIBINDOO A MENSAGEM -->
        <div class="col s12" >
            <h1>Aqui estão os seus resultados.</h1>
            <div id="result"></div>
                <a href="<?= HOME ?>/calculadora" title="Calculadora"><button class="waves-effect waves-light btn" style="margin-top: 10%;"><i class="material-icons left">done</i>Quero fazer um novo calculo.</button></a>
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
</html>