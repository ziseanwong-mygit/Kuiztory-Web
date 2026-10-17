<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuiztory - Comment Result Feedback</title>
    <link rel="icon" type="image/x-icon" href="../images/Kuiztory_logo_trans.png">
    <link rel="stylesheet" href="./styles/commentFeedback.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <!-- Header -->
    <?php 
        if(isset($_SESSION['SES_TeaID'])) {
            include "WKSheader.php";
        }
    ?>

    <?php
        include './crudWKS/DBconnection.php';
        $refAssmtCode = $_GET['assmtcode'];
        $refResultID = $_GET['resultid'];
        $refUserID = $_GET['userid'];

        $query = "SELECT * FROM result WHERE ResultID = '$refResultID';";
        $results = mysqli_query($connection, $query);
        $data = mysqli_fetch_assoc($results);
        $currentFeedback = $data['TeacherFeedback'];

        if (str_starts_with($refUserID, 'STU_')) {
            $query2 = "SELECT * FROM student WHERE StudentID = '$refUserID';";
            $results2 = mysqli_query($connection, $query2);
            $data2 = mysqli_fetch_assoc($results2);
            $UserRole = "Student";
            $UserName = $data2['StudentName'];
            $UserGrade = $data2['StudentGradeLvl'];
            $UserSchool = $data2['StudentSchool'];
            $StuSPM = $data2['StudentSPM'];
        } else {
            $query3 = "SELECT * FROM teacher WHERE TeacherID = '$refUserID';";
            $results3 = mysqli_query($connection, $query3);
            $data3 = mysqli_fetch_assoc($results3);
            $UserRole = "Teacher";
            $UserName = $data3['TeacherName'];
            $UserGrade = $data3['TeachingLvl'];
            $UserSchool = $data3['TeacherSchool'];
            $TeaRole = $data3['TeacherRole'];
        }
    ?>
    
    <h1 class="title">Comment Result Feedback</h1>
    <p class="description">Give tips, advice or comments on the user's result for them to read and review!</p>
    <p class="description-2">You can add or update your feedback here.</p>

    <div class="info-panel">
        <button class="Back-Btn" onclick="location.href='viewReport.php?assmtcode=<?php echo $refAssmtCode?>';">
            <i class="fa fa-arrow-left" style="padding-right:10px;"></i>    
            Back to View Report Page
        </button>
        <div class="inner-panel">
            <h3 style="font-style:italic;"><?php echo $refResultID;?></h3>
            <?php
                if ($UserRole == "Student") {
            ?> 
                    <h3 style="color:yellow;"><?php echo $UserRole;?></h3>
            <?php
                } else {
            ?>
                    <h3 style="color:yellow;"><?php echo $UserRole ;?></h3>
            <?php        
                }
            ?>
        </div>
        <h2 style="padding-bottom:20px;font-weight:bold;"><?php echo $UserName;?></h2>
        <p style="padding-bottom:10px;">
            <strong>Grade Level:</strong>
            <?php echo $UserGrade;?>
        </p>
        <p style="padding-bottom:10px;">
            <strong>School:</strong>
            <?php echo $UserSchool;?>
        </p>
        <p>
            <?php
                if ($UserRole == "Student") {
            ?> 
                    <strong>SPM Student:</strong>
                    <?php echo $StuSPM;?>
            <?php
                } else {
            ?>
                    <strong>Teaching Role:</strong>
                    <?php echo $TeaRole;?>
            <?php        
                }
            ?>
        </p>
    </div>

    <div class="select-container">
        <h2 style="margin-bottom:20px;color:white;">Enter your comment here</h2>
        <form action="" method="POST">
            <textarea class="txtarea-comment" name="commentInput" required><?php echo $currentFeedback?></textarea><br>
            <input type="submit" class="submit-btn" name="updComment" value="Comment">
        </form>             
    </div>

    <?php
        if(isset($_POST['updComment'])) {
            include './crudWKS/addUpdComment.php';
        }
    ?>
    
    <!-- Footer -->
    <?php include "WKSfooter.php";?>
</body>
</html>