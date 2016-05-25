<?php
require_once ("../_app/Config.inc.php");
$Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$Array = array(
    'nome' => $Post['nome'],
    'sobrenome' => $Post['sobrenome'],
    'telefone' => $Post['telefone'],
    'email' => $Post['email'],
    'imprensa' => $Post['imprensa'],
    'receber_email' => $Post['receber_email'],
);

$Update = new \Conn\Update();
$Update->ExeUpdate('usuarios', $Array, "WHERE user_id = :id", "id={$Post['user_id']}");

if($Update->GetResult()){
    $_SESSION['userlogin']['nome'] = $Post['nome'];
    $_SESSION['userlogin']['sobrenome'] = $Post['sobrenome'];
    $_SESSION['userlogin']['telefone'] = $Post['telefone'];
    $_SESSION['userlogin']['email'] = $Post['email'];
    $_SESSION['userlogin']['imprensa'] = $Post['imprensa'];
    $_SESSION['userlogin']['receber_email'] = $Post['receber_email'];

    $Result = array(
        'code' => $Update->GetResult(),
        'text' => 'Seus dados foram atualizados com sucesso',
        'class' => 'label_sucesso'
    );

}else{
    $Result = array(
        'code' => $Update->GetResult(),
        'text' => 'Tivemos alguns problemas durante a atualização, tente novamente mais tarde...',
        'class' => 'label_erro'
    );

}

sleep(1);
echo json_encode($Result);