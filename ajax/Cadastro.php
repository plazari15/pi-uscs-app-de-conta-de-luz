<?php
require '../_app/Config.inc.php';

$Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$Read = new \Conn\Read();
$Read->ExeRead('usuarios', "WHERE email = :email", "email={$Post['email']}");
$Result = array();
if($Read->GetResult()){
        $Result['text'] =  'Uma conta com este email já foi criada';
        $Result['class'] =  'label_erro';
}else{
    $Cadastro = new \Own\CadastroUsuario($Post);
    if($Cadastro->CriarConta()){
        $Result['text'] =  'Conta criada com sucesso';
        $Result['class'] =  'label_sucesso';
    }else{
        $Result['text'] =  'Erro ao criamos uma conta para você';
        $Result['class'] =  'label_erro';
    }
}
sleep(2);
echo json_encode($Result);

