<?php
require '../_app/Config.inc.php';

$Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$Read = new \Conn\Read();
$Read->ExeRead('calculos', "WHERE id=:id", "id={$Post['calc']}");

if($Read->GetResult()){
        $Array = array(
            'user_id' => $Read->GetResult()[0]['user_id'],
            'kwh' => $Read->GetResult()[0]['kwh'],
            'mes' => $Read->GetResult()[0]['mes'],
            'ano' => $Read->GetResult()[0]['ano'],
        );
}

$Read->ExeRead('ranking', "WHERE user_id = :id AND mes = :mes AND ano = :ano", "id={$Array['user_id']}&mes={$Array['mes']}&ano={$Array['ano']}");

if(!$Read->GetResult()){
    $Create = new \Conn\Create();
    $Create->ExeCreate('ranking', $Array);
    if($Create->GetResult()){
        $Result = array(
            'code' => true,
            'text' => 'Prabéns! Sua participação no ranking está garantida"',
            'class' => ''
        );
    }else{
        $Result = array(
            'code' => false,
            'text' => 'Estamos com problemas em nossa base de dados.',
            'class' => ''
        );
    }
}else{
    $Result = array(
        'code' => false,
        'text' => 'Você já esta participando do ranking este mês',
        'class' => ''
    );
}
echo json_encode($Result);