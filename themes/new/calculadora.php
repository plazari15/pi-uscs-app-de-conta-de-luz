<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
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

<div class="container">
    <h2 class="como_funciona">Calculadora</h2>

    <div class="row">
        <div class="col s12 quem_somos_text ">
            Chegou a hora de verificar o seu custo de energia elétrica. Nosso site irá te ajudar com isso ao longo de
            todo o processo, no final, você poderá nos ajudar e publicar o resultado de sua conta em nosso gráfico geral,
            não se esqueça de fazer o cadastro para registrar tudo!
        </div>


        <div class="col s12">
            <form id="" action="" class="" method="post">
                <div class="col s11 m6 ">
                    <label>Selecione o Ano</label>
                    <select id="SelecionaAno" class="browser-default">
                        <option selected disabled>Selecione o ano</option>
                        <?php
                        for ($Ano = 2015; $Ano <= date('Y'); $Ano++):
                            ?>
                            <option value="<?= $Ano ?>"><?= $Ano ?></option>
                        <?php endfor; ?>
                    </select>


                </div>

                <div id="SelectMes" class="col s11 m6 " style="display: none;">
                    <select id="SelecionaMes" class="browser-default">
                        <option selected disabled>Selecione o Mês</option>
                    </select>
                </div>
            </form>

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