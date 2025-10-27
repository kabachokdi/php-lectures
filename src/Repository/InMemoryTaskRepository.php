<?php

namespace App\Repository;

use App\Model\Task;
class InMemoryTaskRepository implements TaskRepositoryInterface
{
    private static $tasks = array();
    public function findAll(): array{
        return self::$tasks;
    }
    public function add(App\Model\Task $task): void
    {
        array_push(self::$tasks, $task);
    }

}