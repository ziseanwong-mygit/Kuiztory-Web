<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuiztory - Delete Class</title>
    <link rel="icon" type="image/x-icon" href="../images/Kuiztory_logo_trans.png">
    <link rel="stylesheet" href="./styles/deleteClass.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php
        include './crudWKS/DBconnection.php';
        $refClassID = $_GET['classid'];
    ?>

    <!-- Header -->
    <?php 
        if(isset($_SESSION['SES_TeaID'])) {
            include "WKSheader.php";
        }
    ?>

    <h1 class="title">Delete Class</h1>
    <p class="description">Teacher Class Deletion Confirmation Message</p>

    
    <section class="delete-confirm-box">
        <h1 class="delete-acc-question">Are you sure you want to delete your class?</h1>
        <p class="delete-acc-warning">The action you will execute will permanently erase all the class data from the database!</p>
        <form action="" method="POST">
            <input class="action-btn delete-btn" type="submit" name="deleteClass" value="Yes, delete my class">
            <input class="action-btn cancel-btn" type="button" onclick="history.back();" value="No, I changed my mind">
        </form>
    </section>
    
    <?php
        if(isset($_POST['deleteClass'])) {
            include './crudWKS/DBconnection.php';
            $flagFullDelete = FALSE;

            // Search enrollment records to delete
            $query =  "SELECT * FROM enrollment WHERE ClassID = '$refClassID';";
            $results = mysqli_query($connection, $query);
            $data = mysqli_fetch_assoc($results);

            if(!(empty($data))) {
                $query2 = "DELETE FROM enrollment WHERE ClassID = '$refClassID';";
                $results2 = mysqli_query($connection, $query2);
                if($results2) {
                    $flagFullDelete = TRUE;
                } else {
    ?>
                    <script>
                        alert("Sorry! You have failed to delete this class as something unexpceted happened in the query. Please try again.");
                        window.location = "assessmentWorkshop.php";
                    </script>
    <?php                
                }
            } else {
                $flagFullDelete = TRUE;
            }

            if($flagFullDelete) {
                $query3 = "DELETE FROM class WHERE ClassID = '$refClassID';";
                $results3 = mysqli_query($connection, $query3);
                if($results3) {
    ?>
                    <script>
                        alert("You have successfully deleted your class! Please check the class record to see if it has been deleted.");
                        window.location = "assessmentWorkshop.php";
                    </script>
    <?php
                } else {
    ?>
                    <script>
                        alert("Sorry! You have failed to delete this class as something unexpceted happened in the query. Please try again.");
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