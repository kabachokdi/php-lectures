<?php
namespace App\config;
return [
    'db' => [
        'dsn' => 'storage/tasks.sql',
        'user'     => 'root',
        'pass' => '',
        'options' => '',
    ],
    'storage'=> 'storage/tasks.json',
    'repository' =>['../src/Repository/InMemoryTaskRepository.php']
    ];
?>