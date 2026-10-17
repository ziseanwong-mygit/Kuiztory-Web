<?php
    // Increment the number of correctly answered questions
    function incrementCorrect() {
        include 'DBconnection.php';
        $refAttemptID = $_GET['atmptID'];

        $query = "SELECT NumCorrect FROM attempt WHERE AttemptID = '$refAttemptID';";
        $results = mysqli_query($connection, $query);
        $data = mysqli_fetch_assoc($results);

        $currentCorrect = $data['NumCorrect'];
        $newCorrect = $currentCorrect + 1;

        $query2 = "UPDATE attempt SET NumCorrect = '$newCorrect' WHERE AttemptID = '$refAttemptID';";
    
        $results2 = mysqli_query($connection, $query2);
    }

    // Increment the number of incorrectly answered questions
    function incrementIncorrect() {
        include 'DBconnection.php';
        $refAttemptID = $_GET['atmptID'];

        $query = "SELECT NumIncorrect FROM attempt WHERE AttemptID = '$refAttemptID';";
        $results = mysqli_query($connection, $query);
        $data = mysqli_fetch_assoc($results);

        $currentIncorrect = $data['NumIncorrect'];
        $newIncorrect = $currentIncorrect + 1;

        $query2 = "UPDATE attempt SET NumIncorrect = '$newIncorrect' WHERE AttemptID = '$refAttemptID';";
    
        $results2 = mysqli_query($connection, $query2);
    }
?>