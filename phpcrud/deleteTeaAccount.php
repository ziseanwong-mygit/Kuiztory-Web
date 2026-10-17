<?php
    include 'DBconnection.php';
    $refTeacherID = $_SESSION['SES_TeaID'];
    $flagReadyDelete = FALSE;
    $flagReadyDelete2 = FALSE;
    $flagReadyDelete3 = FALSE;

    $flagReadyDelete4 = FALSE;
    $flagReadyDelete5 = FALSE;
    $flagReadyDelete6 = FALSE;
    $flagReadyDelete7 = FALSE;

    $flagReadyDelete8 = FALSE;
    $flagReadyDelete9 = FALSE;

    // Get Attempt ID to delete other records
    $query = "SELECT AttemptID FROM attempt WHERE TeacherID = '$refTeacherID';";
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

    // Get assessment code to delete other records
    $query6 = "SELECT AssmtCode FROM assessment WHERE TeacherID = '$refTeacherID';";
    $results6 = mysqli_query($connection, $query6);

    // If no asssessments exist, set flag to TRUE
    if (mysqli_num_rows($results6) == 0) {
        $flagReadyDelete4 = TRUE;
    } else {
        while ($data6 = mysqli_fetch_assoc($results6)) {
            $refAssmtCode = $data6['AssmtCode'];

            // Process comments, questions, statistics and choice deletion
            $flagReadyDelete5 = $flagReadyDelete6 = $flagReadyDelete7 = TRUE;

            $query7 = "SELECT * FROM question WHERE AssmtCode = '$refAssmtCode';";
            $results7 = mysqli_query($connection, $query7);
            if (mysqli_num_rows($results7) > 0) {
                $data7 = mysqli_fetch_assoc($results7);
                $refQuestionID = $data7['QuesID'];

                $query8 = "SELECT * FROM choice WHERE QuesID = '$refQuestionID';";
                $results8 = mysqli_query($connection, $query8);
                if (mysqli_num_rows($results8) > 0) {
                    $query9 = "DELETE FROM choice WHERE QuesID = '$refQuestionID';";
                    $results9 = mysqli_query($connection, $query9);
                    if ($results9) {
                        $query10 = "DELETE FROM question WHERE AssmtCode = '$refAssmtCode';";
                        $flagReadyDelete5 = mysqli_query($connection, $query10);
                    }
                } else {
                    $query11 = "DELETE FROM question WHERE AssmtCode = '$refAssmtCode';";
                    $flagReadyDelete5 = mysqli_query($connection, $query11);
                }
            }   
            
            $query12 = "SELECT * FROM `statistics` WHERE AssmtCode = '$refAssmtCode';";
            $results12 = mysqli_query($connection, $query12);
            if (mysqli_num_rows($results12) > 0) {
                $query13 = "DELETE FROM `statistics` WHERE AssmtCode = '$refAssmtCode';";
                $flagReadyDelete6 = mysqli_query($connection, $query13);
            }

            $query14 = "SELECT * FROM comment WHERE AssmtCode = '$refAssmtCode';";
            $results14 = mysqli_query($connection, $query14);
            if (mysqli_num_rows($results14) > 0) {
                $query15 = "DELETE FROM comment WHERE AssmtCode = '$refAssmtCode';";
                $flagReadyDelete7 = mysqli_query($connection, $query15);
            }

            // Only delete assessment if question, comment, choice and statistics deletion were successful
            if ($flagReadyDelete5 && $flagReadyDelete6 && $flagReadyDelete7) {
                $query16 = "DELETE FROM assessment WHERE AssmtCode = '$refAssmtCode';";
                $flagReadyDelete4 = mysqli_query($connection, $query16);
            } else {
                $flagReadyDelete4 = FALSE;
            }
        }
    }

    // Get Class ID to delete other records
    $query17 = "SELECT ClassID FROM class WHERE TeacherID = '$refTeacherID';";
    $results17 = mysqli_query($connection, $query17);
    
    // If no classes exist, set flag to TRUE
    if (mysqli_num_rows($results17) == 0) {
        $flagReadyDelete = TRUE;
    } else {
        while ($data17 = mysqli_fetch_assoc($results17)) {
            $refClassID = $data17['ClassID'];

            // Process results and answers deletion
            $flagReadyDelete9 = TRUE;

            $query18 = "SELECT * FROM enrollment WHERE ClassID = '$refClassID';";
            $results18 = mysqli_query($connection, $query18);
            if (mysqli_num_rows($results18) > 0) {
                $query19 = "DELETE FROM enrollment WHERE ClassID = '$refClassID';";
                $flagReadyDelete9 = mysqli_query($connection, $query19);
            }

            // Only delete class if enrollment deletion were successful
            if ($flagReadyDelete9) {
                $query20 = "DELETE FROM class WHERE ClassID = '$refClassID';";
                $flagReadyDelete8 = mysqli_query($connection, $query20);
            } else {
                $flagReadyDelete8 = FALSE;
            }
        }
    }
    
    if ($flagReadyDelete && $flagReadyDelete4 && $flagReadyDelete8) {
        //Delete student record
        $query21 = "DELETE FROM teacher WHERE TeacherID = '$refTeacherID';";
        $results21 = mysqli_query($connection, $query21);
        if ($results21) {
            unset($_SESSION['SES_TeaID']); // logout the user
            session_destroy();
?>
            <script>
                alert("You have successfully deleted your teacher account. Hope you can come back again to create more quizzes in the future!");
                window.location = "./index.php";
            </script>
<?php
        } else {
?>
            <script>
                alert("Sorry! You have failed to delete your teacher account from the database. Please try again!");
                window.location = "./teacherDashboard.php";
            </script>
<?php
        }
    } else {
?>
        <script>
            alert("Sorry! You have failed to delete your teacher account from the database. Please try again!");
            window.location = "./teacherDashboard.php";
        </script>
<?php        
    }
?>