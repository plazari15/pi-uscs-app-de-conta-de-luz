<?php

/**
 * Classe de teste do PHPUnit para a função de calculo da conta de luz
 */
//require './_app/Config.inc.php';

use Own\CalculaValorContaDeLuz;
use PHPUnit_Framework_TestCase as PHPUnit;

class CalculaValorContaDeLuzTest extends PHPUnit
{

    /**
     * Testes residenciais
     */
    public function testCalculaSemImpostoBandeiraVerdeResidencial(){
        $Calcula  = new CalculaValorContaDeLuz();
        $this->assertEquals('43,60', $Calcula->CalculaConta(false,  '100', '1', 'residencial'));
    }


    public function testCalculaSemImpostoBandeiraAmarelaResidencial(){
        $Calcula  = new CalculaValorContaDeLuz();
        $this->assertEquals('45,10', $Calcula->CalculaConta(false,  '100', '2', 'residencial'));
    }

    public function testCalculaSemImpostoBandeiraVermelhaResidencial(){
        $Calcula  = new CalculaValorContaDeLuz();
        $this->assertEquals('48,10', $Calcula->CalculaConta(false,  '100', '3', 'residencial'));
    }

    /**
     * Testes em Instalações Comerciais
     */

}