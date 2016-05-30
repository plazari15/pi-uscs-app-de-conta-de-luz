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
?>
<!-- header-->
<div class="parallax-container">
    <div class="parallax"><img src="<?= INCLUDE_PATH ?>/images/ranking.jpg"></div>
</div>

<div class="container">
    <h2 class="como_funciona">Ranking da Economia</h2>
    <p>O Ranking da Economia é uma campanha da EcoLight em parceria com a Philips e o Grupo Promon projetos de infra-estrutura
        para recompensar o consumidor conciente de energia elétrica. Ou seja a cada medição inserida em nosso site, faremos a média mensal,
        sua média mensal será exibida junto com os outros usuários, ao fim do mês, você que ficar entre os três primeiros lugares receberá
        um prêmio.</p>
    <p>Você pode participar do nosso ranking e ganhar muitos prêmios, para isso, basta <a href="<?= HOME ?>/cadastro">cadastrar-se</a> em nosso
    site e enviar suas contas de luz usando nossa <a href="<?= HOME ?>/calculadora">Calculadora</a>. Após o envio do Cálculo, vá em seu painel
    de controle na página <b>Meu Ranking</b> e selecione a conta de luz que deseja enviar. Você pode enviar apenas uma vez e não
    pode alterar após o envio.</p>
</div>

<div class="container">
    <table class="bordered">
        <thead>
        <tr>
            <th data-field="id">Colocação</th>
            <th data-field="id">Nome</th>
            <th data-field="id">Sobrenome</th>
            <th data-field="name">kWh</th>
            <th data-field="name"></th>
        </tr>
        </thead>

        <tbody>
        <?php
        $Read = new \Conn\Read();
        $mes = date('n');
        $ano = date('Y');
        $i = 0;
        $Read->ExeRead("ranking", "WHERE mes = :mes AND ano = :ano order by kwh ASC", "mes={$mes}&ano={$ano}");
        foreach ($Read->GetResult() as $User){
            extract($User);
            $Read->ExeRead('usuarios', "WHERE user_id = :id", "id={$user_id}");
            $i++;
            ?>
            <tr>
                <td><?= $i ?>º</td>
                <td><?= $Read->GetResult()[0]['nome'] ?></td>
                <td><?= $Read->GetResult()[0]['sobrenome'] ?></td>
                <td><?= $kwh ?></td>
                <td>
                    <?php
                        if($i == 1){
                            echo '<i style="color: #ffd700" class="fa fa-certificate tooltipped" data-position="bottom" data-delay="50" data-tooltip="Primeiro Lugar" aria-hidden="true"></i>';
                        }elseif($i == 2){
                            echo '<i style="color: #c0c0c0 " class="fa fa-certificate tooltipped" data-position="bottom" data-delay="50" data-tooltip="Segundo Lugar" aria-hidden="true"></i>';
                        }elseif($i == 3){
                            echo '<i style="color: #cd7f32 " class="fa fa-certificate tooltipped" data-position="bottom" data-delay="50" data-tooltip="Terceiro Lugar" aria-hidden="true"></i>';
                        }
                    ?>
                </td>
            </tr>
        <?php
        }
        ?>


        </tbody>
    </table>
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
