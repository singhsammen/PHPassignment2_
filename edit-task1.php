<?php
    require_once 'config.php';

    try {
        //code..
        $id     = $_REQUEST['id'];
        $tname  = $_REQUEST['taskName'];
        $tdesc  = $_REQUEST['taskDescription'];
        $ddate  = $_REQUEST['dueDate'];
        $status = $_REQUEST['status'];

        // $query = "update tasks set task_name ='$tname'   gll a, task_description='$tdesc', due_date='$ddate', status='$status' where id=$id ";
        // $result = mysqli_query($conn,$query);

        $query = "UPDATE tasks SET task_name=?, task_description=?, due_date=?, status=? WHERE id=?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, 'ssssi', $tname, $tdesc, $ddate, $status, $id);
        $result = mysqli_stmt_execute($stmt);

        
    }
   
    catch (PDOException $e){
        echo $e;
    }
    finally{
        if ($result ==  1){
            header('location:view-tasks.php?result=editsuccess');
            die();
        }
        else{
            header('location:view-tasks.php?result=editfail');
            die();
        }

    }
?>