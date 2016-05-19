<?php
/**
 * Created by PhpStorm.
 * User: Plazari
 * Date: 19/05/2016
 * Time: 19:45
 */

namespace Own;


use Conn\Read;

class GeraMediaDosCalculos
{

    protected $Mes;
    protected $Valor;
    protected $Media;
    protected $Contas;
    protected $Soma;
    private $Return;

    
    public function ExecutaBuscaSoma($Mes){
        $this->Mes = $Mes;
        $Soma = 0;
        $Read = new Read();
        $Read->ExeRead('calculos', "WHERE compartilhar = 1 AND mes = :mes", "mes={$this->Mes}");
        $this->Contas = $Read->GetRowCount();
        foreach ($Read->GetResult() as $Result) {
            $Soma += $Result['kwh'];
        }
        return $Soma;
    }

    public function GeraMedia($mes){
         $Media = $this->ExecutaBuscaSoma($mes) / $this->Contas;
        
        return $Media;
    }


}