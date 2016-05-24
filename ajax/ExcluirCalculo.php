<?php
require_once ("../_app/Config.inc.php");
$Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);

switch ($Post['action']){
    case 'pre-excluir':
        $Update = new \Conn\Update();
        $Update->ExeUpdate("calculos", array('status' => 2), "WHERE id = :id", "id={$Post['id']}");
        if($Update->GetResult()){
            $Result = array(
                'code' => $Update->GetResult(),
                'action' => 'delete',
                'class' => 'label_sucesso',
                'text' => 'Calculo movido com sucesso',
                'status' => 'disable'
            );
        }else{
            $Result = array(
                'code' => $Update->GetResult(),
                'class' => 'label_erro',
                'action' => 'delete',
                'text' => 'Erro ao mover o calculo',
                'status' => 'disable'
            );
        }
        break;

    case 'desfaz-excluir':
        $Update = new \Conn\Update();
        $Update->ExeUpdate("calculos", array('status' => 1), "WHERE id = :id", "id={$Post['id']}");
        if($Update->GetResult()){
            $Result = array(
                'code' => $Update->GetResult(),
                'class' => 'label_sucesso',
                'action' => 'undo',
                'text' => 'Calculo movido com sucesso',
                'status' => 'disable'
            );
        }else{
            $Result = array(
                'code' => $Update->GetResult(),
                'class' => 'label_erro',
                'action' => 'undo',
                'text' => 'Erro ao mover o calculo',
                'status' => 'disable'
            );
        }
        break;
}


sleep(1);
echo json_encode($Result);