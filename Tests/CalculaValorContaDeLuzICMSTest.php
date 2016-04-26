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


    /**
     * Calculando o ICMS para COMERCIO
     */
    public function testComercialBandeiraVerde(){
        $Calcula = new CalculoICMS('100', 1, 'comercial');
        $this->assertEquals('48,86', $Calcula->Exibe()) ;
    }

    public function testComercialBandeiraAmarela(){
        $Calcula = new CalculoICMS('100', 2, 'comercial');
        $this->assertEquals('51,14', $Calcula->Exibe()) ;
    }

    public function testComercialBandeiraVermelha1(){
        $Calcula = new CalculoICMS('100', 3, 'comercial');
        $this->assertEquals('52,27', $Calcula->Exibe()) ;
    }

    public function testComercialBandeiraVermelha2(){
        $Calcula = new CalculoICMS('100', 4, 'comercial');
        $this->assertEquals('54,55', $Calcula->Exibe()) ;
    }

    /**
     * Calculando o ICMS para RESIDENCIAS DE BAIXA RENDA
     */
    public function testResidencialBaixaRendaBandeiraVerde(){
        $Calcula = new CalculoICMS('100', 1, 'residencial_baixa');
        $this->assertEquals('28,41', $Calcula->Exibe()) ;
    }

    public function testResidencialBaixaRendaBandeiraAmarela(){
        $Calcula = new CalculoICMS('100', 2, 'residencial_baixa');
        $this->assertEquals('30,68', $Calcula->Exibe()) ;
    }

    public function testResidencialBaixaRendaBandeiraVermelha1(){
        $Calcula = new CalculoICMS('100', 3, 'residencial_baixa');
        $this->assertEquals('31,82', $Calcula->Exibe()) ;
    }

    public function testResidencialBaixaRendaBandeiraVermelha2(){
        $Calcula = new CalculoICMS('100', 4, 'residencial_baixa');
        $this->assertEquals('34,09', $Calcula->Exibe()) ;
    }

}