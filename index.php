<?php

$task_list = ['Task 1', 'Task 2', 'Task 3', 'Task 4', 'Task 5'];

if (isset($_POST['addBtn'])) {
    $task_list = $_POST['taskList'];
    array_push($task_list, $_POST['task']);
}

if (isset($_POST['deleteBtn'])) {
    $task_list = $_POST['taskList'];
    unset($task_list[$_POST['deleteList']]);
}

function showTasks()
{
    $task_list = $GLOBALS['task_list'];
    foreach ($task_list as $task) {
        echo "<li>" . $task . "</li>";
    }
}

function getArray()
{
    $task_list = $GLOBALS['task_list'];
    foreach ($task_list as $task) {
        echo "<input type='hidden' name='taskList[]' value='" . $task . "'>";
    }
}

function deleteTask()
{
    $task_list = $GLOBALS['task_list'];
    $count = 0;
    foreach ($task_list as $task) {
        echo "<option value='" . $count . "'>" . $task . "</option>";
        $count = $count + 1;
    }
}

?>

<!DOCTYPE html>
<html>
<head>

</head>
<body>

<div><h1>Tasks</h1>
    <?php showTasks(); ?>
</div>

<div><h1>Add Tasks</h1>
    <form action="." method="post">
        <?php getArray(); ?>
        <input type="hidden" name="action" value="add">
        <label>Task:</label>
        <input type="text" name="task" placeholder="Add a task">
        <input type="submit" value="Add Task" name="addBtn">
    </form>
</div>

<div><h1>Delete Tasks</h1>
    <form action="." method="post">
        <?php getArray(); ?>
        <input type="hidden" name="action" value="delete">
        <label>Task:</label>
        <select name="deleteList">
            <?php deleteTask(); ?>
        </select>
        <input type="submit" value="Delete Task" name="deleteBtn">
    </form>
</div>

</body>
</html>
