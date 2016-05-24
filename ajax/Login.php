<?php
require_once ("../_app/Config.inc.php");
$Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$Login = new \Models\Login(1);
$Login->ExeLogin($Post);
$Result = array();

if($Login->getResult()){
    $Result['code'] = $Login->getResult();
    $Result['text'] =$Login->getError();
    $Result['class'] = 'label_sucesso';
}else{
    $Result['code'] = $Login->getResult();
    $Result['text'] = $Login->getError();
    $Result['class'] = 'label_erro';
}

sleep(3);

echo json_encode($Result);