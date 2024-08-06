<?php

declare(strict_types=1);


$router = new Router();
$task   = new Task();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if ($router->getResourceId()) {
        $router->sendResponse(
            $task->getTask(
                $router->getResourceId()
            )
        );
        return;
    }
    $router->sendResponse($task->getAll());
    return;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $text = $router->getUpdates()->text;
    $userId = 1; // Bu qiymat dinamik bo'lishi mumkin, talabga qarab o'zgartiring.
    $newTask = $task->add($text, $userId);
    $responseText = $newTask ? 'New task has been added' : 'Something went wrong';
    $router->sendResponse($responseText);
    return;
}


if ($_SERVER['REQUEST_METHOD'] === 'PATCH') {
    echo 'Resource '.$router->getResourceId().' updated';
}