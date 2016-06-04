<?php
/**
 * Esse é o BOT que o Pedro Criou para isso tudo!
 */
require_once '../_app/Config.inc.php';

$BemVindo = array(
    'text' => 'Olá, Tudo bem?'
);
$help_text = array(
    'text' => 'Vamos ver tudo o que você pode fazer comigo. A qualquer momento, você pode me perguntar a bandeira deste mês,
    basta digitar "Qual a bandeira de ", se quiser que eu calcule o valor de sua conta, me pergunte "Quanto vou pagar? consumi X".'
);

$Respostas = array(
    'welcome:' => $BemVindo,
    '%hello%' => 'Oi, Você sabe tudo o que eu posso fazer?',
    'ajuda' => $help_text,
    'help-consumo' => 'Posso te ajudar a calcular seu consumo, digite "Quanto vou pagar? consumi X", substitua X pelo valor de kWh',
    'help-mes' => "Me pergunte a bandeira deste mês, \"Qual a bandeira de X\", substitua X pelo mes"
);




$Bot = new FacebookMessengerBot($Respostas);

$Bot->answers('Não', "Eu posso ser seu conselheiro pessoal na hora de falarmos de energia elétrica. Por exemplo me pergunte a bandeira deste mês");
$Bot->answers('Sim', "Então me pergunte alguma coisa, poxa!");

$Bot->answers('regex:/Qual a bandeira de .*/i', function($answer){
    /** @var $answer FacebookMessageResponse */
    $received = $answer->getFacebookMessageReceived()->getText();
    $Mes = substr($received, 19);
    $Bandeira = new \Own\DescobreBandeiraMes($Mes);
    $answer->response("A bandeira de {$Mes} é {$Bandeira->GetResult()}");
});
$Bot->answers("default:", "Desculpe, ainda sou meio burro e não consegui entender o que disse. digite 'help' para ter minha ajuda");
$Bot->run();