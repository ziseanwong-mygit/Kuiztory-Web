<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuiztory - View Pass Attempts</title>
    <link rel="icon" type="image/x-icon" href="./images/Kuiztory_logo_trans.png">
    <link rel="stylesheet" href="./styles/viewAttempt.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <!-- Header -->
    <?php 
        $_SESSION['SES_StuID'] = "STU_ZRPLYWBQ7C"; // need to follow based on login
        if(isset($_SESSION['SES_StuID']) || isset($_SESSION['SES_TeaID'])) {
            include "header2.php";
        } else {
            include "header.php";
        }
    ?>

    <h1 class="title">View Pass Attempts</h1>
    <p class="description">You can view the list of past attempts you have done in the table below.</p>

    <section class="table-container">
        <table>
            <tr>
                <th>Attempt ID</th>
                <th>Attempt Date</th>
                <th>Assessment Name</th>
                <th>Grade Level</th>
                <th>Chapter</th> 
                <th>Topic</th> 
                <th>Difficulty</th>                   
                <th>Num of Correct Questions</th>
                <th>Num of Incorrect Questions</th>
                <th>Attempt Status</th>
            </tr>

            <?php
                include './phpcrud/DBconnection.php';
                if(isset($_SESSION['SES_StuID'])) { // For student
                    $refStuID = $_SESSION['SES_StuID'];

                    $query = "SELECT * FROM attempt WHERE StudentID = '$refStuID';";
                    $results = mysqli_query($connection, $query);
                    while($data = mysqli_fetch_assoc($results)) {
                        $AttemptID = $data['AttemptID'];
                        $AssmtCode = $data['AssmtCode'];
                        $AtmptDate = $data['AtmptDate'];
                        $AtmptStatus = $data['AtmptStatus'];
                        $NumCorrect = $data['NumCorrect'];
                        $NumIncorrect = $data['NumIncorrect'];

                        $query3 = "SELECT * FROM assessment WHERE AssmtCode = '$AssmtCode';";
                        $results3 = mysqli_query($connection, $query3);
                        $data3  = mysqli_fetch_assoc($results3);
                        $AssmtName = $data3['AssmtName'];
                        $AssmtGradeLvl = $data3['AssmtGradeLvl'];
                        $AssmtChapter = $data3['AssmtChapter'];
                        $AssmtTopic = $data3['AssmtTopic'];
                        $AssmtDifficulty = $data3['AssmtDifficulty'];
            ?>
                    <tr>
                        <td><?php echo $AttemptID;?></td>
                        <td><?php echo $AtmptDate;?></td>
                        <td><?php echo $AssmtName;?></td>
                        <td><?php echo $AssmtGradeLvl;?></td>
                        <td><?php echo $AssmtChapter;?></td>
                        <td><?php echo $AssmtTopic;?></td>
                        <td><?php echo $AssmtDifficulty;?></td>
                        <td><?php echo $NumCorrect;?></td>
                        <td><?php echo $NumIncorrect;?></td>
                        <td><?php echo $AtmptStatus;?></td>
                    </tr>
            <?php
                    }
                } else { // For teacher
                    $refTeaID = $_SESSION['SES_TeaID'];

                    $query = "SELECT * FROM attempt WHERE TeacherID = '$refTeaID';";
                    $results = mysqli_query($connection, $query);
                    while($data = mysqli_fetch_assoc($results)) {
                        $AttemptID = $data['AttemptID'];
                        $AssmtCode = $data['AssmtCode'];
                        $AtmptDate = $data['AtmptDate'];
                        $AtmptStatus = $data['AtmptStatus'];
                        $NumCorrect = $data['NumCorrect'];
                        $NumIncorrect = $data['NumIncorrect'];

                        $query3 = "SELECT * FROM assessment WHERE AssmtCode = '$AssmtCode';";
                        $results3 = mysqli_query($connection, $query3);
                        $data3  = mysqli_fetch_assoc($results3);
                        $AssmtName = $data3['AssmtName'];
                        $AssmtGradeLvl = $data3['AssmtGradeLvl'];
                        $AssmtChapter = $data3['AssmtChapter'];
                        $AssmtTopic = $data3['AssmtTopic'];
                        $AssmtDifficulty = $data3['AssmtDifficulty'];
            ?>
                    <tr>
                        <td><?php echo $AttemptID;?></td>
                        <td><?php echo $AtmptDate;?></td>
                        <td><?php echo $AssmtName;?></td>
                        <td><?php echo $AssmtGradeLvl;?></td>
                        <td><?php echo $AssmtChapter;?></td>
                        <td><?php echo $AssmtTopic;?></td>
                        <td><?php echo $AssmtDifficulty;?></td>
                        <td><?php echo $NumCorrect;?></td>
                        <td><?php echo $NumIncorrect;?></td>
                        <td><?php echo $AtmptStatus;?></td>
                    </tr>
            <?php
                    }                    
                }
            ?>
        </table>
    </section>

    <!-- Footer -->
    <?php include "footer.php";?>
</body>
</html>            