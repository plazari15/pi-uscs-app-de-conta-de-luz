<?php
/**
 * Esse é o BOT que o Pedro Criou para isso tudo!
 */
require_once '../_app/Config.inc.php';

$BemVindo = array(
    'text' => 'Olá, Tudo bem?'
);

$Respostas = array(
    'welcome:' => $BemVindo,
    '%Olá%' => [
        'Olá, tudo bem?',
        'Meu nome é EcoBot :)',
        'Eu sou parte de um Projeto Integrado para o grupo do primeiro semestre',
        'Eu fui programado para ajudar você a calcular a sua conta de luz de forma rápida e fácil, sem que você gaste tempo de sua vida com isso,
        é por isso que pode conversar comigo em qualquer lugar',
        'Se você se sentir sozinho, podemos conversar também, rsrs',
        'Devo alertar que eu nunca irei obter nenhum dado seu sem sua devida autorização.'

    ],
    '%tchau%' => 'Mas você ja vai? Bom, espero poder ve-lo em breve novamente!',
);




$Bot = new FacebookMessengerBot($Respostas);
$Bot->answers('%ajuda%', array(
    'Percebi que esta precisando de ajuda, deixa eu ver o que eu posso fazer por você.',
    'Vou te passar uma lista de comandos',
    'Se você quiser, pode me perguntar algumas coisas bem legais que eu vou te responder..',
    'Para saber qual a bandeira de algum mês especifico me pergunte "Qual a bandeira de X", onde X é o mes que deseja saber',
    'Se quiser me perguntar a bandeira deste mes, so dizer por exemplo "qual a bandeira deste mes"',
    'Se quiser que eu calcule quantos reais vai pagar de conta de luz me diga "Meu consumo foi de X", onde X é o seu consumo em kWh'
));
$Bot->answers('Não', "Eu posso ser seu conselheiro pessoal na hora de falarmos de energia elétrica. Por exemplo me pergunte a bandeira deste mês");
$Bot->answers('Sim', "Então me pergunte alguma coisa, poxa!");

$Bot->answers('Você foi ao banheiro hoje?', 'Fui! Mas não precisamos entrar nesses detalhes ;P');

$Bot->answers('regex:/Qual a bandeira de .*/i', function($answer){
    /** @var $answer FacebookMessageResponse */
    $received = $answer->getFacebookMessageReceived()->getText();
    $Mes = substr($received, 19);
    $Bandeira = new \Own\DescobreBandeiraMes($Mes);
    $answer->response("A bandeira de {$Mes} é {$Bandeira->GetResult()}");
});

$Bot->answers('%bandeira deste%', function($answer){
    /** @var $answer FacebookMessageResponse */

    $Bandeira = new \Own\DescobreBandeiraMes(date('F'));
    $answer->response("A bandeira deste mês é {$Bandeira->GetResult()}");
});

$Bot->answers('regex:/Meu consumo foi de .*/i', function($answer){
    /** @var $answer FacebookMessageResponse */
    $received = $answer->getFacebookMessageReceived()->getText();
    $kwh = substr($received, 19);
    $Bandeira = new \Own\DescobreBandeiraMes(date('F'));
    $KWh = new \Own\CalculaValorContaDeLuz();
    $KWh->CalculaConta($kwh, $Bandeira->GetCode(), 'residencial');
    $answer->response(
        "Tomei a liberdade de realizar o calculo em tipo residencial. Você consumiu este mês R$ {$KWh->RetornaValores()}.
        Infelizmente eu não posso armazenar este calculo em sua conta, ainda!
        Para calcular outros meses, ou registrar esse calculo em seu site, acesse, http://pedro-test.com"
    );
});

$Bot->answers("default:", "Desculpe, eu ainda estou meio burro e não sei muito o que fazer, me peça 'ajuda' que eu te falo melhor os meus comandos.");
$Bot->run();