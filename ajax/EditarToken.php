<?php
require_once ("../_app/Config.inc.php");
$Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$Array = array(
    'token' => hash(Cript, $Post['token'])
);

$Update = new \Conn\Update();
$Update->ExeUpdate('usuarios', $Array, "WHERE user_id = :id", "id={$Post['user_id']}");

if($Update->GetResult()){
    $_SESSION['userlogin']['token'] = hash(Cript, $Post['token']);

    $Result = array(
        'code' => $Update->GetResult(),
        'text' => 'Seu token foi atualizado com sucesso',
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