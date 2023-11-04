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

function getTask($conn)
{
    $sql = "SELECT id,task FROM tasks WHERE checked = 0 ORDER BY date";

    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt === false) {
        echo mysqli_error($conn);
    } else {
        if (mysqli_stmt_execute($stmt)) {
            $result =  mysqli_stmt_get_result($stmt);
        } else {
            echo mysqli_stmt_error($stmt);
        }
    }

    return $result;
}


function getCompeletedTask($conn)
{
    $sql = "SELECT id,task FROM tasks WHERE checked = 1 ORDER BY date";

    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt === false) {
        echo mysqli_error($conn);
    } else {
        if (mysqli_stmt_execute($stmt)) {
            $result =  mysqli_stmt_get_result($stmt);
        } else {
            echo mysqli_stmt_error($stmt);
        }
    }

    return $result;
}


function AddToCompeleted($conn, $task_id)
{
    $sql = "UPDATE tasks SET checked = 1
    WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt === false) {
        echo mysqli_error($conn);
    } else {
        mysqli_stmt_bind_param($stmt, 'i', $task_id);

        if (mysqli_stmt_execute($stmt)) {
        } else {
            echo mysqli_stmt_error($stmt);
        }
    }
}


function removeFromCompeleted($conn, $task_id)
{
    $sql = "UPDATE tasks SET checked = 0
    WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt === false) {
        echo mysqli_error($conn);
    } else {
        mysqli_stmt_bind_param($stmt, 'i', $task_id);

        if (mysqli_stmt_execute($stmt)) {
        } else {
            echo mysqli_stmt_error($stmt);
        }
    }
}

function deleteTask($conn, $task_id)
{
    $sql = "DELETE FROM tasks
    WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt === false) {
        echo mysqli_error($conn);
    } else {
        mysqli_stmt_bind_param($stmt, 'i', $task_id);

        if (mysqli_stmt_execute($stmt)) {
        } else {
            echo mysqli_stmt_error($stmt);
        }
    }
}
