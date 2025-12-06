<?php

namespace App\Model;

class Task
{
    private string $title; //заголовок задачи
    private bool $completed = false; //статус выполнения задачи ("✔" / "❌")

    public function __construct(string $title)
    {
        $this->title = $title;
    }

    public function getTitle(): string //геттер
    {
        return $this->title;
    }
    public function setTitle(string $title): void //сеттер
    {
        $this->title = $title;
    }

    public function isCompleted(): bool //проверка на выполненность
    {
        return $this->completed;
    }

    public function complete(): void {
        $this->completed = true; //отмечается выполненной
    }
}