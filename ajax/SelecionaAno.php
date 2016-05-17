<?php
require '../_app/Config.inc.php';


$Read = new \Conn\Read();
$Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$Read->ExeRead('bandeiras', "WHERE year = :year", "year={$Post['ano']}");
$Result = array();
$Result['select'] = "<select id='SelecionaMes' name='mes[]' required class='browser-default'>";
if($Read->GetResult()){
    $Result['select'] .= "<option disabled selected>Selecione o mês</option>";
    foreach ($Read->GetResult() as $Ano){
        extract($Ano);
        $Result['select'] .= "<option value='{$mes}'>{$nome_mes}</option>";
    }
}else{
    $Result['select'] .= "<option disabled selected>Nenhuma bandeira cadastrada</option>";
}

$Result['select'] .= "</select>";
sleep(4);
echo json_encode($Result);
