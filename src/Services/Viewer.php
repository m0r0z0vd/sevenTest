<?php

namespace SevenTest\Services;

class Viewer
{
    /**
     * @var array
     */
    private static $data = [];

    /**
     * @param string $view
     * @param array $data
     * @noinspection PhpIncludeInspection
     */
    public static function render(string $view, array $data = []): void
    {
        self::setData($data);

        require_once __DIR__ . "/../../views/$view.tpl.php";
        exit();
    }

    /**
     * @return array
     */
    public static function getData(): array
    {
        return self::$data;
    }

    /**
     * @param array $data
     */
    private static function setData(array $data): void
    {
        self::$data = $data;
    }
}
