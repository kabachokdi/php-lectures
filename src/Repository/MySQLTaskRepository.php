<?php

namespace App\Repository;

use App\Model\Task;
use PDO;

class MySqlTaskRepository implements TaskRepositoryInterface
{
    private PDO $pdo; //объект подключения к БД

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function findAll(): array
    {
        //sql-запрос с сортировкой по id
        $stmt = $this->pdo->query("SELECT title, completed FROM tasks ORDER BY id");
        $tasksData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $tasks = []; //преобразование данных БД в объекты task
        foreach ($tasksData as $taskData) {
            $task = new Task($taskData['title']);
            if ($taskData['completed']) {
                $task->complete();
            }
            $tasks[] = $task;
        }
        
        return $tasks;
    }

    public function add(Task $task): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO tasks (title, completed) VALUES (?, ?)"); //подготовленный запрос от sql-инъекций
        $stmt->execute([$task->getTitle(), $task->isCompleted() ? 1 : 0]); //преобразование bool в int
    }
}