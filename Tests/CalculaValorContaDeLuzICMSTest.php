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
        $this->assertEquals('49,55', $Calcula->ExibeICMS()) ;
    }

    public function testResidencialBandeiraAmarela(){
        $Calcula = new CalculoICMS('100', 2, 'residencial');
        $this->assertEquals('51,25', $Calcula->ExibeICMS()) ;
    }

    public function testResidencialBandeiraVermelha1(){
        $Calcula = new CalculoICMS('100', 3, 'residencial');
        $this->assertEquals('52,95', $Calcula->ExibeICMS()) ;
    }

    public function testResidencialBandeiraVermelha2(){
        $Calcula = new CalculoICMS('100', 4, 'residencial');
        $this->assertEquals('54,66', $Calcula->ExibeICMS()) ;
    }


    /**
     * Calculando o ICMS para COMERCIO
     */
    public function testComercialBandeiraVerde(){
        $Calcula = new CalculoICMS('100', 1, 'comercial');
        $this->assertEquals('49,55', $Calcula->ExibeICMS()) ;
    }

    public function testComercialBandeiraAmarela(){
        $Calcula = new CalculoICMS('100', 2, 'comercial');
        $this->assertEquals('51,25', $Calcula->ExibeICMS()) ;
    }

    public function testComercialBandeiraVermelha1(){
        $Calcula = new CalculoICMS('100', 3, 'comercial');
        $this->assertEquals('52,95', $Calcula->ExibeICMS()) ;
    }

    public function testComercialBandeiraVermelha2(){
        $Calcula = new CalculoICMS('100', 4, 'comercial');
        $this->assertEquals('54,66', $Calcula->ExibeICMS()) ;
    }

    /**
     * Calculando o ICMS para RESIDENCIAS DE BAIXA RENDA
     */
    public function testResidencialBaixaRendaBandeiraVerde(){
        $Calcula = new CalculoICMS('100', 1, 'residencial_baixa');
        $this->assertEquals('29,30', $Calcula->ExibeICMS()) ;
    }

    public function testResidencialBaixaRendaBandeiraAmarela(){
        $Calcula = new CalculoICMS('100', 2, 'residencial_baixa');
        $this->assertEquals('31,00', $Calcula->ExibeICMS()) ;
    }

    public function testResidencialBaixaRendaBandeiraVermelha1(){
        $Calcula = new CalculoICMS('100', 3, 'residencial_baixa');
        $this->assertEquals('32,70', $Calcula->ExibeICMS()) ;
    }

    public function testResidencialBaixaRendaBandeiraVermelha2(){
        $Calcula = new CalculoICMS('100', 4, 'residencial_baixa');
        $this->assertEquals('34,41', $Calcula->ExibeICMS()) ;
    }

}