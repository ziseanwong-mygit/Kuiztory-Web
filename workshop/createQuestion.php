<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuiztory - Create Your Question</title>
    <link rel="icon" type="image/x-icon" href="../images/Kuiztory_logo_trans.png">
    <link rel="stylesheet" href="./styles/createQuestion.css">
</head>
<body>
    <!-- Header -->
    <?php 
        if(isset($_SESSION['SES_TeaID'])) {
            include "WKSheader.php";
        }
    ?>

    <?php
        $refAssmtCode = $_GET['assmtcode'];

        include './crudWKS/DBconnection.php';

        $query = "SELECT MAX(QueNum) AS NumQNow FROM question WHERE AssmtCode = '$refAssmtCode';";
        $results = mysqli_query($connection, $query);
        $data = mysqli_fetch_assoc($results);
        $currentNumQ = $data['NumQNow'];

        $newQueNum = $currentNumQ + 1;
    ?>

    <section class="main-action-container">
        <div class="actions">
            <button class="main-btn btn1" onclick="confirmDiscard();">
                <i class="fa fa-times" style="padding-right: 10px;"></i>
                Discard Question
            </button>
        </div>
    </section>

    <form action="" method="POST" class="container" enctype="multipart/form-data">
        <button type="reset" class="discard-btn">
            <i class="fa fa-trash" style="padding-right: 10px;"></i>
            Clear Fields
        </button>
        <button type="submit" name="createQuestion" class="save-btn">
            <i class="fa fa-floppy-o" style="padding-right: 10px;"></i>
            Save Question
        </button>
        <h1 class="title">Create Your Question</h1>
        <p class="description">Let's make your question unique and engaging by selecting its type and input the question and answers. Read the requirements below to get started.</p>
        <p style="color:red;font-style:italic;">* Required fields</p>
        <p class="description-2">
            ** All questions must have a correct answer except <span style="text-decoration:underline;color:darkorange;">subjective questions</span>, where answer may vary.
        </p>
        <p class="description-2" style="font-size:14px;">
            ** 1. For <span style="font-weight:bold;">fill-in-the-blank question</span>, you must insert <span style="text-decoration:underline;color:darkorange;">comma-separated answers</span> so the system can check the answer accurately; e.g. Greece,Athens
        </p>
        <p class="description-2" style="font-size:14px;">
            ** 2. For <span style="font-weight:bold;">true-or-false question</span>, you must insert <span style="text-decoration:underline;color:darkorange;">either "True" or "False".</span>.
        </p>
        <p class="description-2">*** If the question is MCQ, you must put <span style="text-decoration:underline;color:darkorange;">4 answer options</span> for the question.</p>
        <p class="description-3">* For fill-in-the-blank question, type the blanks out to indicate where to fill in the answers.</p>
        

        <div class="question-section">
            <?php

            ?>
            <div class="question-number"><?php echo $newQueNum;?></div>
            <div class="question-type-header">
                <h3><span style="color:red;">* </span>Question Type:</h3>
            </div>
            <div class="question-type">
                <p><input type="radio" name="questionType" value="MCQ" required> Multiple choice question</p>
                <p><input type="radio" name="questionType" value="Subjective"> Subjective question</p>
                <p><input type="radio" name="questionType" value="Fill-in-the-blank"> Fill-in-the-blank</p>
                <p><input type="radio" name="questionType" value="True-or-false"> True or False</p>
            </div>

            <div class="checking-marking">
                <h3>Checking & Marking</h3>
                <p>
                    <span style="color:red;">** </span>
                    Enter the correct answer for checking: 
                    <input type="text" name="questionAnswer" placeholder="E.g. Sistem demokrasi OR Greece,Athens" class="answer-box">
                </p>
                <p>
                    <span style="color:red;">* </span>
                    Marks allocated for question:
                    <input type="number" name="questionMark" placeholder="E.g. 80" min="1" max="100" required>
            </div>
        </div>

        <div class="question-description">
            <h3>Question and Description:</h3>
            <p><span style="color:red;">* </span><span style="color:green;">* </span>What is your question?</p>
            <input type="text" name="questionContent" class="question-field" placeholder="E.g. Siapakah tokoh Tunku Abdul Rahman? OR Tamadun Yunani bermula dari _____________ di ______________."required>
            <p>Put description to describe your question or give tips and hints:</p>
            <textarea name="questionDesc" placeholder="Who is Tunku Abdul Rahman? OR He is an important figure in Malaysia history."></textarea>
        </div>

        <div class="answer-options">
            <h3><span style="color:red;">*** </span>Answer Options:</h3>
            <p>Option 1: <input type="text" name="choice1" class="choice-field" placeholder="E.g. Colosseum"></p>
            <p>Option 2: <input type="text" name="choice2" class="choice-field" placeholder="E.g. Athens"></p>
            <p>Option 3: <input type="text" name="choice3" class="choice-field" placeholder="E.g. Pantheon"></p>
            <p>Option 4: <input type="text" name="choice4" class="choice-field" placeholder="E.g. Acropolis"></p>
        </div>

        <div class="media-upload">
            <h3>Image Upload (.png, .jpg, .jpeg, .gif, etc.)</h3>
            <div class="upload-box">
                <input type="file" name="QuestionImg" accept="image/*" class="inputFileField">
            </div>
        </div>
    </form>

    <section class="main-action-container">
        <div class="actions">
            <button class="main-btn btn2" onclick="window.scrollTo({top: 0, behavior:'smooth'})">
                <i class="fa fa-arrow-up" style="padding-right: 10px;"></i>
                Back to Top
            </button>
            <button class="main-btn btn1" onclick="confirmDiscard();">
                <i class="fa fa-times" style="padding-right: 10px;"></i>
                Discard Question
            </button>
        </div>
    </section>

    <script>
        function confirmDiscard() {
            if(confirm("Are you sure you want to discard this question? Your changes will be unsaved.") == true) {        
                    window.location = "manageQuestion.php?assmtcode=<?php echo $refAssmtCode?>";
            }
        }
    </script>

    <?php
        if(isset($_POST['createQuestion'])) {
            $flagReadyCreate = FALSE;
            $inputType = $_POST['questionType'];

            // Input Validation for question
            if($inputType == "MCQ") {
                if(empty($_POST['questionAnswer'])) {
    ?>
                    <script>
                        alert("Please enter the correct answer for the question.");
                    </script>
    <?php                
                } else if (empty($_POST['choice1']) || empty($_POST['choice2']) || empty($_POST['choice3']) || empty($_POST['choice4'])){
    ?>
                    <script>
                        alert("Please enter the 4 answer options for the question.");
                    </script> 
    <?php                      
                } else {
                    $flagReadyCreate = TRUE;
                }
            } else if($inputType == "Fill-in-the-blank") {
                if(empty($_POST['questionAnswer'])) {
    ?>
                    <script>
                        alert("Please enter the correct answer for the question.");
                    </script>
    <?php   
                } else {
                    $flagReadyCreate = TRUE;
                }             
            } else if ($inputType == "True-or-false") {
                if(empty($_POST['questionAnswer'])) {
    ?>
                    <script>
                        alert("Please enter the correct answer for the question.");
                    </script>
    <?php 
                } else if (($_POST['questionAnswer'] !== "True") && ($_POST['questionAnswer'] !== "False")) {
    ?>
                    <script>
                        alert("The correct answer should only be either 'True' or 'False'.");
                    </script>
    <?php                 
                } else {
                    $flagReadyCreate = TRUE;
                }  
            } else {
                $flagReadyCreate = TRUE;
            }

            if($flagReadyCreate) {
                include "./crudWKS/addQuestion.php";
            }
        }
    ?>

    <!-- Footer -->
    <?php include "WKSfooter.php";?>
</body>
</html>
