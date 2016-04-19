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

//Inicia o Container
$container = $App->getContainer();

//Container pega a pasta do template
$container['view'] = function ($container) {
    return new \Slim\Views\PhpRenderer('themes/site/');
};


//Apresentando as rotas do site
$App->get('/', function () {
    echo 'Olá mundo!';

});


$App->get('/books/{name}', function ($request, $response, $args) use($container) {
    return $this->view->render($response, 'index.php', [
        'name' => $args['name']
    ]);
})->setName('index');


$App->run();