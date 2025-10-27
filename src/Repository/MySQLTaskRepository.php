<?php

namespace App\Repository;

use App\Model\Task;
class MySQLTaskRepository implements TaskRepositoryInterface
{
    
    private static $db =require  '../../public/config.php'['db'];
    
    public function findAll(): array{

    }
    public  function add(App\Model\Task $task): void
    {
        FILE_APPEND(self::$file, $task);
        
    }

}
?>