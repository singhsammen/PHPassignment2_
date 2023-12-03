<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit Product - Simple Inventory Management System</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <style>
            #wrapper
            {
                width:50%;
                margin:auto;
            }

            table, td, th
            {    
                border: 1px solid #ddd;
                text-align: left;
            }

            table
            {
                border-collapse: collapse;
                width: 50%;
                margin: auto;
            }

            th, td
            {
                padding: 15px;
            }

            h2
            {
                text-align: center;
            }

            #msg
            {
                width:50%;
                margin:auto;
            }
        </style>
    </head>
    <body>
        <div id="wrapper">

            <?php
                require_once 'header.php';
            ?>

            <h2>Edit Task</h2>
            <br>

            <?php
                if (isset($_REQUEST['id'])){
                    require_once "config.php";

                    $id = $_REQUEST['id'];
                    $query = "select * from tasks where id =".$id;
                    $result = mysqli_query($conn,$query);

                    if (mysqli_num_rows($result)==1) {
                        $row = mysqli_fetch_assoc($result);

                        $tname  = $row['task_name'];
                        $tdesc  = $row['task_description'];
                        $ddate  = $row['due_date'];
                        $status = $row['status'];
            
 

                    } else {
                        header('location:view-tasks.php');
                        die();
                    }
                    

                }
                else {
                    header('location:view-tasks.php');
                    die();
                }
                
            ?>

            <form action="edit-task1.php?id=<?php echo $id;?>" method="post">
                <table>
                    <tr>
                        <td>Task Name:</td>
                        <td>
                            <input type="text" name="taskName" value="<?php echo $tname ?>"
                            style="width : 183px; height:27px" required>
                        </td>
                    </tr>

                    <tr>
                        <td>Task Description:</td>
                        <td>
                            <input type="text" name="taskDescription" value="<?php echo $tdesc ?>"
                            style="width : 183px; height:27px" required>
                        </td>
                    </tr>

                    <tr>
                        <td>Due Date :</td>
                        <td>
                            <input type="date" name="dueDate" value="<?php echo $ddate?>"
                            style="width : 183px; height:27px" required>
                        </td>
                    </tr>

                    <tr>
                        <td>Status:</td>
                        <td>
                            <select name="status" value="<?php echo $status ?>"
                            style="width : 183px; height:27px" required>
                                <option value="pending">Pending</option>
                                <option value="completed">Completed</option>
                            </select>
                        </td>
                    </tr>



                    <tr>
                        <td colspan="2">
                            <input type="submit" value="Edit Task">
                        </td>
                    </tr>
                </table>
            </form>

            <?php
                // TO DO - print the message if insertion was successful or not

                if (isset($_REQUEST['result']))
                {
                    if ($_REQUEST['result'] == 'success')
                    {
                        echo "<br><div id='msg'>";
                        echo "<div class='alert alert-success alert-dismissable fade in'>";
                        echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                        echo "<strong>Success!</strong> New product was added.";
                        echo "</div></div>";
                    }
                    else if ($_REQUEST['result'] == 'fail')
                    {
                        echo "<br><div id='msg'>";
                        echo "<div class='alert alert-danger alert-dismissable fade in'>";
                        echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                        echo "<strong>Fail!</strong> New product was not added.";
                        echo "</div></div>";
                    }
                }
            ?>
        </div>
    </body>
</html>
