<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../images/Kuiztory_logo_trans.png">
    <title>Kuiztory - View Full Assessment Report</title>
    <link rel="stylesheet" href="./styles/viewFullReport.css">
    <link rel="stylesheet" href="./styles/WKSheader.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php
        $refResultID = $_GET['resultid'];
        include './crudWKS/info_Result_Report.php';
    ?>

    <header class="removePrint">
        <button class="exit-btn" onclick="location.href='viewReport.php?assmtcode=<?php echo $AssmtCode;?>';">
            <i class="fa fa-times-circle" style="padding-right:5px;"></i>
            Exit Report
        </button>
        <div class="logo">
            <a href="assessmentWorkshop.php">
                <img src="../images/Kuiztory_title_trans.png" alt="Kuiztory logo">
            </a>        
        </div>
        <div class="header-buttons">
            <button class="save-btn" onclick="print();">
                <i class="fa fa-download" style="padding-right:5px;"></i>
                Download & Print Report
            </button>
        </div>
    </header>

    <div class="title-and-description">
        <h1 class="title">Assessment Report</h1>
    </div>

    <div class="container">
        <div class="info-box">
            <div class="info">
                <span>
                    <strong>Result ID: </strong>
                    <span id="copyInfo"><?php echo $refResultID;?></span>
                </span>
                <div class="copy removePrint">
                    <button class="copy-Btn info1" onclick="copyToClipboard('copyInfo')">
                        <i class="fa fa-clipboard" style="padding-right:5px;"></i>
                        Copy ResultID
                    </button>
                </div>
            </div>
        </div> 

    <div class="report-content">
        <div class="row">
            <div class="box personal-details">
                <h2 style="font-size:25px;">Personal Details</h2>
                <div class="profile">
                    <div class="profile-pic">
                        <img src="<?php echo $userImg?>" alt="Profile Pic">
                    </div>
                    <div class="content">
                        <p>
                            <strong>User: </strong>
                            <?php echo $userRole;?>
                        </p>
                        <p>
                            <?php
                                if($userRole == "Student") {
                            ?>
                                    <strong>Student ID: </strong> 
                                    <?php echo $UserID;?>
                            <?php
                                } else {
                            ?>
                                    <strong>Teacher ID: </strong> 
                                    <?php echo $UserID;?>
                            <?php
                                }
                            ?>
                        </p>
                        <p>
                            <strong>Name:</strong> 
                            <?php echo $userName;?>
                        </p>
                        <p>
                            <strong>School:</strong> 
                            <?php echo $userSchool;?>
                        </p>
                        <p>
                            <?php
                                if($userRole == "Student") {
                            ?>
                                    <strong>Grade Level: </strong> 
                                    <?php echo $userGrade;?>
                            <?php
                                } else {
                            ?>
                                    <strong>Teaching Level: </strong> 
                                    <?php echo $userTeachLvl;?>
                            <?php
                                }
                            ?>
                        </p>
                        <p>
                            <?php
                                if($userRole == "Student") {
                            ?>
                                    <strong>SPM Student: </strong> 
                                    <?php echo $userSPM;?>
                            <?php
                                } else {
                            ?>
                                    <strong>Teaching Role: </strong> 
                                    <?php echo $userTeachRole;?>
                            <?php
                                }
                            ?>
                        </p>
                    </div>
                </div>
            </div>

            <div class="box assessment-details">
                <h2 style="font-size:25px;">Assessment Details</h2>
                <div class="content">
                    <p>
                        <strong>ID: </strong>
                        <?php echo $AssmtCode;?>
                    </p>
                    <p>
                        <strong>Name: </strong>
                        <?php echo $refAssmtName;?>
                    </p>
                    <p>
                        <strong>Grade Level: </strong>
                        <?php echo $refAssmtGrade;?>
                    </p>
                    <p>
                        <strong>Chapter: </strong>
                        <?php echo $refAssmtChapter;?>
                    </p>
                    <p>
                        <strong>Topic: </strong>
                        <?php echo $refAssmtTopic;?>
                    </p>
                    <p>
                        <strong>Difficulty: </strong>
                        <?php echo $refAssmtDiff;?>
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="box result-details">
                <h2 style="font-size:25px;">Result Details</h2>
                <div class="result">
                    <?php
                        if($passStatus == "Failed") {
                    ?>
                            <div class="grade-icon" style="background:rgb(174, 39, 39);">
                                <span><?php echo $resultGrade;?></span>
                            </div>
                    <?php
                        } else {
                    ?>
                            <div class="grade-icon" style="background: #27ae60;">
                                <span><?php echo $resultGrade;?></span>
                            </div>
                    <?php
                        }
                    ?>
                    <div class="content">
                        <p>
                            <strong>Award: </strong>
                            <?php echo $gradeAward;?>
                        </p>
                        <p style="padding-left:50px;">
                            <strong>Grade Value: </strong>
                            <?php echo $gradeValue;?>
                        </p>
                        <p>
                            <strong>Total Marks: </strong>
                            <?php echo $totalMarks;?> / <?php echo $refTotalQMarks;?>
                        </p>
                        <p style="padding-left:50px;">
                            <strong>Average: </strong> 
                            <?php echo $avgMark;?>
                        </p>
                        <p>
                            <strong>Percentage: </strong> 
                            <?php echo $formatMarkPercent;?>
                        </p>
                        <p style="padding-left:50px;">
                            <strong>Status: </strong> 
                            <?php echo $passStatus;?>
                        </p>
                    </div>
                </div>
            </div>

            <div class="box attempt-details">
            <h2 style="font-size:25px;">Attempt Statistics</h2>
                    <div class="content" style="padding-left: 15px;">
                        <p>
                            <strong>Attempt ID: </strong>
                            <?php echo $AttemptID;?>
                        </p>
                        <p>
                            <strong>Total Questions: </strong>
                            <?php echo $totalQueAns;?>
                        </p>
                        <p>
                            <strong>Total Correct: </strong>
                            <?php echo $numQueCorr;?> (<?php echo $formatCorrectPercent;?>)
                        </p>
                        <p>
                            <strong>Total Incorrect: </strong>
                            <?php echo $numQueIncorr;?> (<?php echo $formatIncorrectPercent;?>)
                        </p>
                        <p>
                            <strong>Ratio by Percentage: </strong>
                            <?php echo $percentRatio;?>
                        </p>
                        <p>
                            <strong>Highest Streak: </strong>
                            <?php echo $highestStreak;?>
                        </p>
                    </div>
            </div>
        </div>

        <div class="box teacher-feedback">
            <h2 style="font-size:25px;">Teacher Feedback</h2>
            <p><?php echo $teacherFeedback;?></p>
        </div>

        <div class="box footer">
            <div class="footer-info">
                <p>
                    <strong>Created by:</strong>
                    <?php echo $refTeacherName;?>
                </p>
                <p>
                    <strong>Assessed by:</strong>
                    <?php echo $refTeacherName;?>
                </p>
                <p>
                    <strong>Attempted on:</strong>
                    <?php echo $refAtmptDate;?>
                </p>
                <p>
                    <strong>Checked on:</strong>
                    <?php echo $resultDate;?>
                </p>
            </div>
            <p style="font-size:14px;font-style:italic;">Made in Kuiztory - Examine Your Malaysia History Wits</p>
        </div>
    </div>

    <footer class="removePrint">
        <div class="more-action">
            <button class="more-Btn act1" onclick="window.scrollTo({top: 0, behavior:'smooth'})">
                <i class="fa fa-arrow-circle-up" style="padding-right:5px;"></i>
                Back to Top
            </button>
            <button class="more-Btn act2" onclick="location.href='viewReport.php?assmtcode=<?php echo $AssmtCode;?>';">
                <i class="fa fa-sign-out" style="padding-right:5px;"></i>
                Leave Page
            </button>
        </div>
    </footer>

    <script> 
        function copyToClipboard(targetCopy) {
            var textCopy = document.getElementById(targetCopy).innerHTML;

            navigator.clipboard.writeText(textCopy);

            alert("Result ID copied!");
        }
    </script>
</body>
</html>
