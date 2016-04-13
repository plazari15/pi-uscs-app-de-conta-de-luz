<?php
require_once('vendor/autoload.php');


use Dotenv\Dotenv;



(new Dotenv(__DIR__ . '/../'))->load();

define('HOST', getenv('DB_HOST'));
define('USER', getenv('DB_USER'));
define('PASS', getenv('DB_PASS'));
define('BANCO', getenv('DB_BANCO'));


