<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./images/Kuiztory_logo_trans.png">
    <title>Kuiztory - Progress Paused</title>
    <link rel="stylesheet" href="./styles/pauseAssessment.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php
        // Set $_GET variables
        $assmtCode = $_GET['assmtcode'];
        $currentQueNo = $_GET['quesno'];
        $attemptID = $_GET['atmptID'];
        $currentStreak = $_GET['streak'];
        $highestStreak = $_GET['highstreak'];
    ?>

    <button id="exit" onclick="exitFunc()"><i class="fa fa-times-circle" style="padding-right:10px;"></i>Exit Assessment</button>
    <div class="container">
        <h2 class="title">Assessment Progress Paused</h2>
        <p class="description">It's important to take breaks. Take a deep breath or grab a drink.</p>
        <button class="button" onclick="location.href='answerQues.php?assmtcode=<?php echo $assmtCode?>&quesno=<?php echo $currentQueNo?>&atmptID=<?php echo $attemptID?>&streak=<?php echo $currentStreak?>&highstreak=<?php echo $highestStreak?>';">▶ I am prepared. Let's resume!</button>
    <?php
        include './phpcrud/DBconnection.php';

        // Get total number of questions answered
        $query = "SELECT COUNT(AnswerID) AS TotalAnswered FROM answer WHERE AttemptID = '$attemptID';";
        $results = mysqli_query($connection, $query);
        $data = mysqli_fetch_assoc($results);

        // Get total number of questions in assessment
        $query2 = "SELECT COUNT(QuesID) AS TotalQuestion FROM question WHERE AssmtCode = '$assmtCode';";
        $results2 = mysqli_query($connection, $query2);
        $data2 = mysqli_fetch_assoc($results2);

        // Get total marks
        $query3 = "SELECT SUM(AnswerMark) AS TotalMarks FROM answer WHERE AttemptID = '$attemptID';";
        $results3 = mysqli_query($connection, $query3);
        $data3 = mysqli_fetch_assoc($results3);

        $query4 = "SELECT SUM(QueMark) AS TotalQueMarks FROM question WHERE AssmtCode = '$assmtCode';";
        $results4 = mysqli_query($connection, $query4);
        $data4 = mysqli_fetch_assoc($results4);

        $query5 = "SELECT NumCorrect, NumIncorrect FROM attempt WHERE AttemptID = '$attemptID';";
        $results5 = mysqli_query($connection, $query5);
        $data5 = mysqli_fetch_assoc($results5);
    ?>
        <div class="stats">
            <h3 style="font-size:25px;text-decoration:underline;">See Your Stats</h3>
            <p>
                <strong>Total questions answered:</strong> 
                <span style="color:yellow;font-weight:bold;"><?php echo $data['TotalAnswered'];?></span> / <?php echo $data2['TotalQuestion'];?>
            </p>
            <p>
                <strong>Num of correct answers:</strong>
                <span style="color:yellow;font-weight:bold;"><?php echo $data5['NumCorrect'];?></span>
            </p>
            <p>
                <strong>Num of incorrect answers:</strong>
                <span style="color:yellow;font-weight:bold;"><?php echo $data5['NumIncorrect'];?></span>
            </p>
            <p>
                <strong>Total marks:</strong>
                <?php
                    if ($data3['TotalMarks'] == NULL) {
                        $totalmark = 0;
                    } else {
                        $totalmark = $data3['TotalMarks'];
                    }
                ?>
                <span style="color:yellow;font-weight:bold;"><?php echo $totalmark;?></span> / <?php echo $data4['TotalQueMarks'];?>
            </p>
            <p>
                <strong>Current Streak:</strong>
                <span style="color:yellow;font-weight:bold;"><?php echo $currentStreak;?></span>
            </p>
            <p>
                <strong>Highest Streak:</strong>
                <span style="color:yellow;font-weight:bold;"><?php echo $highestStreak;?></span>
            </p>
        </div>
    </div>

    <script>
        /*
        function changeBg(color) {
            document.body.style.backgroundColor = color;
        }
        */

        function exitFunc() {
            if(confirm("Are you sure you want to exit this session? You will lose all the progress and attempt will be marked as incomplete.") == true) {
                alert("Alright... Hope you can finish this quiz next time.");
                window.location = "homePage.php";
            } else {

            }
        }
    </script>
</body>
</html>
