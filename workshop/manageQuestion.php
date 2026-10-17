<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuiztory - Manage Question</title>
    <link rel="icon" type="image/x-icon" href="../images/Kuiztory_logo_trans.png">
    <link rel="stylesheet" href="./styles/manageQuestion.css">
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

    <h1 class="title">Manage Your Questions Here</h1>
    <p class="description">
        Produce and manage your assessment questions here by adding, editing or deleting them with a few clicks and typing.
    </p>

    <section class="main-action-container">
        <div class="actions">
            <button class="main-btn btn1" onclick="location.href='assessmentWorkshop.php';">
                <i class="fa fa-arrow-left" style="padding-right:10px;"></i>
                Back to Workshop
            </button>
            <button class="main-btn btn2" onclick="location.href='manageAssessment.php';">
                <i class="fa fa-desktop" style="padding-right:10px;"></i>
                Manage Assessments
            </button>
            <button class="main-btn btn3" onclick="window.scrollTo({top: document.body.scrollHeight, behavior: 'smooth'})">
                <i class="fa fa-arrow-down" style="padding-right:10px;"></i>
                Go to Bottom Page
            </button>
            <!--<button class="main-btn btn3" onclick="location.href='#';">Share assessment</button>-->
        </div>
    </section>

    <?php
        $refAssmtCode = $_GET['assmtcode'];
        $query = "SELECT * FROM assessment WHERE AssmtCode = '$refAssmtCode';";
        $results = mysqli_query($connection, $query);
        $data = mysqli_fetch_array($results);

        $AssmtName = $data['AssmtName'];
        $AssmtGrade = $data['AssmtGradeLvl'];
        $AssmtChapter = $data['AssmtChapter'];
        $AssmtTopic = $data['AssmtTopic'];
        $AssmtDiff = $data['AssmtDifficulty'];
        $AssmtVisibility = $data['AssmtVisibility'];
        $AssmtOpenStatus = $data['AssmtOpenStatus'];
        $AssmtDate = $data['AssmtRegDate'];
    ?>

    <div class="container2">
        <div class="assessmentInfo">
            <div class="infoHeader">
                <h3 style="margin-bottom: 10px;"><u>Assessment info</u></h3>
            </div>
            <div class="infoContent">
                <p>
                    <b>ID:</b> 
                    <?php echo $refAssmtCode;?>
                </p>
                <p>
                    <b>Date:</b> 
                    <?php echo $AssmtDate;?>
                </p>
                <p>
                    <b>Name:</b>
                    <?php echo $AssmtName;?>
                </p>
                <p>
                    <b>Grade:</b> 
                    <?php echo $AssmtGrade;?>
                </p>
                <p>
                    <b>Chapter:</b> 
                    <?php echo $AssmtChapter;?>
                </p>
                <p>
                    <b>Difficulty:</b> 
                    <?php echo $AssmtDiff;?>
                </p>
                <p>
                    <b>Visibility:</b> 
                    <?php echo $AssmtVisibility;?>
                </p>
                <p>
                    <b>Open Status:</b> 
                    <?php echo $AssmtOpenStatus;?>
                </p>
            </div>
            <!--
            <button class="assess-btn" onclick="location.href='#';">
                <i class="fa fa-info" style="padding-right:5px;"></i>
                More details
            </button>
            <button class="assess-btn" onclick="location.href='#';">
                <i class="fa fa-edit" style="padding-right:5px;"></i>
                Edit
            </button>
            -->
        </div>
        <div class="addAQuestion" onclick="location.href='createQuestion.php?assmtcode=<?php echo $refAssmtCode?>';">
            <h1>
                <i class="fa fa-plus-circle" style="padding-right:10px;"></i>
                Add a question
            </h1>
        </div>
    </div>

    <!--
    <div class="search">
        <input type="text" name="txtQuestion" placeholder="Search questions by its number or content...">
        <button class="search-btn">
            <i class="fa fa-search" style="font-size:20px"></i>
            Search
        </button>
    </div>
    -->
    
    <div class="container">
        <?php
            $query2 = "SELECT * FROM question WHERE AssmtCode = '$refAssmtCode' ORDER BY QueNum ASC;";
            $results2 = mysqli_query($connection, $query2);
            while($data2 = mysqli_fetch_array($results2)) {
            
                $QuestionID = $data2['QuesID'];
                $QuestionNum = $data2['QueNum'];
                $Question = $data2['QueContent'];
                $QuestionDesc = $data2['QueDesc'];
                $QuestionType = $data2['QueType'];
                $QuestionImg = $data2['QueImg'];
                $QuestionMark = $data2['QueMark'];
                $QuestionAnswer = $data2['QueAnswer'];
                $QuestionCorr = $data2['QueNumAnsCorr'];
                $QuestionIncorr = $data2['QueNumAnsInCorr'];
        ?>
                <div class="question">
                    <div class="main-panel">
                        <?php
                            if(!(empty($QuestionImg))) {
                        ?>
                                <div class="img-display">
                                    <img src="../images/questionImg/<?php echo $QuestionImg?>" alt="Question Image">
                                </div>
                        <?php
                            }
                        ?>    
                        <div class="title-and-desc">
                            <div class="container-id">
                                <button class="text-id" id="copyID" onclick="copyToClipboard('copyID');" title="Click to copy ID">
                                    <?php echo $QuestionID?>
                                </button>
                            </div>
                            <h1><?php echo $Question?></h1>
                            <p style="margin-bottom:10px;"><?php echo $QuestionDesc?></p>
                        </div>
                    </div>
                    <div class="info-panel">
                        <p>
                            <strong>Question Num: </strong>
                            <span style="color:yellow;"><?php echo $QuestionNum?></span>
                        </p>
                        <p><strong>Type: </strong><?php echo $QuestionType?></p>
                        <p><strong>Mark: </strong><?php echo $QuestionMark?></p>
                        <p><strong>Answer: </strong><?php echo $QuestionAnswer?></p>
                        <p><strong>Num of Correct: </strong><?php echo $QuestionCorr?></p>
                        <p><strong>Num of Incorrect: </strong><?php echo $QuestionIncorr?></p>
                    </div>
                    <div class="question-actions">
                        <button class="ques-btn previewQuesBtn" onclick="location.href='previewQuestion.php?quesid=<?php echo $QuestionID?>&assmtcode=<?php echo $refAssmtCode?>';">
                            <i class="fa fa-eye" style="padding-right:10px;"></i>    
                            Preview
                        </button>
                        <button class="ques-btn editQuesBtn" onclick="location.href='editQuestion.php?quesid=<?php echo $QuestionID?>&assmtcode=<?php echo $refAssmtCode?>';">
                            <i class="fa fa-edit" style="padding-right:10px;"></i> 
                            Edit Question
                        </button>
                        <button class="ques-btn deleteQuesBtn" onclick="location.href='deleteQuestion.php?quesid=<?php echo $QuestionID?>&assmtcode=<?php echo $refAssmtCode?>';">
                            <i class="fa fa-trash" style="padding-right:10px;"></i>    
                            Delete Question
                        </button>
                    </div>
                </div>
      <?php } ?>    
    </div>

    <section class="main-action-container" style="margin-top:-30px;">
        <div class="actions">
            <button class="main-btn btn1" onclick="location.href='assessmentWorkshop.php';">
                <i class="fa fa-arrow-left" style="padding-right:10px;"></i>
                Back to Workshop
            </button>
            <button class="main-btn btn2" onclick="window.scrollTo({top: 0, behavior:'smooth'})">
                <i class="fa fa-arrow-up" style="padding-right:10px;"></i>
                Back to Top
            </button>
            <!--<button class="main-btn btn3" onclick="location.href='#';">Share assessment</button>-->
        </div>
    </section>

    <script> 
        function copyToClipboard(targetCopy) {
            var textCopy = document.getElementById(targetCopy).innerHTML;

            navigator.clipboard.writeText(textCopy);

            alert("Question ID copied!");
        }
    </script>

    <!-- Footer -->
    <?php include "WKSfooter.php";?>
</body>
</html>