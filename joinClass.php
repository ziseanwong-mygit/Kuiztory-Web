<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuiztory - Join Class</title>
    <link rel="icon" type="image/x-icon" href="./images/Kuiztory_logo_trans.png">
    <link rel="stylesheet" href="./styles/joinClass.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <!-- Header -->
    <?php 
        if(isset($_SESSION['SES_StuID']) || isset($_SESSION['SES_TeaID'])) {
            include "header2.php";
        } else {
            include "header.php";
        }
    ?>

    <h1>Join A Class</h1>
    <p style="color: blue;">Participate in a group for better group discussions and learning!</p>
    <div class="container">
        <form action="" method="POST">
            <input type="text" name="inputCode" placeholder="Type your class code here (eg: A01B02C034)">
            <br>
            <button class="btn btn-primary" type="submit" name="joinClss">
                <i class="fa fa-play" style="padding-right: 10px;"></i>
                Join Class
            </button>
        </form>
        <br>
        <p class="container-footer">If you are unable to join the class, contact your teacher about this case.</p>
    </div>

    <?php
        if(isset($_POST['joinClss'])) {
            include './phpcrud/DBconnection.php';

            $getCode = $_POST['inputCode'];
            if (str_contains($getCode, 'CLS_')) {
                $formatCode = $getCode;
            } else {
                $formatCode = "CLS_" . $getCode;
            }
            
            $query = "SELECT * FROM class WHERE ClassID = '$formatCode';";

            $results = mysqli_query($connection, $query);
        
            $data = mysqli_fetch_assoc($results);

            if(empty($data)) {
    ?>
                <script>
                    alert("Sorry! This class does not exist! Please enter another code.");
                </script>
    <?php
            } else {
                $refStuID = $_SESSION['SES_StuID'];
                $refClassID = $formatCode;

                $query2 = "SELECT * FROM enrollment WHERE StudentID = '$refStuID' AND ClassID = '$refClassID';";

                $results2 = mysqli_query($connection, $query2);

                $data2 = mysqli_fetch_assoc($results2);

                if(empty($data2)) {
                    $joinDate = date("Y-m-d");

                    $query3 = "INSERT INTO enrollment (StudentID, ClassID, EnrollDate) VALUES ('$refStuID', '$refClassID', '$joinDate');";

                    $results3 = mysqli_query($connection, $query3);

                    if($results3) {
    ?>
                        <script>
                            alert("You have successfully enrolled the class with code <?php echo $refClassID?>! Welcome abroad!")
                        </script>

            <?php        
                    } 
                } else {
            ?>
                    <script>
                        alert("You have already enrolled in this class! If you find problems in enrolling classes, please contact your teacher.");
                    </script>
            <?php
                }             
            }
        }
    ?>

    <!-- Footer -->
    <?php include "footer.php";?>
</body>
</html>
