<?php

namespace SevenTest\Repositories;

class UserRepository
{
    private const SOURCE_FILE = __DIR__ . '/../../data/users.json';

    /**
     * @return array[]
     */
    public function getAll(): array
    {
        if (!file_exists(self::SOURCE_FILE)) {
            return [];
        }

        $content = file_get_contents(self::SOURCE_FILE);

        return json_decode($content, true);
    }

    /**
     * @param array $data
     */
    public function create(array $data): void
    {
        $users = $this->getAll();
        $users[] = [
            'name' => (string)$data['name'],
            'email' => (string)$data['email'],
        ];
        $content = json_encode($users);
        file_put_contents(self::SOURCE_FILE, $content);
    }
}
