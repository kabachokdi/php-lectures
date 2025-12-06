<?php

namespace App\Controller;

use App\Model\Task;
use App\Repository\TaskRepositoryInterface;

class TaskController {

    private TaskRepositoryInterface $repository; //установка зависимости от репозитория

    public function __construct(TaskRepositoryInterface $repository){
        $this->repository = $repository; //внедрение зависимости
    }

    public function list() {
    $tasks = $this->repository->findAll(); //получение задач
    require __DIR__ . '/../View/task_list.php';
}
    public function add(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = trim($_POST['title'] ?? '');
            
            if (!empty($title)) {
                $task = new Task($title);
                $this->repository->add($task); //сохранение задачи
            }
            
            header('Location: ?route=task/list'); //перенаправление на список
            exit;
        }
        
        //форма для GET запроса
        echo '
        <!DOCTYPE html>
        <html>
        <head>
            <title>Добавить задачу</title>
        </head>
        <body>
            <h1>Добавить задачу</h1>
            <form method="POST">
                <input type="text" name="title" placeholder="Название задачи" required>
                <button type="submit">Добавить</button>
            </form>
            <a href="?route=task/list">← Назад к списку</a>
        </body>
        </html>';
    }
}