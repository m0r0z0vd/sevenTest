<?php

namespace SevenTest\Controllers;

use SevenTest\Repositories\UserRepository;
use SevenTest\Services\Router;
use SevenTest\Services\Viewer;

class User extends Controller
{
    /** @var UserRepository */
    private $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function getAction(): void
    {
        $users = $this->userRepository->getAll();
        Viewer::render('users', [
            'users' => $users
        ]);
    }

    public function postAction(): void
    {
        $this->userRepository->create([
            'name' => (string)$_POST['name'],
            'email' => (string)$_POST['email'],
        ]);

        Router::redirectTo('/get');
    }
}
