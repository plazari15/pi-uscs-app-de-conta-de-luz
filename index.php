<?php 
// Aqui está o require do framework

error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once ("_app/Config.inc.php");

/**
 * Rotas do site
 */

$App = new \Slim\App();

$App->get('/', function () {
    echo 'Olá mundo!';

});


$App->get('/books', function ($request, $response, $args) use($App) {
    //$App->render('themes/site/index.php');
    require 'themes/site/index.php';
});


$App->run();