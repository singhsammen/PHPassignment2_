<?php 
    require_once "config.php";

    $tname = $_REQUEST['taskName'];
    $tdesc = $_REQUEST['taskDescription'];
    $ddate = $_REQUEST['dueDate'];
    $status = $_REQUEST['status'];

    try
    {
        // $query = "insert into tasks(task_name, task_description, due_date, status) values('$tname', '$tdesc','$ddate','$status');";
        // $result = mysqli_query($conn, $query);

        $query = "INSERT INTO tasks (task_name, task_description, due_date, status) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, 'ssss', $tname, $tdesc, $ddate, $status);
        $result = mysqli_stmt_execute($stmt);
    }
    catch (PDOException $e)
    {
        echo $e;
    }
    finally
    {
        if ($result == 1)
        {
            header('location:add-task.php?result=success');
        }
        else
        {
            header('location:add-task.php?result=fail');
        }
    }


?>