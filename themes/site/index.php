<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Index</title>

  <link rel="stysheet" href="<?= INCLUDE_PATH ?>/assets/css/main.css">
  <link href="<?= INCLUDE_PATH ?>/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= INCLUDE_PATH ?>/css/grayscale.css" rel="stylesheet">
  <link href="<?= INCLUDE_PATH ?>/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

  <header class="intro">
    <video muted autoplay loop class="bg_video">
      <source src="<?= INCLUDE_PATH ?>/assets/vid/bulb.mp4" type="video/mp4">
      </video>
      <div class="intro-body">
        <div class="container">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <form role="form" class="form1" action="login.php" method="post">
                <h1>Consumo De Energia Elétrica</h1>
                <input class="form-control" type="text" name="name" placeholder="Nome Completo"><br>
                <input class="form-control" type="number" name="cpf" placeholder="CPF"><br>
                <select class="form-control">
                  <option>
                    Tipo de Domicílio
                  </option>
                  <option>
                    Casa
                  </option>
                  <option>
                    Apartamento
                  </option>
                </select><br>
                <input class="btn btn-default" type="submit" name="Entrar" value="Entrar">
              </form>
              <a href="#about" class="btn btn-circle page-scroll" style="color:#000; border: #000 solid">
                <i class="fa fa-angle-double-down animated"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </header>

    <section id="about" class="container content-section text-center">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <p>
            O  consumo de energia  elétrica  brasileiro chegou ao limite da capacidade instalada, agravado
            pelo período de seca mais extensa e não previsto pelos agentes econômicos no ano de 2015.
          </p>
          <p>
            Divulgado em março de 2015,  o relatório  de  Informações Gerenciais da ANEEL  registrou
            que apenas 66%, ou o equivalente a 89.813.109kW do consumo do país é produzido de fontes
            hidrelétricas.
          </p>
          <p>
            Com  o crescimento das indústrias devido aos incentivos para o  consumo interno juntamente
            com a crise hídrica, levaram ao uso de outras fontes energéticas mais caras, as termelétricas,
            cujo custo não estava previsto na equação do consumo estável brasileiro.
          </p>
        </div>
      </div>
    </section>

    <section id="line01" class="content-section">
      <div class="line01-section">
        <div class="container">
          <div class="col-lg-8 col-lg-offset-2">
          </div>
        </div>
      </div>
    </section>

    <section id="contact" class="container content-section text-center">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <p>
            Segundo  a  Resolução  Normativa  nº.  547/13  da  Agência  Nacional  de  Energia  Elétrica  –
            ANEEL,  as  contas  de  energia  devem  ser  faturadas  de  acordo  com  o  Sistema  de  Bandeiras
            Tarifárias.
          </p>
          <p>
            As bandeiras  determinam  se a energia custará mais ou menos, em função das condições de
            geração de eletricidade. O sistema possui  quatro  classificações de bandeiras:  Verde,  Amarela
            e Vermelha Patamar 1 e Vermelha Patamar 2.
          </p>
          <p>
            O acionamento de cada bandeira tarifária  é  sinalizado mensalmente pela ANEEL, de acordo
            com  informações  prestadas  pelo  Operador  Nacional  do  Sistema  –  ONS,  conforme  a
            capacidade de geração de energia elétrica do país.
          </p>
        </div>
      </div>
    </section>

    <section id="line02" class="content-section">
      <div class="line02-section">
        <div class="container">
          <div class="col-lg-8 col-lg-offset-2">
          </div>
        </div>
      </div>
    </section>

    <section id="table" class="container content-section text-center">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <table>
            
          </table>
        </div>
      </div>
    </section>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/grayscale.js"></script>

  </body>

  </html>
