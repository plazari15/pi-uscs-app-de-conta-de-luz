<?php
require_once('vendor/autoload.php');
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

// URL AMIG�VEL ##############################
$getUrl = strip_tags(trim(filter_input(INPUT_GET, 'url', FILTER_DEFAULT)));
$setUrl = (empty($getUrl) ? 'index' : $getUrl);
$url = explode('/', $setUrl);
//var_dump($url);

// AUTO LOAD DE CLASSES ############################
function __autoload($Class) {

    $cDir = ['Conn', 'Helpers', 'Models', 'Own'];
    $iDir = null;

    foreach ($cDir as $DirName):
        if (!$iDir && file_exists(__DIR__ . DIRECTORY_SEPARATOR . "{$DirName}" . DIRECTORY_SEPARATOR . "{$Class}.class.php") && !is_dir(__DIR__ . DIRECTORY_SEPARATOR . "{$DirName}" . DIRECTORY_SEPARATOR . "{$Class}.class.php")):
            include_once (__DIR__ . DIRECTORY_SEPARATOR . "{$DirName}" . DIRECTORY_SEPARATOR . "{$Class}.class.php");
            $iDir = true;
        endif;
    endforeach;

    if (!$iDir):
        trigger_error("Não foi possivel incluir {$Class}.class.php", E_USER_ERROR);
        die;
    endif;
}

// TRATAMENTO DE ERROS ############################
// CSS CONSTANTES :: Mensagens de Erros
define('WS_ACCEPT', 'accept');
define('WS_INFOR', 'infor');
define('WS_ALERT', 'alert');
define('WS_ERROR', 'error');

//WSErro :: Exibe os erros lançados :: Front
function WSErro($ErrMsg, $ErrNo, $ErrDie = null) {
    $CssClass = ($ErrNo == E_USER_NOTICE ? WS_INFOR : ($ErrNo == E_USER_WARNING ? WS_ALERT : ($ErrNo == E_USER_ERROR ? WS_ERROR : $ErrNo)));
    echo "<p class=\"trigger {$CssClass}\">{$ErrMsg}<span class=\"ajax_close\"></span></p>";

    if ($ErrDie):
        die;
    endif;
}

//PHPErro :: personaliza o gatilho do PHP
function PHPErro($ErrNo, $ErrMsg, $ErrFile, $ErrLine) {
    $CssClass = ($ErrNo == E_USER_NOTICE ? WS_INFOR : ($ErrNo == E_USER_WARNING ? WS_ALERT : ($ErrNo == E_USER_ERROR ? WS_ERROR : $ErrNo)));
    echo "<p class=\"trigger {$CssClass}\">";
    echo "<b>Erro na linha: {$ErrLine} ::</b> {$ErrMsg}<br>";
    echo "<small>{$ErrFile}</small>";
    echo "<span class=\"ajax_close\"></span></p>";

    if ($ErrNo == E_USER_ERROR):
        die;
    endif;
}

set_error_handler('PHPErro');

//SISTEMA DE ERRO PADRÃO
function GeraErro($Erro){
    if($Erro && is_array($Erro)):
        echo "<i class={$Erro[0]}>{$Erro[1]}</i>";
    endif;
}

//FUNÇÃO PARA MASCARA PHP
function Mask($mask,$str){

    $str = str_replace(" ","",$str);

    for($i=0;$i<strlen($str);$i++){
        $mask[strpos($mask,"#")] = $str[$i];
    }

    return $mask;

}

//ENVIO DO SITEMAP
function SitemapPing() {
    $SitemapPing = array();
    $SitemapPing['google'] = 'https://www.google.com/webmasters/tools/ping?sitemap=' . HOME . '/sitemap.xml';
    $SitemapPing['bing'] = 'https://www.bing.com/webmaster/ping.aspx?siteMap=' . HOME . '/sitemap.xml';

    foreach ($SitemapPing as $SiteMapUrl):
        $ch = curl_init($SiteMapUrl);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_close($ch);
    endforeach;
};
if(!file_exists('sitemap.xml.gz')):
    //$gzip = gzopen('sitemap.xml.gz', 'w9');
    //$gmap = file_get_contents('sitemap.xml');
    //gzwrite($gzip, $gmap);
    //gzclose($gzip);
    // SitemapPing();
endif;
?>

