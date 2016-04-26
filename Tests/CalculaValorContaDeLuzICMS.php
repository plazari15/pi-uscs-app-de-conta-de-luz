<?php
/**
 * Created by PhpStorm.
 * User: pedro
 * Date: 25/04/16
 * Time: 21:17
 */

use  Own\CalculoICMS;
use PHPUnit_Framework_TestCase as PHPUnit;

class CalculaValorContaDeLuzComImpostoTest extends PHPUnit
{

    /**
     * Calculando o ICMS para residências
     */
    public function testResidencialBandeiraVerde(){
        $Calcula = new CalculoICMS('100', 1, 'residencial');
        $this->assertEquals('48,86', $Calcula->Exibe()) ;
    }

    public function testResidencialBandeiraAmarela(){
        $Calcula = new CalculoICMS('100', 2, 'residencial');
        $this->assertEquals('51,14', $Calcula->Exibe()) ;
    }

    public function testResidencialBandeiraVermelha1(){
        $Calcula = new CalculoICMS('100', 3, 'residencial');
        $this->assertEquals('52,27', $Calcula->Exibe()) ;
    }

    public function testResidencialBandeiraVermelha2(){
        $Calcula = new CalculoICMS('100', 4, 'residencial');
        $this->assertEquals('54,55', $Calcula->Exibe()) ;
    }

}