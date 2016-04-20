<?php
/**
 * Esta classe calcula o valor da conta de luz que o usuário irá pagar dependendo do tipo de bandeira
 * que foi adotada para aquele respectivo mês do cálculo.
 */

namespace Own;


class CalculaValorContaDeLuz
{
    protected $Kwh;
    protected $TipoTarifa;
    protected $Bandeira;

    public function CalculaConta($Imposto, $Kwh, $Bandeira, $Tipo)
    {
        if($Imposto){
            //Calcula conta de luz com imposto
        }else{
            return $this->CalculaContaDeLuzSemImposto('1', 100, 1, 1, false);
        }
    }

    public function RetornaValores(){
        return $this->Retorna;
    }

    /**************************************
     *********  PROTECTED METHODS  ********
     **************************************/
    /**
     * Calcula o valor da conta de Luz sem nenhum imposto
     * @param $Kwh
     * @param $Bandeira
     * @param $Tipo
     */
    protected function CalculaContaDeLuzSemImposto( ){

    }

    /**
     * Calcula o Valor do Kwh Mais o Valor da Bandeira em vigor
     * @param $Bandeira
     * @return string
     */
    protected function ValorKwhComBandeira($Bandeira){
        switch ($Bandeira){
            case '1':
                //bandeira Verde
                $Kwh = '0.019083';
                $ValorBandeira = '0.00';
                return $Kwh + $ValorBandeira;
            break;

            case '2':
                //bandeira Amarela
                $Kwh = '0.019083';
                $ValorBandeira = '0.00';
                return $Kwh + $ValorBandeira;
                break;

            case '3':
                //bandeira Vermelha
                $Kwh = '0.019083';
                $ValorBandeira = '0.00';
                return $Kwh + $ValorBandeira;
                break;
        }
    }

    protected function ValorKwh(){
        switch ($this->TipoTarifa){
            case 'residencial':
                return 
        }
    }
}