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
    <h2 class="como_funciona">Calculadora</h2>

    <div class="row">
        <div class="col s12 quem_somos_text ">
            Chegou a hora de verificar o seu custo de energia elétrica. Nosso site irá te ajudar com isso ao longo de
            todo o processo, no final, você poderá nos ajudar e publicar o resultado de sua conta em nosso gráfico geral,
            não se esqueça de fazer o cadastro para registrar tudo!
        </div>


        <div class="col s12">
            <form id="calculadora"  action="" class="" method="post">
                <?php for($i=1; $i <= 1; $i++): ?>
                    <div id="BlocoClonador" style="margin-top: 3%;" class="col s12">
                    <div class="col s11 m3 ">
                        <label>Selecione o Ano</label>
                        <select name="ano[]" class="browser-default SelecionaAnoAjax" required>
                            <option selected disabled>Selecione o ano</option>
                            <?php
                            for ($Ano = 2015; $Ano <= date('Y'); $Ano++):
                                ?>
                                <option value="<?= $Ano ?>"><?= $Ano ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>

                    <div id="SelectMes" class="col s11 m3">
                        <label>Selecione o Mês</label>
                        <select id="SelecionaMes" name="mes[]" class="browser-default SelectMesAjax" required>
                            <option selected disabled data-id="SelecioneMes">Selecione o Mês</option>
                        </select>
                    </div>

                    <div id="Kwh" class="col s11 m3 " name="kwh[]">
                        <label>Tipo Residencia</label>
                        <select id="Tipo_Residencia" disabled name="tipo_residencia[]" class="browser-default TipoResidencia" required>
                            <option selected disabled>Selecione o Tipo</option>
                            <option value="residencia">Residencia</option>
                            <option value="comercial">Comercial</option>
                            <option value="residencial_baixa">Residencia Baixa Renda</option>
                        </select>
                    </div>

                    <div id="Kwh" class="col s11 m3" name="kwh[]">
                        <label>kWh Consumidos.</label>
                        <input type="number" disabled name="kwh[]"  class="KwhConsumido" placeholder="Insira os kWh"/>
                    </div>

                </div><!-- FIM DO BLOCO CLONADOR -->
                <?php endfor; ?>




                <!-- DADOS GERAIS DO FORM PERTINENTE A TODOS -->
                <div class="col s12" style="margin-top: 5%">
                    <div class="switch" >
                        Compartilhar resultados:
                        <label>
                            Off
                            <input type="checkbox" name="ShareData" value="1">
                            <span class="lever"></span>
                            On
                        </label>
                    </div>
                </div>


                <div class="col s12">
                    <button class="waves-effect waves-light btn" style="margin-top: 10%;"><i class="material-icons left">send</i>Processar</button>
                </div>
                


            </form><!-- FORM TOTAL -->

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