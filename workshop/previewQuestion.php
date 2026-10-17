<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../images/Kuiztory_logo_trans.png">
    <title>Kuiztory - Preview Question</title>
    <link rel="stylesheet" href="./styles/previewQuestion.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php 
        // Set $_GET variables
        $assmtCode = $_GET['assmtcode'];
        $questionID = $_GET['quesid'];
        $currentStreak = 0;
        $highestStreak = 0;

        //Get total number of questions
        function getNumofQue() {
            $refAssmtCode = $_GET['assmtcode'];
    
            include './crudWKS/DBconnection.php';
    
            $query3 = "SELECT COUNT(QuesID) AS NumberOfQues FROM question WHERE AssmtCode = '$refAssmtCode';";
            
            $results3 = mysqli_query($connection, $query3);
    
            $data3 = mysqli_fetch_assoc($results3);
    
            return $data3['NumberOfQues'];
        }

        $totalQue = getNumofQue();

        // Get question contents in assessment
        include './crudWKS/info_PreviewQ.php';
    ?>
        <div class="header">
            <div style="font-size:20px;">
                <b>Question:</b> 
                <span style="color:greenyellow;"><?php echo $refQueNum?></span> / <?php echo $totalQue?>
            </div>
            <div class="streak">
                <p>
                    <b>🔥 Current Streak:</b>
                    <?php echo $currentStreak?> / <?php echo $highestStreak?>
                </p>
                <progress value="<?php echo $currentStreak?>" max="<?php echo $highestStreak?>"></progress>
            </div>
            <button class="pause-btn">
                <i class="fa fa-pause" style="padding-right: 5px;"></i>
                Pause Quiz
            </button>
        </div>
    <?php 
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
                                <img src="../images/questionImg/<?php echo $refQueImg?>" alt="Question Image">
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
                                    include './crudWKS/DBconnection.php';
                                    $query = "SELECT * FROM choice WHERE QuesID = '$questionID';";      
                                    $results = mysqli_query($connection, $query);            
                                    while($data = mysqli_fetch_assoc($results)) {
                                ?>
                                        <input class="input-btn option-btn" type="submit" name="submitAns" value="<?php echo $data['ChoiceContent'];?>" disabled>
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
                                    include './crudWKS/DBconnection.php';
                                    $query = "SELECT * FROM choice WHERE QuesID = '$questionID';";      
                                    $results = mysqli_query($connection, $query);            
                                    while($data = mysqli_fetch_assoc($results)) {
                                ?>
                                        <input class="input-btn option-btn" type="submit" name="submitAns" value="<?php echo $data['ChoiceContent'];?>" disabled>
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
                                <img src="../images/questionImg/<?php echo $refQueImg?>" alt="Question Image">
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
                                <input class="input-btn submit-btn" type="submit" name="submitAns" value="Submit your answer" disabled>
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
                                <input class="input-btn submit-btn" type="submit" name="submitAns" value="Submit your answer" disabled>
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
                                <img src="../images/questionImg/<?php echo $refQueImg?>" alt="Question Image">
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
                                <input class="input-btn submit-btn" type="submit" name="submitAns" value="Submit your answer" disabled>
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
                                <input class="input-btn submit-btn" type="submit" name="submitAns" value="Submit your answer" disabled>
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
                                <img src="../images/questionImg/<?php echo $refQueImg?>" alt="Question Image">
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
                                <input class="input-btn true-btn" type="submit" name="submitAns" value="True" disabled>
                                <input class="input-btn false-btn" type="submit" name="submitAns" value="False" disabled>
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
                                <input class="input-btn true-btn" type="submit" name="submitAns" value="True" disabled>
                                <input class="input-btn false-btn" type="submit" name="submitAns" value="False" disabled>
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
            
    <section class="main-action-container">
        <div class="actions">
            <button class="main-btn btn1" onclick="history.back();">
                <i class="fa fa-times" style="padding-right: 10px;"></i>
                Exit Preview
            </button>
        </div>
    </section> 
</body>
</html>                                                     