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
    protected $Retorna;

    public function CalculaConta($Kwh, $Bandeira, $Tipo)
    {
        $this->Kwh = $Kwh;
        $this->Bandeira = $Bandeira;
        $this->TipoTarifa = $Tipo;
       $this->CalculaContaDeLuzSemImposto();

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
        $Result = ($this->Kwh * $this->SomaKwhComBandeira());

        $Result = number_format($Result, '2', ',', ' ');

        $this->Retorna = $Result;
    }

    /**
     * Obtem o valor do Kwh de acordo com o tipo de tarifa. Esse é um dado fixo!
     */

    protected function TarifaUsoSistemaDistribuicao(){
        switch ($this->TipoTarifa){
            case 'residencial':
                return '0.1989';
            break;

            case 'comercial':
                return '0.1989';
                break;

            case 'residencial_baixa':
                return '0.1156';
                break;
        }
    }

    protected function TarifaDeEnergia(){
        switch ($this->TipoTarifa){
            case 'residencial':
                return '0.2371';
                break;

            case 'comercial':
                return '0.2371';
                break;

            case 'residencial_baixa':
                return '0.1422';
                break;
        }
    }

    /**
     * Obtem o valor do Kwh mais o valor da bandeira. O Valor do kWh é obtido na classe acima.
     * @param $Bandeira
     * @return string
     */
    protected function ValorBandeira(){
        switch ($this->Bandeira){
            case '1':
                //bandeira Verde
                $ValorBandeira = '0.00';
            break;

            case '2':
                //bandeira Amarela
                $ValorBandeira = '0.015';
                break;

            case '3':
                //bandeira Vermelha
                $ValorBandeira = '0.045';
                break;
        }

        return $ValorBandeira;
    }


    protected function SomaKwhComBandeira(){
        $Soma = ($this->TarifaUsoSistemaDistribuicao() + $this->TarifaDeEnergia() + $this->ValorBandeira());
        return $Soma;
    }

}