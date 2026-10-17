<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./images/Kuiztory_logo_trans.png">
    <title>Kuiztory - Quiz in Progress</title>
    <link rel="stylesheet" href="./styles/answerQues.css">
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

        //Get total number of questions
        function getNumofQue() {
            $refAssmtCode = $_GET['assmtcode'];
    
            include './phpcrud/DBconnection.php';
    
            $query3 = "SELECT COUNT(QuesID) AS NumberOfQues FROM question WHERE AssmtCode = '$refAssmtCode';";
            
            $results3 = mysqli_query($connection, $query3);
    
            $data3 = mysqli_fetch_assoc($results3);
    
            return $data3['NumberOfQues'];
        }

        $totalQue = getNumofQue();

        // Check if the user has finished answering all the questions
        // If yes, redirect to result page
        // If no, redirect back to question page with different content
        if($currentQueNo > $totalQue) {
            include './phpcrud/generateResult.php';
            echo "
                    <div class='popup-msg complete-msg'> 
                        <h1 style='font-size:40px;'>Assessment Finished</h1>
                        <h3 style='font-size:30px;'>Congratulations! You have answered all the given questions.</h3>
                        <h3 style='font-size:25px;'>Your result is currently being generated.</h3>
                        <p style='font-style:italic;font-size:20px;'>You will be redirected to the assessment result page...</p>
                    </div>
                 ";
            header("Refresh: 4; URL=assessmentResult.php?assmtcode=$assmtCode&atmptID=$attemptID");
        } else {
            // Get question contents in assessment
            include './phpcrud/info_Question.php';
    ?>
            <div class="header">
                <div style="font-size:20px;">
                    <b>Question:</b> 
                    <span style="color:greenyellow;"><?php echo $currentQueNo?></span> / <?php echo $totalQue?>
                </div>
                <div class="streak">
                    <p>
                        <b>🔥 Current Streak:</b>
                        <?php echo $currentStreak?> / <?php echo $highestStreak?>
                    </p>
                    <progress value="<?php echo $currentStreak?>" max="<?php echo $highestStreak?>"></progress>
                </div>
                <button class="pause-btn" onclick="location.href='pauseAssessment.php?assmtcode=<?php echo $assmtCode?>&quesno=<?php echo $currentQueNo?>&atmptID=<?php echo $attemptID?>&streak=<?php echo $currentStreak?>&highstreak=<?php echo $highestStreak?>';">
                    <i class="fa fa-pause" style="padding-right: 5px;"></i>
                    Pause Quiz
                </button>
            </div>

        <?php 
            if(empty($_POST['submitAns'])) {
                if($refQueType == "MCQ") {
        ?>
                    <div class="text">
                        <p>Multiple Choice Question: Choose the correct answer</p>
                    </div>
            <?php
                    if($refQueImg != NULL) {
            ?>            
                        <div class="img-container">
                            <div class="container-top">
                                <div class="img-display">
                                    <img src="./images/questionImg/<?php echo $refQueImg?>" alt="Question Image">
                                </div>
                                <div class="question-img">
                                    <h2><?php echo $refQuestion?></h2>
                                    <div class="expand-box" onclick="toggleInfo()">
                                        <span style="font-weight: bold; text-decoration: underline;">Expand for more info</span>
                                        <div id="info" style="display: none; padding-top: 20px;"><?php echo $refQueDesc?></div>
                                    </div>
                                </div>
                            </div>
                            <form action="" method="POST">
                                <div class="options">
                                    <?php
                                        include './phpcrud/DBconnection.php';
                        
                                        $query = "SELECT * FROM choice WHERE QuesID = '$refQueID';";
                                                    
                                        $results = mysqli_query($connection, $query);
                                                    
                                        while($data = mysqli_fetch_assoc($results)) {
                                    ?>
                                            <input class="input-btn option-btn" type="submit" name="submitAns" value="<?php echo $data['ChoiceContent'];?>">
                                  <?php } ?>
                                </div>
                            </form>
                        </div>
            <?php            
                    } else {
            ?>
                        <div class="container">
                            <div class="question">
                                <p><?php echo $refQuestion;?></p>
                            </div>
                            <div class="expand-box" onclick="toggleInfo()">
                                <span style="font-weight: bold; text-decoration: underline;">Expand for more info</span>
                                <div id="info" style="display: none; padding-top: 20px;"><?php echo $refQueDesc?></div>
                            </div>
                            <form action="" method="POST">
                                <div class="options">
                                    <?php
                                        include './phpcrud/DBconnection.php';
                        
                                        $query = "SELECT * FROM choice WHERE QuesID = '$refQueID';";
                                                    
                                        $results = mysqli_query($connection, $query);
                                                    
                                        while($data = mysqli_fetch_assoc($results)) {
                                    ?>
                                            <input class="input-btn option-btn" type="submit" name="submitAns" value="<?php echo $data['ChoiceContent'];?>">
                                  <?php } ?>
                                </div>
                            </form>
                        </div>        
            <?php            
                    }
                } else if ($refQueType == "Subjective") {
            ?>
                    <div class="text">
                        <p>Subjective Question: Answer the question in sentences</p>
                    </div> 
            <?php               
                    if($refQueImg != NULL) {
            ?>
                        <div class="img-container">
                            <div class="container-top">
                                <div class="img-display">
                                    <img src="./images/questionImg/<?php echo $refQueImg?>" alt="Question Image">
                                </div>
                                <div class="question-img">
                                    <h2><?php echo $refQuestion?></h2>
                                    <div class="expand-box" onclick="toggleInfo()">
                                        <span style="font-weight: bold; text-decoration: underline;">Expand for more info</span>
                                        <div id="info" style="display: none; padding-top: 20px;"><?php echo $refQueDesc?></div>
                                    </div>
                                </div>
                            </div>
                            <form action="" method="POST">
                                <div class="answer-box">
                                    <textarea placeholder="Type your answer here..." name="answerSubj" required></textarea>
                                </div>
                                <div class="buttons">
                                    <input class="input-btn submit-btn" type="submit" name="submitAns" value="Submit your answer">
                                    <input class="input-btn reset-btn" type="reset" name="clearInp" value="Clear your answer">
                                </div>
                            </form>
                        </div>
            <?php
                    } else {
            ?>
                        <div class="container">
                            <div class="question">
                                <p><?php echo $refQuestion;?></p>
                            </div>
                            <div class="expand-box" onclick="toggleInfo()">
                                <span style="font-weight: bold; text-decoration: underline;">Expand for more info</span>
                                <div id="info" style="display: none; padding-top: 20px;"><?php echo $refQueDesc?></div>
                            </div>
                            <form action="" method="POST">
                                <div class="answer-box">
                                    <textarea placeholder="Type your answer here..." name="answerSubj" required></textarea>
                                </div>
                                <div class="buttons">
                                    <input class="input-btn submit-btn" type="submit" name="submitAns" value="Submit your answer">
                                    <input class="input-btn reset-btn" type="reset" name="clearInp" value="Clear your answer">
                                </div>
                            </form>
                        </div>
            <?php
                    }
                } else if ($refQueType == "Fill-in-the-blank") {
            ?>
                    <div class="text">
                        <p>Fill In The Blank: If there are two blanks or more, <b style="color: yellow;">use comma without spacing</b></p>
                    </div>
            <?php               
                    if($refQueImg != NULL) {
            ?>
                        <div class="img-container">
                            <div class="container-top">
                                <div class="img-display">
                                    <img src="./images/questionImg/<?php echo $refQueImg?>" alt="Question Image">
                                </div>
                                <div class="question-img">
                                    <h2><?php echo $refQuestion?></h2>
                                    <div class="expand-box" onclick="toggleInfo()">
                                        <span style="font-weight: bold; text-decoration: underline;">Expand for more info</span>
                                        <div id="info" style="display: none; padding-top: 20px;"><?php echo $refQueDesc?></div>
                                    </div>
                                </div>
                            </div>
                            <form action="" method="POST">
                                <div class="answer-box">
                                    <?php 
                                        $countBox = 0;
                                        while ($countBox < $numBlanks) {
                                    ?>
                                            <input type="text" class="blankField" name="answerBlank<?php echo $countBox?>" placeholder="Type your answer for blank <?php echo $countBox + 1;?>" required>        
                                    <?php
                                            $countBox++;
                                        }
                                    ?>
                                </div>
                                <div class="buttons">
                                    <input class="input-btn submit-btn" type="submit" name="submitAns" value="Submit your answer">
                                    <input class="input-btn reset-btn" type="reset" name="clearInp" value="Clear your answer">
                                </div>
                            </form>
                        </div> 
            <?php
                    } else {
            ?>
                        <div class="container">
                            <div class="question">
                                <p><?php echo $refQuestion;?></p>
                            </div>
                            <div class="expand-box" onclick="toggleInfo()">
                                Expand for more info
                                <div id="info" style="display: none; padding-top: 20px;"><?php echo $refQueDesc?></div>
                            </div>
                            <form action="" method="POST">
                                <div class="answer-box">
                                    <?php 
                                        $countBox = 0;
                                        while ($countBox < $numBlanks) {
                                    ?>
                                            <input type="text" class="blankField" name="answerBlank<?php echo $countBox?>" placeholder="Type your answer for blank <?php echo $countBox + 1;?>" required>        
                                    <?php
                                            $countBox++;
                                        }
                                    ?>
                                </div>
                                <div class="buttons">
                                    <input class="input-btn submit-btn" type="submit" name="submitAns" value="Submit your answer">
                                    <input class="input-btn reset-btn" type="reset" name="clearInp" value="Clear your answer">
                                </div>
                            </form>
                        </div>                             
            <?php 
                    }
                } else if ($refQueType == "True-or-false") {
            ?>
                    <div class="text">
                        <p>True or False: Choose the correct answer</p>
                    </div> 
            <?php               
                    if($refQueImg != NULL) {
            ?>
                        <div class="img-container">
                            <div class="container-top">
                                <div class="img-display">
                                    <img src="./images/questionImg/<?php echo $refQueImg?>" alt="Question Image">
                                </div>
                                <div class="question-img">
                                    <h2><?php echo $refQuestion?></h2>
                                    <div class="expand-box" onclick="toggleInfo()">
                                        <span style="font-weight: bold; text-decoration: underline;">Expand for more info</span>
                                        <div id="info" style="display: none; padding-top: 20px;"><?php echo $refQueDesc?></div>
                                    </div>
                                </div>
                            </div>
                            <form action="" method="POST">
                                <div class="options">
                                    <input class="input-btn true-btn" type="submit" name="submitAns" value="True">
                                    <input class="input-btn false-btn" type="submit" name="submitAns" value="False">
                                </div>
                            </form>
                        </div>
            <?php            
                    } else {
            ?>
                        <div class="container">
                            <div class="question">
                                <p><?php echo $refQuestion;?></p>
                            </div>
                            <div class="expand-box" onclick="toggleInfo()">
                                <span style="font-weight: bold; text-decoration: underline;">Expand for more info</span>
                                <div id="info" style="display: none; padding-top: 20px;"><?php echo $refQueDesc?></div>
                            </div>
                            <form action="" method="POST">
                                <div class="options">
                                    <input class="input-btn true-btn" type="submit" name="submitAns" value="True">
                                    <input class="input-btn false-btn" type="submit" name="submitAns" value="False">
                                </div>
                            </form>
                        </div>     
            <?php 
                    }       
                } else {}       
            ?>   
                <script>
                    function toggleInfo() {
                        var info = document.getElementById("info");
                        if (info.style.display === "none") {
                            info.style.display = "block";
                        } else {
                            info.style.display = "none";
                        }
                    }
                </script>

        <?php
            } else {
                if(isset($_POST['submitAns'])) {

                    include './phpcrud/addAnswer.php';
                    include './phpcrud/adjustAtmptStats.php';

                    if($refQueType == "MCQ") {
                        $answerInput = $_POST['submitAns'];
                        $markedPoints = checkAnswer($answerInput, $refQueAnswer, $refQueMark);
                        InsertAnswer($answerInput,$markedPoints,$refQueID);
                        updateNumQueCorr($refQueID,$markedPoints);
                        
                        if ($markedPoints != 0) {
                            echo "
                                    <div class='popup-msg right-msg'> 
                                        <h1 style='font-size:40px;'>Congratulations!</h1>
                                        <h3 style='font-size:30px;'>Your have selected the correct answer!</h3>
                                        <p style='font-style:italic;font-size:20px;'>You will be redirected to the next question...</p>
                                    </div>
                                ";
                            incrementCorrect();
                            $currentStreak++;        
                        } else {
                            echo "
                                <div class='popup-msg wrong-msg'> 
                                    <h1 style='font-size:40px;'>Oh No!</h1>
                                            <h3 style='font-size:30px;'>Unfortunately, you have selected the wrong answer!</h3>
                                            <h3 style='font-size:25px;'>Better luck next time!</h3>
                                            <p style='font-style:italic;font-size:20px;'>You will be redirected to the next question...</p>
                                        </div>
                                ";
                            incrementIncorrect();
                            if ($currentStreak > $highestStreak) {
                                $highestStreak = $currentStreak;
                            }
                            $currentStreak = 0;       
                        }
                        $currentQueNo++;
                        header("Refresh: 3; URL=answerQues.php?assmtcode=$assmtCode&quesno=$currentQueNo&atmptID=$attemptID&streak=$currentStreak&highstreak=$highestStreak");

                    } else if ($refQueType == "Subjective") {
                        $answerInput = $_POST['answerSubj'];

                        $currentQueNo++;

                        if ($refQueAnswer != NULL) { // if there is a correct answer set
                            $markedPoints = checkAnswer($answerInput, $refQueAnswer, $refQueMark);
                            InsertAnswer($answerInput,$markedPoints,$refQueID);
                            updateNumQueCorr($refQueID,$markedPoints);
                            if ($markedPoints != 0) {
                                echo "
                                        <div class='popup-msg right-msg'> 
                                            <h1 style='font-size:40px;'>Congratulations!</h1>
                                            <h3 style='font-size:30px;'>Your have answered the question correctly!</h3>
                                            <p style='font-style:italic;font-size:20px;'>You will be redirected to the next question...</p>
                                        </div>
                                    ";
                                incrementCorrect();
                                $currentStreak++;  
                                header("Refresh: 3; URL=answerQues.php?assmtcode=$assmtCode&quesno=$currentQueNo&atmptID=$attemptID&streak=$currentStreak&highstreak=$highestStreak");       
                            } else {
                                echo "
                                    <div class='popup-msg wrong-msg'> 
                                        <h1 style='font-size:40px;'>Oh No!</h1>
                                        <h3 style='font-size:30px;'>Unfortunately, you have answered the question incorrectly!</h3>
                                        <h3 style='font-size:25px;'>Better luck next time!</h3>
                                        <p style='font-style:italic;font-size:20px;'>You will be redirected to the next question...</p>
                                    </div>
                                    ";
                                incrementIncorrect();
                                if ($currentStreak > $highestStreak) {
                                    $highestStreak = $currentStreak;
                                }
                                $currentStreak = 0;     
                                header("Refresh: 3; URL=answerQues.php?assmtcode=$assmtCode&quesno=$currentQueNo&atmptID=$attemptID&streak=$currentStreak&highstreak=$highestStreak");
                            }
                        } else {
                            InsertAnswer($answerInput,0,$refQueID);
                            header("Location: answerQues.php?assmtcode=$assmtCode&quesno=$currentQueNo&atmptID=$attemptID&streak=$currentStreak&highstreak=$highestStreak");
                        }

                    } else if ($refQueType == "Fill-in-the-blank") {
                        // Construct array to get list of answers
                        $answerArray = [];
                        $countAns = 0;
                        while ($countAns < $numBlanks) {
                            $answerArray[] = $_POST['answerBlank' . $countAns];
                            $countAns++;
                        }
                        $formatAns = implode(",", $answerArray); // format array to comma-separated values for checking
                        $markedPoints = checkAnswer($formatAns, $refQueAnswer, $refQueMark); // check answer for marks
                        InsertAnswer($formatAns,$markedPoints,$refQueID);
                        updateNumQueCorr($refQueID,$markedPoints);
                        
                        if ($markedPoints != 0) {
                            echo "
                                    <div class='popup-msg right-msg'> 
                                        <h1 style='font-size:40px;'>Congratulations!</h1>
                                        <h3 style='font-size:30px;'>Your have filled in the correct answers!</h3>
                                        <p style='font-style:italic;font-size:20px;'>You will be redirected to the next question...</p>
                                    </div>
                                ";
                            incrementCorrect();
                            $currentStreak++;          
                        } else {
                            echo "
                                <div class='popup-msg wrong-msg'> 
                                    <h1 style='font-size:40px;'>Oh No!</h1>
                                            <h3 style='font-size:30px;'>Unfortunately, you have filled in the wrong answers!</h3>
                                            <h3 style='font-size:25px;'>Better luck next time!</h3>
                                            <p style='font-style:italic;font-size:20px;'>You will be redirected to the next question...</p>
                                        </div>
                                ";
                            incrementIncorrect(); 
                            if ($currentStreak > $highestStreak) {
                                $highestStreak = $currentStreak;
                            }
                            $currentStreak = 0;        
                        }
                        $currentQueNo++;
                        header("Refresh: 3; URL=answerQues.php?assmtcode=$assmtCode&quesno=$currentQueNo&atmptID=$attemptID&streak=$currentStreak&highstreak=$highestStreak");

                    } else if ($refQueType == "True-or-false") {
                        $answerInput = $_POST['submitAns'];
                        $markedPoints = checkAnswer($answerInput, $refQueAnswer, $refQueMark);
                        InsertAnswer($answerInput,$markedPoints,$refQueID);
                        updateNumQueCorr($refQueID,$markedPoints);
                        
                        if ($markedPoints != 0) {
                            echo "
                                    <div class='popup-msg right-msg'> 
                                        <h1 style='font-size:40px;'>Congratulations!</h1>
                                        <h3 style='font-size:30px;'>Your have selected the correct answer!</h3>
                                        <p style='font-style:italic;font-size:20px;'>You will be redirected to the next question...</p>
                                    </div>
                                ";
                            incrementCorrect();
                            $currentStreak++;
                        } else {
                            echo "
                                    <div class='popup-msg wrong-msg'> 
                                        <h1 style='font-size:40px;'>Oh No!</h1>
                                        <h3 style='font-size:30px;'>Unfortunately, you have selected the wrong answer!</h3>
                                        <h3 style='font-size:25px;'>Better luck next time!</h3>
                                        <p style='font-style:italic;font-size:20px;'>You will be redirected to the next question...</p>
                                    </div>
                                ";
                            incrementIncorrect();
                            if ($currentStreak > $highestStreak) {
                                $highestStreak = $currentStreak;
                            }
                            $currentStreak = 0;   
                        }
                        $currentQueNo++;
                        header("Refresh: 3; URL=answerQues.php?assmtcode=$assmtCode&quesno=$currentQueNo&atmptID=$attemptID&streak=$currentStreak&highstreak=$highestStreak");
                            
                    } else { }
                }
            }
        }   
    ?>
</body>
</html>
