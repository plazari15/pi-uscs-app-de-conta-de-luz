<?php

/**
 * Created by PhpStorm.
 * User: Pedro
 * Date: 20/04/2016
 * Time: 01:05
 */
require './_app/Config.inc.php';

use Own\CalculoICMS;
use Own\EnviaDadosDeCalculosParaAlgolia;
use PHPUnit_Framework_TestCase as PHPUnit;
class EnviaDadosDeCalculosAlgoliaTest extends PHPUnit
{
    /**
     * Este teste envia os dados do usuario para o sistema de busca caso o mesmo autorize.
     */
    public function testEnviaDadosUsuarioAutoriza(){
        $generator = \Faker\Factory::create();
        $faker = new \Faker\Provider\Base($generator);
        $kwh = $faker->randomNumber(4);
        //$kwh = 399;
        $Calculo = new CalculoICMS($kwh, '1', 'residencial');
        $Class = new EnviaDadosDeCalculosParaAlgolia('1', 'Janeiro', date('d-m-Y'),$kwh, $Calculo->Exibe(), $Calculo->ExibeICMS(), 'residencial');
        $this->assertTrue( $Class->Resultado() );
    }
}