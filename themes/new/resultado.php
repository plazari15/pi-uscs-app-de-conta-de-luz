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
    <div class="parallax"><img src="<?= INCLUDE_PATH ?>/images/resultado.jpg"></div>
</div>
<?php
function GetNomeBandeira($Code){
    switch ($Code){
        case '1':
            return 'Bandeira Verde';
            break;

        case '2':
            return 'Bandeira Amarela';
            break;

        case '3':
            return 'Bandeira Vermelha';
            break;

        case '4':
            return 'Bandeira Vermelha Patamar 2';
            break;
    }
}
    $IP = hash(Cript, $_SERVER['REMOTE_ADDR'] );
    $Read = new \Conn\Read();
    $Read->ExeRead('calculos', "WHERE id = :id AND user_ip = :ip", "id={$_GET['id']}&ip={$IP}");
    if(!$Read->GetResult()):
        ?>
        <div class="container" id="primeiro">
            <h2 class="como_funciona">Opsss... :(</h2>

            <div class="row">
                <div class="col s12 quem_somos_text ">
                    Você não pode visualizar este calculo, ele não pertence a você.
                </div>



            </div>
        </div>
    <?php
    else:
?>
<div class="container" id="primeiro">
    <h2 class="como_funciona">Resultado de seu Calculo</h2>

    <div class="row">
        <div class="col s12 quem_somos_text ">
            No mês <?= $Read->GetResult()[0]['mes'] ?>, você consumiu <?= $Read->GetResult()[0]['kwh'] ?> kWh.
        </div>
            <?php
            if(isset($_SESSION['userlogin'])){
                $MenorValor = new \Conn\Read();
                $MenorValor->ExeRead('calculos', "WHERE user_id = :id  ORDER BY kwh ASC LIMIT :limit", "id={$_SESSION['userlogin']['user_id']}&limit=1");


                $MaiorValor = new \Conn\Read();
                $MaiorValor->ExeRead('calculos', "WHERE user_id = :id  ORDER BY kwh DESC LIMIT :limit", "id={$_SESSION['userlogin']['user_id']}&limit=1");

            }

            ?>

        <table>
            <thead>
            <tr>
                <th data-field="id">Mês / Ano</th>
                <th data-field="name">kWh</th>
                <th data-field="name">Bandeira</th>
                <th data-field="price">Valor</th>
                <th data-field="price">Valor com Imposto</th>
                <?php if( isset($_SESSION['userlogin']) ): ?>
                    <th data-field="price">Menor Valor Histórico</th>
                    <th data-field="price">Maior Valor Histórico</th>
                <?php endif; ?>
            </tr>
            </thead>

            <tbody>
            <tr>
                <td><?= $Read->GetResult()[0]['mes'] ?> / <?= $Read->GetResult()[0]['ano'] ?></td>
                <td><?= $Read->GetResult()[0]['kwh'] ?></td>
                <td><?= GetNomeBandeira($Read->GetResult()[0]['bandeira']) ?></td>
                <td>R$ <?= $Read->GetResult()[0]['valor'] ?></td>
                <td>R$ <?= $Read->GetResult()[0]['valor_icms'] ?></td>
                <?php if( isset($_SESSION['userlogin']) ): ?>
                    <th data-field="price"><?= $MenorValor->GetResult()[0]['kwh'] ?> kWh em  <?= date('d/m/Y', strtotime($MenorValor->GetResult()[0]['data'])) ?></th>
                    <th data-field="price"><?= $MaiorValor->GetResult()[0]['kwh'] ?> kWh em  <?= date('d/m/Y', strtotime($MaiorValor->GetResult()[0]['data'])) ?></th>
                <?php endif; ?></tr>
            </tbody>
        </table>


</div>
<!--    <div class="divider"></div>-->
<!--    <p>Agora que você já sabe o quanto economizou, poste uma foto em seu instagram com a <b>#EuEconomizoUSCS</b> e mostre o quão feliz-->
<!--    você esta com esta economia :)</p>-->
<!--    </div>-->
    <!-- Aqui ia o insta*/ -->
<?php endif; ?>
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