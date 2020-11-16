<?php

use SevenTest\Services\Autoloader;
use SevenTest\Services\Router;

require_once __DIR__ . '/src/Services/Autoloader.php';

$autoloader = new Autoloader();
$autoloader->autoload();
$router = new Router();
$router->handleRequest();
