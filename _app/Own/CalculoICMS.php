<?php
/**
 * Created by PhpStorm.
 * User: pedro
 * Date: 25/04/16
 * Time: 21:09
 */

namespace Own;
use Own\CalculaValorContaDeLuz;


class CalculoICMS extends CalculaValorContaDeLuz
{
    protected $ValorConta;
    protected $Aliquota = 0.1200;

    /**
     * CalculoICMS constructor.
     * Esse metodo recebe o Kwh a bandeira e o tipo, para que ele possa realizar o cálculo do valor da conta de luz
     * na classe que ele extendeu. Assim que calcular o valor da conta ele vai calcular a aliquota de icms
     * @param $Kwh
     * @param $Bandeira
     * @param $Tipo
     */
    function __construct($Kwh, $Bandeira, $Tipo)
    {
        $this->CalculaConta($Kwh, $Bandeira, $Tipo);
        $this->ValorConta = $this->RetornaValores();
    }

    /**
     * Esse metodo calcula o valor da aliquota de ICMS e retorna
     * @return float
     */
    protected function CalculoAliquota(){
        $Resultado = 1 / (1 - $this->Aliquota);

        return $Resultado;
    }

    /**
     * Calcula o Valor da conta de luz usando a Aliquota calculada anteriormente
     * @return float
     */
    protected function CalculaValorComImposto(){
        $ResultadoImposto = $this->ValorConta * ($this->CalculoAliquota() - 1);

        return floatval($ResultadoImposto);
    }


    /**
     * Exibe o valor da conta de luz, e faz um number format para formatar o valor recebido.
     * @return string
     */
    public function Exibe(){
        $ResultadoContaDeLuz = ($this->ValorConta + $this->CalculaValorComImposto());
        $ResultadoContaDeLuz = number_format($ResultadoContaDeLuz, '2', ',', ' ');
        return $ResultadoContaDeLuz;
    }

}