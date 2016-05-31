<?php
/**
 * Created by PhpStorm.
 * User: Plazari
 * Date: 19/05/2016
 * Time: 19:45
 */

namespace Own;


use Conn\Read;

class CalculoMedioUsuario
{

    protected $Mes;
    protected $Valor;
    protected $Media;
    protected $Contas;
    protected $Soma;
    protected $tipo;
    protected $Ano;
    private $Return;

    
    public function ExecutaBuscaSomaUser($Mes, $Ano, $user){
        $this->Mes = $Mes;
        $this->Ano = $Ano;
        $Soma = 0;
        $Read = new Read();
        $Read->ExeRead('calculos', "WHERE mes = :mes AND ano = :ano AND user_id = :user AND status = 1", "mes={$this->Mes}&ano={$this->Ano}&user={$user}");
        $this->Contas = $Read->GetRowCount();
        if($Read->GetResult()){
            foreach ($Read->GetResult() as $Result) {
                $Soma += $Result['kwh'];
            }
        }
        return $Soma;
    }
    


}