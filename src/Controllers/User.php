<?php

namespace SevenTest\Controllers;

use SevenTest\Services\Viewer;

class User extends Controller
{
    public function getAction(): void
    {
        Viewer::render('users');
    }

    public function postAction(): void
    {
        echo 'Hello from post';
    }
}
