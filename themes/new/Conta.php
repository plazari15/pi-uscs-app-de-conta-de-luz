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
<div class="container">
    <div class="row">
        <div class="col s12">
            <h3>Edite seu Cadastro</h3>
            <p>Realize um cadastro para ter um completo acesso ao sistema</p>
        </div>
        <?php
            $Read = new \Conn\Read();
            $Read->ExeRead('usuarios', "WHERE user_id = :id", "id={$_SESSION['userlogin']['user_id']}" );
        ?>
        <form class="col s12 FormCadastroEdit" action="" method="post">
            <div class="row">
                <input type="hidden" name="user_id" value="<?= $_SESSION['userlogin']['user_id'] ?>">
                <div class="input-field col s6">
                    <input  name="nome" id="first_name" type="text" class="validate" value="<?= $Read->GetResult()[0]['nome'] ?>">
                    <label for="first_name">Nome</label>
                </div>
                <div class="input-field col s6">
                    <input id="last_name" name="sobrenome" type="text" class="validate" value="<?= $Read->GetResult()[0]['sobrenome'] ?>">
                    <label for="last_name">Sobrenome</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input id="last_name" name="telefone" type="text" class="validate" value="<?= $Read->GetResult()[0]['telefone'] ?>">
                    <label for="last_name">Telefone</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="email" type="email"  name="email" class="validate" value="<?= $Read->GetResult()[0]['email'] ?>">
                    <label for="email">Email</label>
                </div>
            </div>

            <div class="row">
                <div class="switch col s3">
                    Sou veículo de imprensa:<br>
                    <label>
                        Não
                        <input type="checkbox" name="imprensa" value="1" <?= $Read->GetResult()[0]['imprensa'] == 1 ? 'checked' : '' ?>>
                        <span class="lever"></span>
                        Sim
                    </label>
                </div>


                <div class="switch">
                    Quero receber Email:<br>
                    <label>
                        Não
                        <input type="checkbox" name="receber_email" value="1" <?= $Read->GetResult()[0]['receber_email'] == 1 ? 'checked' : '' ?>>
                        <span class="lever"></span>
                        Sim
                    </label>
                </div>
            </div>

            <div class="row" style="text-align: center">
               <button class="waves-effect waves-light btn">Atualizar Dados</button>
            </div>
        </form>
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