<?php

namespace SevenTest\Services;

class Autoloader
{
    /**
     * Does it make sense?
     */
    public function autoload(): void
    {
        require_once __DIR__ . '/../../vendor/autoload.php';
    }
}
