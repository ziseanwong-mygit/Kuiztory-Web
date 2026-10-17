<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuiztory - Delete Question</title>
    <link rel="icon" type="image/x-icon" href="../images/Kuiztory_logo_trans.png">
    <link rel="stylesheet" href="./styles/deleteQuestion.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php
        include './crudWKS/DBconnection.php';
        $refQuesID = $_GET['quesid'];
        $refAssmtCode = $_GET['assmtcode'];
    ?>

    <!-- Header -->
    <?php 
        if(isset($_SESSION['SES_TeaID'])) {
            include "WKSheader.php";
        }
    ?>

    <h1 class="title">Delete Question</h1>
    <p class="description">Assessment Question Deletion Confirmation Message</p>

    
    <section class="delete-confirm-box">
        <h1 class="delete-acc-question">Are you sure you want to delete your question?</h1>
        <p class="delete-acc-warning">The action you will execute will permanently erase all the class data from the database!</p>
        <form action="" method="POST">
            <input class="action-btn delete-btn" type="submit" name="deleteQues" value="Yes, delete my question">
            <input class="action-btn cancel-btn" type="button" onclick="history.back();" value="No, I changed my mind">
        </form>
    </section>

    <?php
        if(isset($_POST['deleteQues'])) {
            include './crudWKS/DBconnection.php';
            $flagFullDelete = FALSE;

            // Get question type
            $query = "SELECT QueType, QueNum FROM question WHERE QuesID = '$refQuesID';";
            $results = mysqli_query($connection, $query);
            $data = mysqli_fetch_assoc($results);
            $refQuestionType = $data['QueType'];
            $refQuestionNum = $data['QueNum'];

            if ($refQuestionType == "MCQ") { // If question type is MCQ, delete choices first
                $query2 = "DELETE FROM choice WHERE QuesID = '$refQuesID';";
                $results2 = mysqli_query($connection, $query2);

                if ($results2) {
                    $flagFullDelete = TRUE;
                } else {
    ?>
                    <script>
                        alert("Sorry! You have failed to delete this question as something unexpceted happened in the query. Please try again.");
                        window.location = "assessmentWorkshop.php";
                    </script>
    <?php                
                }
            } else {
                $flagFullDelete = TRUE;
            }

            if($flagFullDelete) {
                $query3 = "DELETE FROM question WHERE QuesID = '$refQuesID';";
                $results3 = mysqli_query($connection, $query3);
                if($results3) {                        
                    // Update question numbers after deletion
                    $query4 = "SELECT QuesID, QueNum FROM question WHERE AssmtCode = '$refAssmtCode';";
                    $results4 = mysqli_query($connection, $query4);
                    while ($data4 = mysqli_fetch_assoc($results4)) {
                        $getQuesID = $data4['QuesID'];
                        $currentQueNum = $data4['QueNum'];

                        if($currentQueNum > $refQuestionNum) {
                            $newQueNum = $currentQueNum - 1;

                            $query5 = "UPDATE question SET QueNum = '$newQueNum' WHERE QuesID = '$getQuesID';";
                            $results5 = mysqli_query($connection, $query5);
                        }
                    }
    ?>
                    <script>
                        alert("You have successfully deleted your question! Please check the question record to see if it has been deleted.");
                        window.location = "manageQuestion.php?assmtcode=<?php echo $refAssmtCode?>";
                    </script>
    <?php
                } else {
    ?>
                    <script>
                        alert("Sorry! You have failed to delete this question as something unexpceted happened in the query. Please try again.");
                        window.location = "manageQuestion.php?assmtcode=<?php echo $refAssmtCode?>";
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