<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../images/Kuiztory_logo_trans.png">
    <title>Kuiztory - Teacher Workshop</title>
    <link rel="stylesheet" href="./styles/assessmentWorkshop.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php
        include './crudWKS/DBconnection.php';
    ?>

    <!-- Header -->
    <?php 
        if(isset($_SESSION['SES_TeaID'])) {
            include "WKSheader.php";
        }
    ?>

    <?php
        $refTeachID = $_SESSION['SES_TeaID'];

        $query = "SELECT TeacherName FROM teacher WHERE TeacherID = '$refTeachID';";
        $results = mysqli_query($connection, $query);
        $data = mysqli_fetch_assoc($results);

        $TeachName = $data['TeacherName'];
    ?>

    <h1 class="title-page">Welcome to Your Workshop, <?php echo $TeachName;?></h1>
    <p style="color:magenta; text-align:center;">Create and manage your assessments and classes are in one place</p>
    
    <section class="main-action-container">
        <h2 style="text-align:center;margin-top:-5px;color:white;">You can begin or continue your workshop process by:</h2>
        <div class="actions">
            <button class="main-btn btn1" onclick="location.href='createClass.php';">
                <i class="fa fa-plus-square" style="padding-right:10px;"></i>
                Create a class
            </button>
            <button class="main-btn btn2" onclick="location.href='createAssessment.php';">
            <i class="fa fa-plus-square" style="padding-right:10px;"></i>
                Create an assessment
            </button>
            <button class="main-btn btn3" onclick="location.href='manageClass.php';">
            <i class="fa fa-desktop" style="padding-right:10px;"></i>
                Manage classes
            </button>
            <button class="main-btn btn4" onclick="location.href='manageAssessment.php';">
            <i class="fa fa-desktop" style="padding-right:10px;"></i>
                Manage assessments
            </button>
        </div>
    </section>
    
    <div class="container">
        <div class="recent-assessments">
            <h3 style="font-size:35px;margin-top:-5px;">Recent assessments</h3>
            <?php
                $query2 = "SELECT * FROM assessment WHERE TeacherID = '$refTeachID' ORDER BY AssmtRegDate DESC LIMIT 3;";
                $results2 = mysqli_query($connection, $query2);

                while ($data2 = mysqli_fetch_assoc($results2)) {
                    $assmtCode = $data2['AssmtCode'];
                    $assmtName = $data2['AssmtName'];
                    $assmtDesc = $data2['AssmtDesc'];
                    $assmtDate = $data2['AssmtRegDate'];
                    $assmtGrade = $data2['AssmtGradeLvl'];
                    $assmtChap = $data2['AssmtChapter'];
                    $assmtTopic = $data2['AssmtTopic'];
                    $assmtVisible = $data2['AssmtVisibility'];
                    $assmtImg = $data2['AssmtBgImg'];
            ?>
            <div class="assessment">
                <div class="main-panel">
                    <div class="img-display">
                        <img src="../images/assmtBgImg/<?php echo $assmtImg;?>" alt="Question Image">
                    </div>
                    <div class="title-and-desc">
                        <h3 style="margin-top:-5px;"><?php echo $assmtCode?></h3>
                        <h1><?php echo $assmtName?></h1>
                        <p><?php echo $assmtDesc?></p>
                    </div>
                </div>
                <div class="info-panel">
                    <p><strong>Creation Date:</strong> <?php echo $assmtDate?></p>
                    <p><strong>Grade:</strong> <?php echo $assmtGrade?></p>
                    <p><strong>Chapter:</strong> <?php echo $assmtChap?></p>
                    <p><strong>Topic:</strong> <?php echo $assmtTopic?></p>
                    <p><strong>Visibility:</strong> <?php echo $assmtVisible?></p>
                </div>
                <div class="assessment-actions">
                    <button class="assess-btn manageQBtn" onclick="location.href='manageQuestion.php?assmtcode=<?php echo $assmtCode?>';">
                        <i class="fa fa-question-circle" style="padding-right:10px;"></i>
                        Manage Question
                    </button>
                    <button class="assess-btn editQuizBtn" onclick="location.href='editAssessment.php?assmtcode=<?php echo $assmtCode?>';">
                        <i class="fa fa-edit" style="padding-right:10px;"></i>
                        Edit Quiz
                    </button>
                    <button class="assess-btn deleteQuizBtn" onclick="location.href='deleteAssessment.php?assmtcode=<?php echo $assmtCode?>';">
                        <i class="fa fa-trash" style="padding-right:10px;"></i>
                        Delete Quiz
                    </button>
                    <button class="assess-btn viewRepBtn" onclick="location.href='viewReport.php?assmtcode=<?php echo $assmtCode?>';">
                        <i class="fa fa-file-text" style="padding-right:10px;"></i>
                        View Report
                    </button>
                    <button class="assess-btn viewStatBtn" onclick="location.href='viewStatistics.php?assmtcode=<?php echo $assmtCode?>';">
                        <i class="fa fa-line-chart" style="padding-right:10px;"></i>
                        View Statistics
                    </button>
                </div>
            </div>
            <?php        
                }
            ?>
            <button class="more-btn" onclick="location.href='moreAssessment.php';">More Assessments</button>
        </div>
    </div>    

    <div class="container">
        <div class="recent-classes">
            <h3 style="font-size:35px;margin-top:-5px;">Recent classes</h3>
            <?php
                $query3 = "SELECT * FROM class WHERE TeacherID = '$refTeachID' ORDER BY ClassRegDate DESC LIMIT 3;";
                $results3 = mysqli_query($connection, $query3);

                while ($data3 = mysqli_fetch_assoc($results3)) {
                    $classID = $data3['ClassID'];
                    $className = $data3['ClassName'];
                    $classDesc = $data3['ClassDesc'];
                    $classStat = $data3['ClassStatus'];
                    $classDate = $data3['ClassRegDate'];
            ?>
                    <div class="class">
                        <h3 style="margin-top:-5px;"><?php echo $classID?></h3>
                        <h1><?php echo $className?></h1>
                        <p><?php echo $classDesc?></p>
                        <div class="info-panel">
                            <p><strong>Creation Date:</strong> <?php echo $classDate?></p>
                            <p><strong>Class Status:</strong> <?php echo $classStat?></p>
                        </div>
                        <div class="class-actions">
                            <button class="class-btn manageMemberBtn" onclick="location.href='manageMembers.php?classid=<?php echo $classID?>';">
                                <i class="fa fa-users" style="padding-right:10px;"></i>
                                Manage Members
                            </button>
                            <button class="class-btn editClassBtn" onclick="location.href='editClass.php?classid=<?php echo $classID?>';">
                                <i class="fa fa-edit" style="padding-right:10px;"></i>
                                Edit Class
                            </button>
                            <button class="class-btn deleteClassBtn" onclick="location.href='deleteClass.php?classid=<?php echo $classID?>';">
                                <i class="fa fa-trash" style="padding-right:10px;"></i>
                                Delete Class
                            </button>
                        </div>
                    </div>
            <?php
                }
            ?>        
            <button class="more-btn" onclick="location.href='moreClass.php';">More Classes</button>
        </div>
    </div>

    <!-- Footer -->
    <?php include "WKSfooter.php";?>
</body>
</html>