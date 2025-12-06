<?php

namespace App\Repository;

use App\Model\Task;

class InMemoryTaskRepository implements TaskRepositoryInterface
{
    private array $tasks = []; //массив для хранения задач в памяти

    public function __construct()
    {
        $this->tasks = [
            //уже имеющиеся тестовые данные (сделанные на лекции)
            new Task("Купить кофе"),
            new Task("Проспать пары"),
            new Task("Опоздать на пары")
        ];
    }

    public function findAll(): array
    {
        return $this->tasks; //возврат массива
    }

    public function add(Task $task): void
    {
        $this->tasks[] = $task; //добавление задачи в конец массива
    }
}