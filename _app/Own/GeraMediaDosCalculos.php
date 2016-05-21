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
    protected $tipo;
    protected $Ano;
    private $Return;

    
    public function ExecutaBuscaSoma($Mes, $Ano, $tipo){
        $this->Mes = $Mes;
        $this->tipo = $tipo;
        $this->Ano = $Ano;
        $Soma = 0;
        $Read = new Read();
        $Read->ExeRead('calculos', "WHERE compartilhar = 1 AND mes = :mes AND ano = :ano AND tipo_conta = :tipo", "mes={$this->Mes}&ano={$this->Ano}&tipo={$this->tipo}");
        $this->Contas = $Read->GetRowCount();
        if($Read->GetResult()){
            foreach ($Read->GetResult() as $Result) {
                $Soma += $Result['kwh'];
            }
        }
        return $Soma;
    }

    public function GeraMedia($mes, $ano, $tipo){
         $Media = $this->ExecutaBuscaSoma($mes, $ano, $tipo);

        if($Media != 0){
            $Media = $Media / $this->Contas;
        }
        
        return $Media;
    }


}