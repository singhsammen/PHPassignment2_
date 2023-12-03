<?php
    require_once 'config.php';

    try {
        $status = $_REQUEST['status'];
        $id = $_REQUEST['id'];

        // $query = "update tasks set status='$status' where id=$id ";
        // $result = mysqli_query($conn,$query);

        $query = "UPDATE tasks SET status=? WHERE id=?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, 'si', $status, $id);
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