<?php

declare(strict_types=1);

$taskModel = new Task(); // O'zgaruvchini nomini o'zgartirdik
$todoList = $taskModel->getAll();
?>

<div class="list-group list-group-flush">
    <?php
    foreach ($todoList as $todoItem) {
        $checked = $todoItem->status ? 'checked' : '';
        $strike  = $todoItem->status ? ' text-decoration-line-through' : '';
        $action  = $todoItem->status ? 'uncompleted' : 'complete';
        echo "<div class='d-flex list-group-item'>";
        echo "    <a href='?$action={$todoItem->id}' class='w-100 text-decoration-none text-dark'>";
        echo "        <input class='form-check-input me-1' type='checkbox' id='task-{$todoItem->id}' $checked>";
        echo "        <label class='form-check-label $strike' for='task-{$todoItem->id}'>{$todoItem->text}</label>";
        echo "    </a>";
        echo "    <a href='?delete={$todoItem->id}' type='button' class='p-2'><i class='fa-solid fa-trash text-danger'></i></a>";
        echo "</div>";
    } ?>
</div>
