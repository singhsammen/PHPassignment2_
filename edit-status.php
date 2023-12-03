
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>View Products - Simple Inventory Management System</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <style>
            #wrapper
            {
                width:80%;
                margin:auto;
            }

            table
            {
                border-collapse: collapse;
                width: 50%;
                margin: auto;
            }

            th, td
            {
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even)
            {
                background-color: #f2f2f2
            }
            th
            {
                background-color: #4CAF50;
                color: white;
            }

            h2
            {
                text-align: center;
            }

            #msg{
                width: 350px;
            }
           
        </style>
    </head>
    <body>
        <div id="wrapper">

            <?php
                require_once 'header.php';
            ?>

            <h2>View Tasks</h2>

                <?php
                    // TO DO - write code to select and display records in HTML table

                    if (isset($_REQUEST['result']))
                    {
                        echo "<center>";
                        if ($_REQUEST['result'] == 'delsuccess')
                        {
                            echo "<br><div id='msg'>";
                            echo "<div class='alert alert-success alert-dismissable fade in'>";
                            echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                            echo "<strong>Success!</strong> Product was deleted.";
                            echo "</div></div>";
                        }
                        else if ($_REQUEST['result'] == 'delfail')
                        {
                            echo "<br><div id='msg'>";
                            echo "<div class='alert alert-danger alert-dismissable fade in'>";
                            echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                            echo "<strong>Fail!</strong> Product was not deleted.";
                            echo "</div></div>";
                        }
                        if ($_REQUEST['result'] == 'editsuccess')
                        {
                            echo "<br><div id='msg'>";
                            echo "<div class='alert alert-success alert-dismissable fade in'>";
                            echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                            echo "<strong>Success!</strong> Product was edited.";
                            echo "</div></div>";
                        }
                        else if ($_REQUEST['result'] == 'editfail')
                        {
                            echo "<br><div id='msg'>";
                            echo "<div class='alert alert-danger alert-dismissable fade in'>";
                            echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                            echo "<strong>Fail!</strong> Product was not edited.";
                            echo "</div></div>";
                        }
                        echo "</center>";
                    }

                    require_once 'config.php';
                    $id = $_REQUEST['id'];

                    $query = "select * from tasks";
                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) > 0)
                    {
                        echo '<table>';
                        echo '<tr><th>ID</th> <th>Task Name</th> <th>Task Description</th> <th>Due Date</th> <th>Status</th ><th></th>  <th></th> </tr>';

                        $i = 1;

                        while ($row = mysqli_fetch_assoc($result))
                        {
                            echo "<tr><td>$i</td>
                            <td>" . $row['task_name']."</td>
                            <td>" . $row['task_description']."</td>
                            <td>" . $row['due_date']."</td>
                            <td>
                                <form action='edit-status1.php?id=$id' method='post'>
                                    <input type='submit' value='Pending'  name='status'>
                                    <input type='submit' value='Completed' name='status'>
                                </form>
                            </td>
                            <td><a href='edit-task.php?id=" . $row['id'] . "'>Edit</a></td>" .
                            "<td><a href='delete-task.php?id=" . $row['id'] . "'>Delete</a></td></tr>";
                            $i++;
                        }
                        
                        echo '</table>';
                    }
                    else
                        echo "<h3>No records found</h3>";
                ?>
        </div>
    </body>
</html>
