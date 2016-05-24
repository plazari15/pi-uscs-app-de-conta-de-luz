<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <link rel=icon href="<?= INCLUDE_PATH ?>/images/favicon.png" sizes="16x16" type="image/png">
    <title>Cadastro - EcoLights</title>
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

<!-- GRID -->
<?php
$Login = new \Models\Login(1);
if(!$Login->CheckLogin()){
    header("Location: ".HOME."/dashboard/login");
}
?>
<div class="container">
    <div class="row">
        <div class="col s12">
            <h4>Seus últimos 5 calculos.</h4>
            <?php
            $Read = new \Conn\Read();
            $Read->ExeRead('calculos', "WHERE user_id = :id ORDER BY data DESC", "id={$_SESSION['userlogin']['user_id']}");
            if($Read->GetResult()):
                ?>
                <table class="bordered">
                    <thead>
                    <tr>
                        <th data-field="id">Data</th>
                        <th data-field="name">kWh</th>
                        <th data-field="price">Valor</th>
                        <th data-field="price">Valor com ICMS</th>
                        <th data-field="price">Tipo de Conta</th>
                        <th data-field="price"></th>
                        <th data-field="price"></th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php foreach ($Read->GetResult() as $Calculos): extract($Calculos);?>
                        <tr id="<?= $id ?>">
                            <td><?= date('d/m/Y', strtotime($data)) ?></td>
                            <td><?= $kwh ?></td>
                            <td>R$ <?= $valor ?></td>
                            <td>R$ <?= $valor_icms ?></td>
                            <td><?= $tipo_conta ?></td>
                            <td><i class="fa <?= $compartilhar != 1 ? 'text-false' : '' ?> fa-share  tooltipped" aria-hidden="true" data-tooltip="<?= $compartilhar != 1 ? 'Não Compartilhado' : 'Compartilhado' ?>" data-position="bottom" data-delay="50"></i></td>
                            <td><i class="fa fa-trash excluir" aria-hidden="true" data-id="<?= $id ?>"></i></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>

            <?php endif; ?>

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.3/Chart.bundle.js"></script>
</body>
</html>