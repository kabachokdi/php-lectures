<?php

namespace App\Repository;

use App\Model\Task;

interface TaskRepositoryInterface
{
    public function findAll(): array; //получение списка задач
    public function add(Task $task): void; //добавление новых задач
}