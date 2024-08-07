<?php


declare(strict_types=1);


$task = new Task();
$router = new Router();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $taskText = $_POST['text'] ?? '';
    if ($taskText) {
        $task->add($taskText);
        header('Location: /todos');
    }
}

if (isset($_GET['complete'])) {
    $task->complete((int)$_GET['complete']);
    header('Location: /todos');

}

if (isset($_GET['uncompleted'])) {
    $task->uncompleted((int)$_GET['uncompleted']);
    header('Location: /todos');

}

if (isset($_GET['delete'])) {
    $task->delete((int)$_GET['delete']);
    header('Location: /todos');
}

$router->get("/", fn() => require "view/pages/home.php");
$router->get("/todos", fn() => require "view/pages/todos.php");
$router->get("/notes", fn() => require "view/pages/notes.php");

$router->get("/login", fn() => require "view/pages/auth/login.php");
$router->post("/login", fn() =>  (new User())->login());


$router->get("/register", fn() => require "view/pages/auth/register.php");
$router->post("/register", fn() => (new User())->register());

$router->get("/logout", fn() => (new User())->logout());


