<?php

require '../_app/Config.inc.php';
$Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$Read = new \Conn\Read();
$Create = new \Conn\Create();
$CalculaValor = new \Own\CalculaValorContaDeLuz();
$Result = array();
function GetNomeBandeira($Code){
    switch ($Code){
        case '1':
            return 'Bandeira Verde';
        break;

        case '2':
            return 'Bandeira Amarela';
            break;

        case '3':
            return 'Bandeira Vermelha';
            break;

        case '4':
            return 'Bandeira Vermelha Patamar 2';
            break;
    }
}

$Arr = array();
for($i=0; $i < count($Post['ano']); $i++){
    if($Post['ano'][$i] OR $Post['kwh'][$i] OR $Post['mes'][$i]){
        header('HTTP/1.1 301 Você deixou campos em branco.');
    }
    $Arr[] = array(
        'consumo' => $Post['kwh'][$i],
        'ano'    => $Post['ano'][$i],
        'mes'    => $Post['mes'][$i],
        'tipo_residencia'    => $Post['tipo_residencia'][$i],
    );
}
$i=0;
foreach ($Arr as $Dados){
    //var_dump($Arr);
    $i++;
    $Read->ExeRead('bandeiras', "WHERE year = :year AND mes = :mes", "year={$Dados['ano']}&mes={$Dados['mes']}");
    $CalculaValor->CalculaConta($Dados['consumo'], $Read->GetResult()[0]['cod_bandeira'], $Dados['tipo_residencia']);
    $CalculaValorICMS = new \Own\CalculoICMS($Dados['consumo'], $Read->GetResult()[0]['cod_bandeira'], $Dados['tipo_residencia']);
    $Dados = array(
        'user_id' => $Post['user_id'],
        'kwh' => $Dados['consumo'],
        'mes' => $Dados['mes'],
        'bandeira' => $Read->GetResult()[0]['cod_bandeira'],
        'data' => date("Y-m-d"),
        'valor' => $CalculaValor->RetornaValores(),
        'valor_icms' => $CalculaValorICMS->ExibeICMS(),
        'compartilhar' => (isset($Post['ShareData']) == 1 ? $Post['ShareData'] : 0),
        'tipo_conta' => $Dados['tipo_residencia'],
        'ano'       => $Dados['ano'],
        'status'    => 1,
        'user_ip'   => hash(Cript, $_SERVER['REMOTE_ADDR'] )
    );
    $Create->ExeCreate('calculos', $Dados);

    if($Create->GetResult()){
        $Result = array(
            'calculo_id' => $Create->GetResult(),
            'code' => true,
            'mes' => $Dados['mes'],
            'bandeira' => $Read->GetResult()[0]['cod_bandeira'],
            'valor' =>$CalculaValor->RetornaValores(),
            'valor_icms' => $CalculaValorICMS->ExibeICMS(),
        );
    }

    if($CalculaValor->RetornaSemFormato() == 0){
        header('HTTP/1.1 301 Existem campos inválidos.');
    }

}

sleep(2);
echo json_encode($Result);