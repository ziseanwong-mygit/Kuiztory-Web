<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuiztory - Delete Assessment</title>
    <link rel="icon" type="image/x-icon" href="../images/Kuiztory_logo_trans.png">
    <link rel="stylesheet" href="./styles/deleteAssessment.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php
        include './crudWKS/DBconnection.php';
        $refAssmtCode = $_GET['assmtcode'];
    ?>

    <!-- Header -->
    <?php 
        if(isset($_SESSION['SES_TeaID'])) {
            include "WKSheader.php";
        }
    ?>

    <h1 class="title">Delete Assessment</h1>
    <p class="description">Teacher Quiz Deletion Confirmation Message</p>

    
    <section class="delete-confirm-box">
        <h1 class="delete-acc-question">Are you sure you want to delete your assessment?</h1>
        <p class="delete-acc-warning">The action you will execute will permanently erase all the assessment data from the database!</p>
        <form action="" method="POST">
            <input class="action-btn delete-btn" type="submit" name="deleteAssessment" value="Yes, delete my assessment">
            <input class="action-btn cancel-btn" type="button" onclick="history.back();" value="No, I changed my mind">
        </form>
    </section>
    
    <?php
        // Delete process:
        // 1. Find existing records from child table that uses AssmtCode as foreign keys.
        // 2. Instant assessment deletion is not allowed unless ON CASCADE DELETE is implemented; in this case is not.
        // 3. If found, delete the record from child table.
        // 4. For attempts, its ID is linked to answer. So need to delete answer first before deleting attempts.
        // 5. For questions, its ID is linked to choice. So need to delete choice first before deleting questions.
        // 6. If $flagFullDelete is TRUE, the assessment deletion is successful, otherwise it fails.
    ?>
    
    <?php
        if(isset($_POST['deleteAssessment'])) {
            include './crudWKS/DBconnection.php';
            $flagFullDelete = FALSE;

            // Search statistics records to delete
            $query =  "SELECT * FROM `statistics` WHERE AssmtCode = '$refAssmtCode';";
            $results = mysqli_query($connection, $query);
            $data = mysqli_fetch_assoc($results);

            if(!(empty($data))) {
                $query2 = "DELETE FROM `statistics` WHERE AssmtCode = '$refAssmtCode';";
                $results2 = mysqli_query($connection, $query2);
                if($results2) {
                    $flagFullDelete = TRUE;
                } else {
                    $flagFullDelete = FALSE;
    ?>
                    <script>
                        alert("Sorry! You have failed to delete this assessment as something unexpceted happened in the query. Please try again.");
                        window.location = "assessmentWorkshop.php";
                    </script>
    <?php                
                }
            } else {
                $flagFullDelete = TRUE;
            }

            // Search result records to delete
            $query3 =  "SELECT * FROM result WHERE AssmtCode = '$refAssmtCode';";
            $results3 = mysqli_query($connection, $query3);
            $data3 = mysqli_fetch_assoc($results3);

            if(!(empty($data3))) {
                $query4 = "DELETE FROM `result` WHERE AssmtCode = '$refAssmtCode';";
                $results4 = mysqli_query($connection, $query4);
                if($results4) {
                    $flagFullDelete = TRUE;
                } else {
                    $flagFullDelete = FALSE;
    ?>
                    <script>
                        alert("Sorry! You have failed to delete this assessment as something unexpceted happened in the query. Please try again.");
                        window.location = "assessmentWorkshop.php";
                    </script>
    <?php                
                }
            } else {
                $flagFullDelete = TRUE;
            }

            // Get AttemptID for answer deletion
            $query5 =  "SELECT AttemptID FROM attempt WHERE AssmtCode = '$refAssmtCode';";
            $results5 = mysqli_query($connection, $query5);
            while ($data5 = mysqli_fetch_assoc($results5)) {
                $refAtmptID = $data5['AttemptID'];

                // If one or more attempts exist, need to delete answer and attempt
                if(!(empty($data5))) {
                    // Search answer records to delete
                    $query6 =  "SELECT * FROM answer WHERE AttemptID = '$refAtmptID';";
                    $results6 = mysqli_query($connection, $query6);
                    $data6 = mysqli_fetch_assoc($results6);
                    
                    // If one or more answers exist, need to delete answer
                    if(!(empty($data6))) {
                        // Delete answers
                        $query7 = "DELETE FROM `answer` WHERE AttemptID = '$refAtmptID';";
                        $results7 = mysqli_query($connection, $query7);
                        if($results7) {
                            $flagFullDelete = TRUE;
                        } else {
                            $flagFullDelete = FALSE;
    ?>
                            <script>
                                alert("Sorry! You have failed to delete this assessment as something unexpceted happened in the query. Please try again.");
                                window.location = "assessmentWorkshop.php";
                            </script>
        <?php                
                        }
                    } else {
                        $flagFullDelete = TRUE;
                    }

                    // Delete attempts
                    $query8 = "DELETE FROM `attempt` WHERE AttemptID = '$refAtmptID';";
                    $results8 = mysqli_query($connection, $query8);
                    if($results8) {
                        $flagFullDelete = TRUE;
                    } else {
                        $flagFullDelete = FALSE;
        ?>
                        <script>
                            alert("Sorry! You have failed to delete this assessment as something unexpceted happened in the query. Please try again.");
                            window.location = "assessmentWorkshop.php";
                        </script>
    <?php                
                    }
                } else {
                    $flagFullDelete = TRUE;
                }
            }

            // Get QuestionID for choice deletion
            $query9 =  "SELECT QuesID FROM question WHERE AssmtCode = '$refAssmtCode';";
            $results9 = mysqli_query($connection, $query9);
            while ($data9 = mysqli_fetch_assoc($results9)) {
                $refQuesID = $data9['QuesID'];

                // If one or more questions exist, need to delete question and choice
                if(!(empty($data9))) {
                    // Search choice records to delete
                    $query10 =  "SELECT * FROM choice WHERE QuesID = '$refQuesID';";
                    $results10 = mysqli_query($connection, $query10);
                    $data10 = mysqli_fetch_assoc($results10);
                    
                    // If one or more choices exist, need to delete choice
                    if(!(empty($data10))) {
                        // Delete choices
                        $query11 = "DELETE FROM `choice` WHERE QuesID = '$refQuesID';";
                        $results11 = mysqli_query($connection, $query11);
                        if($results11) {
                            $flagFullDelete = TRUE;
                        } else {
                            $flagFullDelete = FALSE;
    ?>
                            <script>
                                alert("Sorry! You have failed to delete this assessment as something unexpceted happened in the query. Please try again.");
                                window.location = "assessmentWorkshop.php";
                            </script>
        <?php                
                        }
                    } else {
                        $flagFullDelete = TRUE;
                    }

                    // Delete questions
                    $query12 = "DELETE FROM `question` WHERE QuesID = '$refQuesID';";
                    $results12 = mysqli_query($connection, $query12);
                    if($results12) {
                        $flagFullDelete = TRUE;
                    } else {
                        $flagFullDelete = FALSE;
        ?>
                        <script>
                            alert("Sorry! You have failed to delete this assessment as something unexpceted happened in the query. Please try again.");
                            window.location = "assessmentWorkshop.php";
                        </script>
    <?php                
                    }
                } else {
                    $flagFullDelete = TRUE;
                }
            }

            // Search comment records to delete
            $query13 =  "SELECT * FROM comment WHERE AssmtCode = '$refAssmtCode';";
            $results13 = mysqli_query($connection, $query13);
            $data13 = mysqli_fetch_assoc($results13);

            if(!(empty($data13))) {
                $query14 = "DELETE FROM `comment` WHERE AssmtCode = '$refAssmtCode';";
                $results14 = mysqli_query($connection, $query14);
                if($results14) {
                    $flagFullDelete = TRUE;
                } else {
                    $flagFullDelete = FALSE;
    ?>
                    <script>
                        alert("Sorry! You have failed to delete this assessment as something unexpceted happened in the query. Please try again.");
                        window.location = "assessmentWorkshop.php";
                    </script>
    <?php                
                }
            } else {
                $flagFullDelete = TRUE;
            }

            if($flagFullDelete) {
                $query15 = "DELETE FROM `assessment` WHERE AssmtCode = '$refAssmtCode';";
                $results15 = mysqli_query($connection, $query15);
                if($results15) {
    ?>                
                    <script>
                        alert("You have successfully deleted your assessment! Please check the assessment record to see if it has been deleted.");
                        window.location = "assessmentWorkshop.php";
                    </script>
    <?php                
                } else {
    ?>
                    <script>
                        alert("Sorry! You have failed to delete this assessment as something unexpceted happened in the query. Please try again.");
                        window.location = "assessmentWorkshop.php";
                    </script>
    <?php                
                }    
            }
        }
    ?>

    <!-- Footer -->
    <?php include "WKSfooter.php";?>
</body>
</html>