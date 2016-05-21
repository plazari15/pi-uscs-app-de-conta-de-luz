<?php 
// Aqui está o require do framework

error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once ("_app/Config.inc.php");

/**
 * Rotas do site
 */
//Inicia o App
$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];
$c = new \Slim\Container($configuration);
$App = new \Slim\App($c);


//Apresentando as rotas do site
$App->get('/', function () {
    Render('index.php');
});


$App->get('/sobre/quem-somos', function () {
    Render('quem_somos.php');
});

$App->get('/sobre/time', function () {
    Render('time.php');
});

$App->get('/calculadora', function () {
    Render('calculadora.php');
});

$App->get('/graficos', function () {
    Render('graficos.php');
});

$App->get('/dashboard/login', function () {
    Render('Login.php');
});

$App->get('/cadastro', function () {
    Render('cadastro.php');
});

$App->get('/cadastro/{status}', function ($request, $response, $args) {
    Render('cadastro.php');
});


$App->post('/action/login', function () {
    $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    echo '<pre>';
    var_dump($Post);
});

$App->post('/action/cadastro', function () use ($App) {
    $Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $Cadastro = new \Own\CadastroUsuario($Post);
    if($Cadastro->CriarConta()){
        $App->redirect('/cadastro/sucesso');
    }else{
        $App->redirect('/cadastro/erro');
    }
});


$App->get('/books', function ($request, $response, $args) {
    Render('index.php');
});


$App->run();