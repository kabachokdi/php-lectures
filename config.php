<?php

return [
    'db' => [
        'user' => 'root',
        'dsn' => 'mysql:host=localhost;dbname=taskapp;charset=utf8mb4',
        'pass' => '',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //обработка исключений
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC //возврат ассоциативных массивов
        ]
    ],
    'storage' => __DIR__ . '/storage/tasks.json',
    'repository' => 'mysql' //file (задачи сохраняются в storage/tasks.json) 
                            //mysql (задачи сохраняются в таблицу tasks базы данных tasksapp)
                            //memory (читает задачи из InMemoryTaskRepository)
];

?>