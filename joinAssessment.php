<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuiztory - Join Quiz</title>
    <link rel="icon" type="image/x-icon" href="./images/Kuiztory_logo_trans.png">
    <link rel="stylesheet" href="./styles/joinAssessment.css">
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

    <h1>Join An Assessment</h1>
    <p style="color: blue;">Connect Your Learning Experience with A Code</p>
    <div class="container">
        <form action="" method="POST">
            <input type="text" name="inputCode" placeholder="Type your code here (eg: A01B02C034)">
            <br>
            <button class="btn btn-primary" type="submit" name="launchQ">
                <i class="fa fa-play" style="padding-right: 10px;"></i>
                Launch Quiz
            </button>
        </form>
        <br>
        <p class="container-footer">Unable to launch the assessment? Search the assessment or contact your teacher/creator.</p>
    </div>

    <?php
        if(isset($_POST['launchQ'])) {
            include './phpcrud/DBconnection.php';

            $getCode = $_POST['inputCode'];
            if (str_contains($getCode, 'ASSMT_')) {
                $formatCode = $getCode;
            } else {
                $formatCode = "ASSMT_" . $getCode;
            }

            $query = "SELECT * FROM assessment WHERE AssmtCode = '$formatCode';";

            $results = mysqli_query($connection, $query);
        
            $data = mysqli_fetch_assoc($results);
            $visibility = $data['AssmtVisibility'];

            if(empty($data)) {
    ?>
                <script>
                    alert("Sorry! This assessment does not exist! Please enter another code.");
                </script>
    <?php
            } else {
                if($visibility == "Private") {
    ?>
                    <script>
                        alert("Sorry! This assessment is not available to students or any users now.")
                    </script>
    <?php
                } else {
    ?>
                    <script>
                        alert("Assessment found! You will be redirected to its info page.");
                        window.location.href="selectedAssessment.php?assmtcode=<?php echo $formatCode?>";
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
