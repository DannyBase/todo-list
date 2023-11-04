<?php

require "functions.php";


$conn = getConn();


$tasks = getTask($conn);
$compelete_tasks = getCompeletedTask($conn);



$error = "";
$success_msg = "";

if (isset($_POST['add'])) {
    $task = $_POST['task'];

    $task = htmlspecialchars(strip_tags($task));

    if (empty($task)) {
        $error = "Task Field is required";
    }

    if (empty($error)) {
        addTask($conn, $task);
        $success_msg = "Task Added";
        header("Location:todo.php");
        exit;
    }
}


if (isset($_POST['check'])) {
    $task_id = $_POST['check'];
    AddToCompeleted($conn, $task_id);
    header("Location:todo.php");
    exit;
}

if (isset($_POST['uncheck'])) {
    $task_id = $_POST['uncheck'];
    removeFromCompeleted($conn, $task_id);
    header("Location:todo.php");
    exit;
}

if (isset($_POST['delete'])) {
    $task_id = $_POST['delete'];
    deleteTask($conn, $task_id);
    header("Location:todo.php");
    exit;
}
