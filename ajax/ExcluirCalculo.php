<?php
require_once ("../_app/Config.inc.php");
$Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$Delete = new \Conn\Delete();
$Delete->ExeDelete('calculos',"WHERE id = :id" , "id={$Post['id']}");

if($Delete->GetResult()){
    $Result = array(
        'code' => $Delete->GetResult(),
        'class' => 'label_sucesso',
        'text' => 'Calculo excluído com sucesso',
        'status' => 'disable'
    );
}else{
    $Result = array(
        'code' => $Delete->GetResult(),
        'class' => 'label_erro',
        'text' => 'Erro ao excluir o cálculo',
        'status' => 'disable'
    );
}
sleep(2);
echo json_encode($Result);