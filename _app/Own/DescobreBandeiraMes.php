<?php
/**
 * Created by PhpStorm.
 * User: Plazari
 * Date: 04/06/2016
 * Time: 03:14
 */

namespace Own;


use Conn\Read;

class DescobreBandeiraMes
{
    protected $Mes;
    protected $NumMes;
    public $Ret;

    function __construct($Mes)
    {
        $this->Mes = $Mes;
        $this->TransformMes();
        $this->GetBandeira();
    }

    public function GetResult(){
        return $this->Ret;
    }

    protected function TransformMes(){
        switch ($this->Mes){

            case 'Janeiro' || 'janeiro':
                $this->NumMes = '1';
                break;

            case 'Fevereiro' || 'fevereiro':
                $this->NumMes = '2';
                break;

            case 'Março' || 'março':
                $this->NumMes = '3';
                break;

            case 'Abril' || 'abril':
                $this->NumMes = '4';
                break;

            case 'Maio' || 'maio':
                $this->NumMes = '5';
                break;

            case 'Junho' || 'junho':
                $this->NumMes = '6';
                break;

            case 'Julho' || 'julho':
                $this->NumMes = 7;
                break;

            case 'Agosto' || 'agosto':
                $this->NumMes = 8;
                break;

            case 'Setembro' ||'setembro':
                $this->NumMes = 9;
                break;

            case 'Outubro' || 'outubro':
                $this->NumMes = 10;
                break;

            case 'Novembro' || 'novembro':
                $this->NumMes = 11;
                break;

            case 'Dezembro' || 'dezembro':
                $this->NumMes = 12;
                break;
        }
    }
    
    protected function GetBandeira(){
        $Read = new Read();
        $Read->ExeRead('bandeiras', 'WHERE year = :year AND nome_mes = :mes', "year=2016&mes={$this->Mes}");

        if($Read->GetResult()){
            switch ($Read->GetResult()[0]['cod_bandeira']){
                case '1':
                    $this->Ret = 'Verde';
                break;
                case '2':
                    $this->Ret = 'Amarela';
                    break;
                case '3':
                    $this->Ret = 'Vermelha';
                    break;
                case '4':
                    $this->Ret = 'Vermelha Patamar 2';
                    break;

            }
        }else{
            $this->Ret = 'Opss.. Deu erro!';
        }
    }
}