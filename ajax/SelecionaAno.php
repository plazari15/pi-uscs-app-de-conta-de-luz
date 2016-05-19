<?php
require '../_app/Config.inc.php';


$Read = new \Conn\Read();
$Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$Read->ExeRead('bandeiras', "WHERE year = :year", "year={$Post['ano']}");
$Select = array();
$Result = array();
$Result = '';

//$Result['select'] = "<select id='SelecionaMes' name='mes[]' required class='browser-default SelectMesAjax'>";
if($Read->GetResult()){
    //$Result['select'] .= "<option disabled selected id='SelecioneMes'>Selecione o mês</option>";
    $Select[] = array(
        'option' => "<option value='{$mes}'>{$nome_mes}</option>",
        'nome' => 'Selecione o mês',
        'value' => '',
        'attr' => 'disabled'
    );
    foreach ($Read->GetResult() as $Ano){
        extract($Ano);
        $Select[] = array(
            'option' => "<option value='{$mes}'>{$nome_mes}</option>",
            'nome' => $nome_mes,
            'value' => $mes,
        );
    }
}else{
    //$Result['select'] .= "<option disabled selected>Nenhuma bandeira cadastrada</option>";
}

//$Result['select'] .= "</select>";
sleep(4);
echo json_encode($Select);
