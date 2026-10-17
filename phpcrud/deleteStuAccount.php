<?php
    include 'DBconnection.php';
    $refStudentID = $_SESSION['SES_StuID'];
    $flagReadyDelete = FALSE;
    $flagReadyDelete2 = FALSE;
    $flagReadyDelete3 = FALSE;
    $flagReadyDelete4 = FALSE;
    $flagReadyDelete5 = FALSE;

    // Get Attempt ID to delete other records
    $query = "SELECT AttemptID FROM attempt WHERE StudentID = '$refStudentID';";
    $results = mysqli_query($connection, $query);

    // If no attempts exist, set flag to TRUE
    if (mysqli_num_rows($results) == 0) {
        $flagReadyDelete = TRUE;
    } else {
        while ($data = mysqli_fetch_assoc($results)) {
            $refAttemptID = $data['AttemptID'];

            // Process results and answers deletion
            $flagReadyDelete2 = $flagReadyDelete3 = TRUE;

            $query4 = "SELECT * FROM result WHERE AttemptID = '$refAttemptID';";
            $results4 = mysqli_query($connection, $query4);
            if (mysqli_num_rows($results4) > 0) {
                $query2 = "DELETE FROM result WHERE AttemptID = '$refAttemptID';";
                $flagReadyDelete2 = mysqli_query($connection, $query2);
            }

            $query5 = "SELECT * FROM answer WHERE AttemptID = '$refAttemptID';";
            $results5 = mysqli_query($connection, $query5);
            if (mysqli_num_rows($results5) > 0) {
                $query3 = "DELETE FROM answer WHERE AttemptID = '$refAttemptID';";
                $flagReadyDelete3 = mysqli_query($connection, $query3);
            }

            // Only delete attempt if both result and answer deletion were successful
            if ($flagReadyDelete2 && $flagReadyDelete3) {
                $query6 = "DELETE FROM attempt WHERE AttemptID = '$refAttemptID';";
                $flagReadyDelete = mysqli_query($connection, $query6);
            } else {
                $flagReadyDelete = FALSE;
            }
        }
    }

    // Find records; if comments exist, delete comments
    $query7 = "SELECT * FROM comment WHERE StudentID = '$refStudentID';";
    $results7 = mysqli_query($connection, $query7);
    $data7 = mysqli_fetch_assoc($results7);

    if(!empty($data7)) {
        //Delete comments
        $query8 = "DELETE FROM comment WHERE StudentID = '$refStudentID';";
        $results8 = mysqli_query($connection, $query8);
        if ($results8) {
            $flagReadyDelete4 = TRUE;
        } else {
            $flagReadyDelete4 = FALSE;
        }
    } else {
        $flagReadyDelete4 = TRUE;
    }

    // Find records; if enrollments exist, delete enrollments
    $query9 = "SELECT * FROM enrollment WHERE StudentID = '$refStudentID';";
    $results9 = mysqli_query($connection, $query9);
    $data9 = mysqli_fetch_assoc($results9);
    
    if(!empty($data9)) {
        //Delete enrollments
        $query10 = "DELETE FROM enrollment WHERE StudentID = '$refStudentID';";
        $results10 = mysqli_query($connection, $query10);
        if ($results10) {
            $flagReadyDelete5 = TRUE;
        } else {
            $flagReadyDelete5 = FALSE;
        }
    } else {
        $flagReadyDelete5 = TRUE;
    }

    if ($flagReadyDelete && $flagReadyDelete4 && $flagReadyDelete5) {
        //Delete student record
        $query11 = "DELETE FROM student WHERE StudentID = '$refStudentID';";
        $results11 = mysqli_query($connection, $query11);
        if ($results11) {
            unset($_SESSION['SES_StuID']); // logout the user
            session_destroy();
?>
            <script>
                alert("You have successfully deleted your student account. Hope you can come back again to learn more history in the future!");
                window.location = "./index.php";
            </script>
<?php
        } else {
?>
            <script>
                alert("Sorry! You have failed to delete your student account from the database. Please try again!");
                window.location = "./studentDashboard.php";
            </script>
<?php
        }
    } else {
?>
        <script>
            alert("Sorry! You have failed to delete your student account from the database. Please try again!");
            window.location = "./studentDashboard.php";
        </script>
<?php        
    }
?>