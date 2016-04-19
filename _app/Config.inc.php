<?php
require_once(__DIR__ .'/../vendor/autoload.php');
use Dotenv\Dotenv;
(new Dotenv(__DIR__ . '/../'))->load();


// CONFIGURAÇÕES DO BANCO DE DADOS ####################
define('HOST', getenv('DB_HOST'));
define('USER', getenv('DB_USER'));
define('PASS', getenv('DB_PASS'));
define('BANCO', getenv('DB_BANCO'));

// DEFINE SERVIDOR DE EMAIL ###########################
define('MAILUSER', 'plazari@cloudsp.com.br');
define('MAILPASS', 'pedro88042355');
define('MAILPORT', '587');
define('MAILHOST', 'mail.cloudsp.com.br');

// DEFINE BASE DO SITE ##############################
define('HOME', 'http://localhost/pi');
define('THEME', 'rer');
define('INCLUDE_PATH', HOME . DIRECTORY_SEPARATOR . 'themes' . DIRECTORY_SEPARATOR . THEME);
define('REQUIRE_PATH', 'themes' . DIRECTORY_SEPARATOR . THEME);

//Defines de Segurança
//sha384, sha512, whirlpool, snefru
define('Cript', 'sha512');

//FUNÇÃO PARA MASCARA PHP
function Mask($mask,$str){

    $str = str_replace(" ","",$str);

    for($i=0;$i<strlen($str);$i++){
        $mask[strpos($mask,"#")] = $str[$i];
    }

    return $mask;

}

