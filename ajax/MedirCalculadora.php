<?php
require_once ("../_app/Config.inc.php");
$Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if(empty($Post['valor_medidor_hoje']) OR empty($Post['valor_medidor']) OR empty($Post['user_id']) ){
    $Result = array(
        'code' => false,
        'class' => 'label_erro',
        'text' => "Você precisa enviar algum dado",
    );
    echo json_encode($Result);
    exit;
}
$ValorKwh = $Post['valor_medidor_hoje'] - $Post['valor_medidor'];


$Update = new \Conn\Update();
$Update->ExeUpdate('usuarios', array('valor_medidor' => $Post['valor_medidor_hoje']), "WHERE user_id = :id" , "id={$Post['user_id']}");

if($Update->GetResult()){
    $Result = array(
        'code' => true,
        'kwh' => $ValorKwh,
        'class' => 'label_sucesso',
        'text' => "Até o momento você consumiu {$ValorKwh} kWh",
        'new' => $Post['valor_medidor_hoje']
    );
}else{
    $Result = array(
        'code' => false,
        'class' => 'label_erro',
        'text' => "Não foi possível calcular e armazenar o seu consumo até o momento"
    );
}

echo json_encode($Result);