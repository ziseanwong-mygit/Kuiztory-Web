<?php
    $server = 'localhost'; //127.0.0.1
    $user = 'root';
    $password = '';
    $database = 'kuiztorydb';

    $connection = mysqli_connect($server, $user, $password, $database);
    
    if ($connection == false) {
        die("Connection failed!" . mysqli_correct_error());
    }
?>