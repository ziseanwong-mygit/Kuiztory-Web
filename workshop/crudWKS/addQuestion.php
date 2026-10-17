<?php
    function generateID($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
    
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        
        return $randomString;
    }
?>

<?php
    $newID = "QUS_" . generateID();
    
    include 'DBconnection.php';

    $QuesContent = $_POST['questionContent'];
    $QuesType = $_POST['questionType'];
    $QuesDesc = $_POST['questionDesc'];
    $QuesMark = $_POST['questionMark'];
    $QuesAns = $_POST['questionAnswer'];
    $filename = $_FILES["QuestionImg"]["name"];
    $flagSuccess = TRUE;

    $query = "INSERT INTO question (QuesID, AssmtCode, QueNum, QueContent, QueType, QueMark, 
    QueNumAnsCorr, QueNumAnsInCorr) 
    VALUES ('$newID', '$refAssmtCode', '$newQueNum', '$QuesContent', '$QuesType', '$QuesMark', 0, 0);";
    $results = mysqli_query($connection, $query);

    if($QuesType == "MCQ") {
        $Choice1 = $_POST['choice1'];
        $Choice2 = $_POST['choice2'];
        $Choice3 = $_POST['choice3'];
        $Choice4 = $_POST['choice4'];

        $newChoiceID1 = "CHO_" . generateID();
        $query5 = "INSERT INTO choice (ChoiceID, QuesID, ChoiceContent) VALUES 
        ('$newChoiceID1', '$newID', '$Choice1');";
        $results5 = mysqli_query($connection, $query5);

        $newChoiceID2 = "CHO_" . generateID();
        $query6 = "INSERT INTO choice (ChoiceID, QuesID, ChoiceContent) VALUES 
        ('$newChoiceID2', '$newID', '$Choice2');";
        $results6 = mysqli_query($connection, $query6);

        $newChoiceID3 = "CHO_" . generateID();
        $query7 = "INSERT INTO choice (ChoiceID, QuesID, ChoiceContent) VALUES 
        ('$newChoiceID3', '$newID', '$Choice3');";
        $results7 = mysqli_query($connection, $query7);

        $newChoiceID4 = "CHO_" . generateID();
        $query8 = "INSERT INTO choice (ChoiceID, QuesID, ChoiceContent) VALUES 
        ('$newChoiceID4', '$newID', '$Choice4');";
        $results8 = mysqli_query($connection, $query8);
    }

    // If user has set the description, update column
    if ($QuesDesc != NULL) {
        $query2 = "UPDATE question SET QueDesc = '$QuesDesc' WHERE QuesID = '$newID';";
        $results2 = mysqli_query($connection, $query2);
    }

    // If user has set the answer, update column
    if ($QuesAns != NULL) {
        $query3 = "UPDATE question SET QueAnswer = '$QuesAns' WHERE QuesID = '$newID';";
        $results3 = mysqli_query($connection, $query3);
    }
    
    // If user uploaded an image
    if($filename != NULL) {
        // Upload image to folder
        $tempname = $_FILES["QuestionImg"]["tmp_name"];
        $folder = "../images/questionImg/" . $filename;
        move_uploaded_file($tempname, $folder);

        $query4 = "UPDATE question SET QueImg = '$filename' WHERE QuesID = '$newID';";
        $results4 = mysqli_query($connection, $query4);
    }

    // Query Validation
    if (($QuesDesc != NULL) && ($QuesAns != NULL) && ($filename != NULL)) {
        if($results && $results2 && $results3 && $results4) {
            $flagSuccess = TRUE;
        } else {
            $flagSuccess = FALSE;
        }
    } else if (($QuesDesc != NULL) && ($QuesAns != NULL)) {
        if($results && $results2 && $results3) {
            $flagSuccess = TRUE;
        } else {
            $flagSuccess = FALSE;
        }
    } else if (($QuesDesc != NULL)) {
        if($results && $results2) {
            $flagSuccess = TRUE;
        } else {
            $flagSuccess = FALSE;
        }
    } else if (($QuesAns != NULL)) {
        if($results && $results3) {
            $flagSuccess = TRUE;
        } else {
            $flagSuccess = FALSE;
        }
    } else if (($fileName != NULL)) {
        if($results && $results4) {
            $flagSuccess = TRUE;
        } else {
            $flagSuccess = FALSE;
        }
    } else if (($QuesAns != NULL) && ($filename != NULL)) {
        if($results && $results3 && $results4) {
            $flagSuccess = TRUE;
        } else {
            $flagSuccess = FALSE;
        }
    } else if (($QuesDesc != NULL) && ($filename != NULL)) {
        if($results && $results2 && $results4) {
            $flagSuccess = TRUE;
        } else {
            $flagSuccess = FALSE;
        }
    } else {
        $flagSuccess = TRUE;
    }

    // Query Validation - Part 2
    if ($QuesType == "MCQ") {
        if($results5 && $results6 && $results7 && $results8) {
            $flagSuccess = TRUE;
        } else {
            $flagSuccess = FALSE;
        }
    }

    if($flagSuccess) {
?>
        <script>
            alert("You have successfully created a question for your assessment. You can check the added question in Manage Question page.");
            window.location = "./manageQuestion.php?assmtcode=<?php echo $refAssmtCode?>";
        </script>
<?php
    } else {
?>
        <script>
            alert("Sorry! You have failed to create a question for your assessment. Please try again!");
            window.location = "./manageQuestion.php?assmtcode=<?php echo $refAssmtCode?>";
        </script>
<?php
    }
?>