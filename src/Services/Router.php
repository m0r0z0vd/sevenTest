<?php

namespace SevenTest\Services;

use SevenTest\Controllers\User;

class Router
{
    public function handleRequest(): void
    {
        $routes = $this->getRoutes();
        $uri = $this->getRequestUri();

        if (array_key_exists($uri, $routes)) {
            call_user_func($routes[$uri]);

            return;
        }

        $controller = new User();
        $controller->notFoundAction();
    }

    /**
     * @param string $uri
     */
    public static function redirectTo(string $uri): void
    {
        header('Location: ' . $uri);
        exit();
    }

    /**
     * @return string
     */
    private function getRequestUri(): string
    {
        $uri = (string)$_SERVER['REQUEST_URI'];

        if ($uri == '') {
            $uri = '/';
        }

        $questionMarkPosition = strpos($uri, '?');

        if ($questionMarkPosition !== false) {
            $uri = substr($uri, 0, $questionMarkPosition);
        }

        return $uri;
    }

    /**
     * @return array
     */
    private function getRoutes(): array
    {
        $usersController = new User();

        return [
            '/' => function () {
                Viewer::render('home');
            },
            '/get' => [$usersController, 'getAction'],
            '/post' => [$usersController, 'postAction'],
        ];
    }
}
