<?php
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'task_manager';

    $conn = mysqli_connect($host, $username, $password, $dbname);

    if (empty($conn))
    {
        die("Connection failed: " . mysqli_connect_error());
    }
?>