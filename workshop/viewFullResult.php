<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../images/Kuiztory_logo_trans.png">
    <title>Kuiztory - View Full Assessment Result</title>
    <link rel="stylesheet" href="./styles/viewFullResult.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php
        $refResultID = $_GET['resultid'];
        include './crudWKS/info_Result_Report.php';
    ?>

    <div class="container">
        <div class="info-box">
            <div class="info">
                <h2 style="margin-top:-10px;text-decoration:underline;">Data ID Info</h2>
                <span>
                    <strong>Result ID: </strong>
                    <span id="copyInfo1"><?php echo $refResultID;?></span>
                </span>
                <span>
                    <strong>User ID: </strong>
                    <span id="copyInfo2"><?php echo $UserID;?></span>
                </span>
                <span>
                    <strong>Attempt ID: </strong>
                    <span id="copyInfo3"><?php echo $AttemptID;?></span>
                </span>
                <span>
                    <strong>Assessment ID: </strong>
                    <span id="copyInfo4"><?php echo $AssmtCode;?></span>
                </span>
                <div class="copy">
                    <button class="copy-Btn info1" onclick="copyToClipboard('copyInfo1')">
                        <i class="fa fa-clipboard" style="padding-right:5px;"></i>
                        Copy ResultID
                    </button>
                    <button class="copy-Btn info2" onclick="copyToClipboard('copyInfo2')">
                        <i class="fa fa-clipboard" style="padding-right:5px;"></i>
                        Copy UserID
                    </button>
                    <button class="copy-Btn info3" onclick="copyToClipboard('copyInfo3')">
                        <i class="fa fa-clipboard" style="padding-right:5px;"></i>
                        Copy AttemptID
                    </button>
                    <button class="copy-Btn info4" onclick="copyToClipboard('copyInfo4')">
                        <i class="fa fa-clipboard" style="padding-right:5px;"></i>
                        Copy AssessmentID
                    </button>
                </div>
            </div>
        </div>
    
        <div class="title-and-description">
            <h1 class="title"><?php echo $userName;?>'s Result</h1>
            <p class="description"><?php echo $refAssmtName;?></p>
            <p class="description-2">
                To print or download results, please go to <a class="hyperlink-view" href="viewFullReport.php?resultid=<?php echo $refResultID?>">view report page</a>
            </p>
        </div>
        
        <div class="main-btn-menu">
            <button onclick="location.href='viewReport.php?assmtcode=<?php echo $AssmtCode;?>';">
                <i class="fa fa-arrow-left" style="padding-right:5px;"></i>
                Back to View Report Page
            </button>
        </div>

        <div class="content">
            <div class="marks">
                <h2 style="font-size:30px;">Marks</h2>
                <p class="data-info">
                    <strong>Total:</strong>
                    <span style="color:yellow;"><?php echo $totalMarks;?> / <?php echo $refTotalQMarks;?></span>
                </p>
                <p class="data-info">
                    <strong>Average:</strong>
                    <span style="color:yellow;"><?php echo $avgMark;?></span>
                </p>
                <p class="data-info">
                    <strong>Percentage:</strong>
                    <span style="color:yellow;"><?php echo $formatMarkPercent;?></span>
                </p>
            </div>

            <div class="grade">
                <h2 style="font-size:30px;">
                    Grade 
                    <em style="font-size:14px;color:orange;">*Based on SPM Grading System</em>
                </h2>
                <?php
                    if($passStatus == "Failed") {
                ?>
                        <h1 style="color:red;"><?php echo $resultGrade;?></h1>
                        <h2 style="color:red;"><?php echo $gradeAward;?></h2>
                <?php
                    } else {
                ?>
                        <h1 style="color:lime;"><?php echo $resultGrade;?></h1>
                        <h2 style="color:gold;"><?php echo $gradeAward;?></h2>        
                <?php
                    }
                ?>
                <p class="data-info">
                    <strong>Grade Value:</strong>
                    <span style="color:yellow;"><?php echo $gradeValue;?></span>
                </p>
                <p class="data-info">
                    <strong>Pass Status:</strong>
                    <span style="color:yellow;"><?php echo $passStatus;?></span>
                </p>
            </div>

            <div class="performance">
                <h2 style="font-size:30px;">Performance</h2>
                <p class="data-info2">
                    <strong>Total Questions Answered:</strong>
                    <span style="color:yellow;"><?php echo $totalQueAns;?></span>
                </p>
                <p class="data-info2">
                    <strong>Correct Questions:</strong>
                    <span style="color:yellow;"><?php echo $numQueCorr;?></span>
                    |
                    <strong>Incorrect Questions:</strong>
                    <span style="color:yellow;"><?php echo $numQueIncorr;?></span>
                </p>
                <p class="data-info2">
                    <strong>Average Correct:</strong>
                    <span style="color:yellow;"><?php echo $avgCorrect;?></span>
                    |
                    <strong>Average Incorrect:</strong>
                    <span style="color:yellow;"><?php echo $avgIncorrect;?></span>
                </p>
                <p class="data-info2">
                    <strong>Correct Percentage:</strong>
                    <span style="color:yellow;"><?php echo $formatCorrectPercent;?></span>
                    |
                    <strong>Incorrect Percentage:</strong>
                    <span style="color:yellow;"><?php echo $formatIncorrectPercent;?></span>
                </p>
                <p class="data-info2">
                    <strong>Ratio by Percentage:</strong>
                    <span style="color:yellow;"><?php echo $percentRatio;?></span>
                </p>
                <p class="data-info2">
                    <strong>Highest Streak:</strong>
                    <span style="color:yellow;"><?php echo $highestStreak;?></span>
                </p>
            </div>

            <div class="questions">
                <h2 style="font-size:30px;">Questions & Answers</h2>
                <table>
                    <tr>
                        <th>No.</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Correct Answer</th>
                        <th>Points</th>
                    </tr>
                    <?php
                        include './crudWKS/DBconnection.php';

                        $query3 = "SELECT * FROM question WHERE AssmtCode = '$AssmtCode' ORDER BY QueNum ASC;";
                        $results3 = mysqli_query($connection, $query3);

                        while($data3 = mysqli_fetch_assoc($results3)) {
                            $questionID = $data3['QuesID'];
                            $questionNum = $data3['QueNum'];
                            $question = $data3['QueContent'];
                            $actualAns = $data3['QueAnswer'];

                            $query4 = "SELECT AnswerContent, AnswerMark FROM answer WHERE QuesID = '$questionID';";
                            $results4 = mysqli_query($connection, $query4);
                            $data4 = mysqli_fetch_assoc($results4);
                            $userAnswer = $data4['AnswerContent'];
                            $markGained = $data4['AnswerMark'];
                    ?>
                            <tr>
                                <td><?php echo $questionNum?></td>
                                <td><?php echo $question?></td>
                                <td><?php echo $userAnswer?></td>
                    <?php
                                if($actualAns == NULL) {
                    ?>
                                    <td>-</td>
                    <?php                
                                } else {
                    ?>
                                    <td><?php echo $actualAns?></td>
                          <?php } ?>                
                                <td><?php echo $markGained?></td>
                            </tr>
                  <?php } ?>
                </table>
            </div>
        </div>

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
    </div>

    <?php
        if(isset($_POST['checkLogin'])) {
            if(isset($_SESSION['SES_StuID']) || isset($_SESSION['SES_TeaID'])) {
    ?>            
                <script>
                    window.location = "assessmentReport.php?assmtcode=<?php echo $refAssmtCode?>&atmptID=<?php echo $refAtmptID?>   ";
                </script>
    <?php            
            } else {
    ?>
                <script>
                    alert("Sorry! Your report is not available because you have not logged in your account.");
                </script>
    <?php            
            }
        }
    ?>

    <script> 
        function copyToClipboard(targetCopy) {
            var textCopy = document.getElementById(targetCopy).innerHTML;

            navigator.clipboard.writeText(textCopy);

            alert("Data ID copied!");
        }
    </script>
</body>
</html>
