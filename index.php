<?php

use SevenTest\Controllers\User;
use SevenTest\Services\Autoloader;
use SevenTest\Services\Viewer;

require_once __DIR__ . '/src/Services/Autoloader.php';

$autoloader = new Autoloader();
$autoloader->autoload();

$routes = [
    '/' => function () {
        Viewer::render('home');
    },
    '/get' => [User::class, 'getAction'],
    '/post' => [User::class, 'postAction'],
];

$uri = (string)$_SERVER['REQUEST_URI'];

if ($uri == '') {
    $uri = '/';
}

$questionMarkPosition = strpos($uri, '?');

if ($questionMarkPosition !== false) {
    $uri = substr($uri, 0, $questionMarkPosition);
}

if (array_key_exists($uri, $routes)) {
    call_user_func($routes[$uri]);
}

$controller = new User();
$controller->notFoundAction();
