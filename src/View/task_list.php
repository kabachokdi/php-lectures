<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Лист задач</title>
</head>
<body>
    <h1>Список задач</h1>
    <a href="?route=task/add">Добавить задачу</a>
    <ul>
        <?php foreach ($tasks as $task): ?>
            <li>
                <?= htmlspecialchars($task->getTitle()) ?>
                <?= $task->isCompleted() ? "✔" : "❌" ?>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>