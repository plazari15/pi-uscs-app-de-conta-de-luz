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
    protected $Cod;

    function __construct($Mes)
    {
        $this->Mes = $Mes;
        $this->TransformMes();
        $this->GetBandeira();
    }

    public function GetResult(){
        return $this->Ret;
    }

    public function GetCode(){
        return $this->Cod;
    }

    protected function TransformMes(){
        switch ($this->Mes){

            case 'Janeiro':
            case 'janeiro':
            case 'January':
                $this->NumMes = '1';
                break;

            case 'Fevereiro':
            case 'fevereiro':
            case 'February':
                $this->NumMes = '2';
                break;

            case 'Março':
            case 'março':
            case 'March':
                $this->NumMes = '3';
                break;

            case 'Abril':
            case 'abril':
            case 'April':
                $this->NumMes = '4';
                break;

            case 'Maio':
            case 'maio':
            case 'May':
                $this->NumMes = '5';
                break;

            case 'Junho':
            case 'junho':
            case 'June':
                $this->NumMes = '6';
                break;

            case 'Julho':
            case 'julho':
            case 'July':
                $this->NumMes = '7';
                break;

            case 'Agosto':
            case 'agosto':
            case 'August':
                $this->NumMes = '8';
                break;

            case 'Setembro':
            case 'setembro':
            case 'September':
                $this->NumMes = '9';
                break;

            case 'Outubro':
            case 'outubro':
            case 'October':
                $this->NumMes = '10';
                break;

            case 'Novembro':
            case 'novembro':
            case 'November':
                $this->NumMes = '11';
                break;

            case 'Dezembro':
            case 'dezembro':
            case 'December':
                $this->NumMes = '12';
                break;
        }
    }
    
    protected function GetBandeira(){
        $Read = new Read();
        $Read->ExeRead('bandeiras', 'WHERE year = :year AND mes = :mes', "year=2016&mes={$this->NumMes}");
        $this->Cod = $Read->GetResult()[0]['cod_bandeira'];
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