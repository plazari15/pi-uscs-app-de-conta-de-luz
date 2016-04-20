<?php

/**
 * Created by PhpStorm.
 * User: Pedro
 * Date: 20/04/2016
 * Time: 01:05
 */
require './_app/Config.inc.php';

use Own\EnviaDadosDeCalculosParaAlgolia;
use PHPUnit_Framework_TestCase as PHPUnit;
class EnviaDadosDeCalculosAlgoliaTest extends PHPUnit
{
    public function testInicioClasse(){
        $Class = new EnviaDadosDeCalculosParaAlgolia('1');
        $this->assertTrue($Class->EnviaDadosParaAlgolia('3', '100', '120.00'));
    }
}