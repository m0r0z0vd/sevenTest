<?php

namespace SevenTest\Controllers;

abstract class Controller
{
    abstract public function getAction(): void;

    abstract public function postAction(): void;

    public function notFoundAction(): void
    {

    }
}
