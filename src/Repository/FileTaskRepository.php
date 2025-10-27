<?php

namespace App\Repository;

use App\Model\Task;
class FileTaskRepository implements TaskRepositoryInterface
{
    
    private static  $file =require '../../public/config.php'['storage'];
    
    public function findAll(): array{
       if(file_exists(self::$file))
        {
            if(!file_get_contents(self::$file) == ''){
        $tasks = json_decode(file_get_contents($this->file), false);
            return $tasks;}else{return [];}
        }
        else 
        {
                http_response_code(404);
                echo '404 not found';
                return [];
        }
    }
    public  function add(App\Model\Task $task): void
    {
        FILE_APPEND(self::$file, $task);
        
    }

}
?>