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
            <h3>Realize seu cadastro</h3>
            <p>Realize um cadastro para ter um completo acesso ao sistema</p>
        </div>
        <form class="col s12 FormCadastro" action="" method="post">
            <div class="row">
                <div class="input-field col s6">
                    <input  name="nome" id="first_name" type="text" class="validate">
                    <label for="first_name">Nome</label>
                </div>
                <div class="input-field col s6">
                    <input id="last_name" name="sobrenome" type="text" class="validate">
                    <label for="last_name">Sobrenome</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input id="last_name" name="telefone" type="text" class="validate">
                    <label for="last_name">Telefone</label>
                </div>

                <div class="input-field col s6">
                    <input id="password" type="password" name="password" class="validate">
                    <label for="password">Password</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input id="email" type="email"  name="email" class="validate">
                    <label for="email">Email</label>
                </div>

                <div class="input-field col s6">
                    <input id="email" type="text"  name="token" class="validate" placeholder="Insira uma chave de recuperação" length="6">
                    <label for="email">Token Mestre (Use-o para recuperar sua senha)</label>
                </div>
            </div>

            <div class="row">
                <div class="switch col s3">
                    Sou veículo de imprensa:<br>
                    <label>
                        Não
                        <input type="checkbox" name="imprensa" value="1">
                        <span class="lever"></span>
                        Sim
                    </label>
                </div>


                <div class="switch">
                    Quero receber Email:<br>
                    <label>
                        Não
                        <input type="checkbox" name="receber_email" value="1">
                        <span class="lever"></span>
                        Sim
                    </label>
                </div>
            </div>

            <div class="row" style="text-align: center">
               <button class="waves-effect waves-light btn">Cadastrar</button>
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