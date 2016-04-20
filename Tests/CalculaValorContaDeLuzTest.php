<?php

/**
 * Classe de teste do PHPUnit para a função de calculo da conta de luz
 */
require './_app/Config.inc.php';

use Own\CalculaValorContaDeLuz;
use PHPUnit_Framework_TestCase as PHPUnit;

class CalculaValorContaDeLuzTest extends PHPUnit
{

    public function testCalculaSemImposto(){
        $Calcula  = new CalculaValorContaDeLuz();
        $this->assertTrue($Calcula->CalculaConta(false));
    }

}