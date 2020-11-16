<?php

namespace SevenTest\Services;

class Autoloader
{
    public static function autoload(): void
    {
        require_once __DIR__ . '/../../vendor/autoload.php';
    }
}
