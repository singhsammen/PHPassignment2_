<?php
    require_once 'config.php';

    $id = $_REQUEST['id'];

    $query = "delete from tasks where id=" . $id;
    $result = mysqli_query($conn, $query);

    if ($result == 1)
        header("location:view-tasks.php?result=delsuccess");
    else
        header("location:view-tasks.php?result=delfail");
?>