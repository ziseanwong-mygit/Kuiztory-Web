<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuiztory - Edit Question Info</title>
    <link rel="icon" type="image/x-icon" href="../images/Kuiztory_logo_trans.png">
    <link rel="stylesheet" href="./styles/editAssessment.css">
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
        $refQuestionID = $_GET['quesid'];
        $refAssmtCode = $_GET['assmtcode'];

        $query = "SELECT * FROM question WHERE QuesID = '$refQuestionID';";
        $results = mysqli_query($connection, $query);
        $data = mysqli_fetch_assoc($results);

        $refQueID = $data['QuesID'];
        $refQueNum = $data['QueNum'];
        $refQuestion = $data['QueContent'];
        $refQueDesc = $data['QueDesc'];
        $refQueType = $data['QueType'];
        $refQueImg = $data['QueImg'];
        $refQueMark = $data['QueMark'];
        $refQueAnswer = $data['QueAnswer'];

        // Get the current number of questions for question number
        $query2 = "SELECT COUNT(QuesID) AS TotalQuestion FROM question WHERE AssmtCode = '$refAssmtCode';";
        $results2 = mysqli_query($connection, $query2);
        $data2 = mysqli_fetch_assoc($results2);
        $TotalQ = $data2['TotalQuestion'];
    ?>

    <h1>Edit Question Information</h1>
    <p>
        You can edit your assessment question info by changing the details below. <br><br>
        <span style="color: red; font-weight: bold;">Each details cannot be blank.</span><br><br>
        <span style="color: maroon; font-style: italic;">
            1. Fill-in-the-blank reference answers should be in comma-separated values; (E.g. Greece,Athens,Rome).
        </span><br><br>
        <span style="color: maroon; font-style: italic;">
            2. True-or-false reference answers should only contain either "True" or "False".
        </span>
    </p>

    <main>
        <div id="student" class="form-section active">
            <form action="" method="POST" enctype="multipart/form-data">
                <label for="question-num">Question Number:</label>
                <input type="number" id="question-num" name="QuesNum" min="1" max="<?php echo $TotalQ?>" placeholder="E.g. 2" value="<?php echo $refQueNum?>" required>

                <label for="question-content">Question Content:</label>
                <input type="text" id="question-content" name="QuesContent" placeholder="Eg: Siapakah tokoh Tunku Abdul Rahman? OR Tamadun Yunani bermula dari ____________ di ____________." value="<?php echo $refQuestion?>" required>

                <label for="question-desc">Question Description:</label>
                <textarea name="QuesDesc" style="height: 200px;resize: none;"placeholder="E.g. Who is Tunku Abdul Rahman? OR He is an important figure in Malaysia history." required><?php echo $refQueDesc?></textarea>
                   
                <label for="question-mark">Question Marks:</label>
                <input type="number" id="question-mark" name="QuesMark" min="1" max="100" placeholder="E.g. 10" value="<?php echo $refQueMark?>" required>

                <label for="question-answer">Question Answer:</label>
                <input type="text" id="question-answer" name="QuesAnswer" placeholder="Eg: Sistem demokrasi OR Greece,Athens" value="<?php echo $refQueAnswer?>" required>
                
                <?php
                    if ($refQueType == "MCQ") {
                ?>
                        <h3>Answer Options for MCQ</h3>

                        <?php
                            $count = 1;
                            $query2 = "SELECT * FROM choice WHERE QuesID = '$refQuestionID' ORDER BY ChoiceID ASC;";
                            $results2 = mysqli_query($connection, $query2);
                            while ($data2 = mysqli_fetch_assoc($results2)) {
                                $refChoiceID = $data2['ChoiceID'];
                                $refOption = $data2['ChoiceContent'];
                        ?>
                                <label for="choice-answer">Answer Option <?php echo $count ?>:</label>
                                <input type="text" id="choice-answer" name="AnswerOpt<?php echo $count ?>" placeholder="Eg: Colosseum" value="<?php echo $refOption?>" required>
                        <?php
                                $count++;
                            }
                        ?>
                <?php
                    }
                ?>

                <label for="question-img">Question Image:</label>
                <input type="file" id="imgContent" name="QuesImg" accept="image/*">

                <button type="submit" name="startUpdate">Update Question</button>
                <button type="button" onclick="history.back();">Cancel Update</button>
            </form>
        </div>
    </main>

    <?php
        if(isset($_POST['startUpdate'])) {
            include "./crudWKS/updateQuestion.php";
        }
    ?>
   
    <!-- Footer -->
    <?php include "WKSfooter.php";?>
</body>
</html>