<?php

namespace SevenTest\Controllers;

use SevenTest\Services\Viewer;

abstract class Controller
{
    abstract public function getAction(): void;

    abstract public function postAction(): void;

    public function notFoundAction(): void
    {
        Viewer::render('404');
    }
}
