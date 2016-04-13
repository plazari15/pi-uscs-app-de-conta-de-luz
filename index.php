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

});


$App->get('/books/{id}', function ($request, $response, $args) {
    require 'themes/pedro/index.php';
});


$App->run();