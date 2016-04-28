<?php 
// Aqui está o require do framework

error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once ("_app/Config.inc.php");


/**
 * Rotas do site
 */
//Inicia o App
$App = new \Slim\App();


//Apresentando as rotas do site
$App->get('/', function () {
    echo 'Olá mundo!';

});


$App->get('/books', function ($request, $response, $args) {
    require 'themes/site/index.php';
});


$App->run();


