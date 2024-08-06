<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>

<!doctype html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/c4497f215d.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <?php

//            require "view/todo-list.php";

            echo "<hr class='border border-2 opacity-50'>";

            require 'view/new-todo-form.php';

            ?>
        </div>
    </div>
</div>
</body>
</html>