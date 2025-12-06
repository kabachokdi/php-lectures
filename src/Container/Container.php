<?php

namespace App\Container;

use Exception;

class Container {
    private array $definitions = []; //хранилище определений сервисов

    public function set (string $id, callable $callable): void {
        $this->definitions[$id] = $callable; //регистрация сервиса
    }

    public function get (string $id): mixed {
        if (!isset($this->definitions[$id])) {
            throw new Exception("Service $id not found"); //сервис не найден
        } else {
            return $this->definitions[$id]($this); //создание и возврат сервиса
        }
    }
}