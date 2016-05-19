<?php

require '../_app/Config.inc.php';
$Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$Read = new \Conn\Read();
$Create = new \Conn\Create();
$CalculaValor = new \Own\CalculaValorContaDeLuz();
$Result = array();

$Arr = array();
for($i=0; $i < count($Post['ano']); $i++){
    $Arr[] = array(
        'consumo' => $Post['kwh'][$i],
        'ano'    => $Post['ano'][$i],
        'mes'    => $Post['mes'][$i],
    );
}
$i=0;
foreach ($Arr as $Dados){
    $i++;
    $Read->ExeRead('bandeiras', "WHERE year = :year AND mes = :mes", "year={$Dados['ano']}&mes={$Dados['mes']}");
    $CalculaValor->CalculaConta($Dados['consumo'], $Read->GetResult()[0]['cod_bandeira'], 'residencial');
    $Dados = array(
        'kwh' => $Dados['consumo'],
        'mes' => $Dados['mes'],
        'bandeira' => $Read->GetResult()[0]['cod_bandeira'],
        'data' => date("Y-m-d"),
        'valor' => $CalculaValor->RetornaValores(),
        'compartilhar' => (isset($Post['ShareData']) == 1 ? $Post['ShareData'] : 0)
    );
    $Create->ExeCreate('calculos', $Dados);

    if($Create->GetResult()){
        $Result[] = array(
            'code' => true,
            'mes' => $Dados['mes'],
            'bandeira' => $Read->GetResult()[0]['cod_bandeira'],
            'valor' =>$CalculaValor->RetornaValores()
        );
    }

    if($CalculaValor->RetornaSemFormato() == 0){
        header('HTTP/1.1 301 Existem campos inválidos.');
    }

}

sleep(2);
echo json_encode($Result);