<?php

function getConn()
{
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "todo";


    return $ddh = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    if (mysqli_connect_error()) {
        echo mysqli_connect_error();
        exit();
    }
}

$conn = getConn();


function addTask($conn, $task)
{
    $sql = "INSERT INTO tasks(task) 
            VALUE(?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt === false) {
        echo mysqli_error($conn);
    } else {
        mysqli_stmt_bind_param($stmt, 's', $task);

        if (mysqli_stmt_execute($stmt)) {
        } else {
            echo mysqli_stmt_error($stmt);
        }
    }
}

function getTask($conn){
    $sql = "SELECT id, task, check_task FROM tasks ORDER BY date";

    $stmt = mysqli_prepare($conn, $sql);
    
    if($stmt === false){
        echo mysqli_error($conn);
    }else{
        if (mysqli_stmt_execute($stmt)) {
          $result =  mysqli_stmt_get_result($stmt);
        } else {
            echo mysqli_stmt_error($stmt);
        }
    }

    return $result;
}

$tasks = getTask($conn);

foreach($tasks as $task){
    var_dump($task);
}


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
    }
}
