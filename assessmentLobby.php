<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuiztory - Assessment Lobby</title>
    <link rel="icon" type="image/x-icon" href="./images/Kuiztory_logo_trans.png">
    <link rel="stylesheet" href="./styles/assessmentLobby.css">
    <link rel="stylesheet" href="./styles/header2.css">
    <link rel="stylesheet" href="./styles/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php
        $refCode = $_GET['assmtcode'];
        include './phpcrud/info_Assessment.php';
    ?>

    <?php
        if(isset($_POST["startAttempt"])) {
            include './phpcrud/addAttempt.php';
            header("Location: answerQues.php?assmtcode=$refCode&quesno=1&atmptID=$attemptID&streak=0&highstreak=0");
        }    
    ?>

    <!-- Header -->
    <?php 
        if(isset($_SESSION['SES_StuID']) || isset($_SESSION['SES_TeaID'])) {
            include "header2.php";
        } else {
            include "header.php";
        }
    ?>
    
    <main>
        <div class="container">
            <div class="left">
                <div class="share">
                    <p style="font-weight: bold;">Share with your friends<p>

                    <p>
                        <strong>Code: </strong>
                        <span id="copyCode" style="color: blue;"><?php echo $refTrimCode?></span> <!-- Different code here -->
                        <button onclick="copyToClipboard('copyCode')">
                            <i class="fa fa-clipboard" style="font-size: 20px"></i>
                        </button>
                    </p>
                </div>    
            </div>
            <div class="middle">
                <h1><?php echo $refName;?></h1>
                <p><?php echo $refDesc?></p>
                <?php
                    if($refOpenStatus == "Open") {
                ?>
                        <form action="" method="POST">
                            <input class="button-ready" type="submit" name="startAttempt" value="▶ I am ready. Bring it on!">
                        </form>
                <?php
                    } else {
                ?>     
                    <button class="button-closed">
                        You cannot start this quiz because it is closed
                    </button>
                <?php       
                    }
                ?>  
            </div>
            <div class="right">
                <div class="info">
                    <h3>Assessment Info</h3>
                    <?php
                        $query2 = "SELECT COUNT(QuesID) AS TotalQuestion FROM question WHERE AssmtCode = '$refCode';";
                        $results2 = mysqli_query($connection, $query2);
                        $data2 = mysqli_fetch_assoc($results2);
                    ?>
                    <p><strong>Num of questions:</strong> <?php echo $data2['TotalQuestion'];?></p>
                    <p><strong>Grade:</strong> <?php echo $refGrade?></p>
                    <p><strong>Chapter:</strong> <?php echo $refChapter?></p>
                    <p><strong>Topic:</strong> <?php echo $refTopic?></p>
                    <p><strong>Difficulty:</strong> <?php echo $refDiff?></p>
                    <p><strong>Creation date:</strong> <?php echo $refCreaDate?></p>
                    <p><strong>Created by:</strong> John Doe</p>
                </div>
            </div>
        </div>
    </main>

    <script> 
        function copyToClipboard(targetCopy) {
            var textCopy = document.getElementById(targetCopy).innerHTML;

            navigator.clipboard.writeText(textCopy);

            alert("Assessment ID copied!");
        }
    </script>

    <!-- Footer -->
    <?php include "footer.php";?>
</body>
</html>
