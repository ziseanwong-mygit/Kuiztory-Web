<?php
    include 'DBconnection.php';

    $flagUpdateGood = FALSE;

    $updateNum = $_POST['QuesNum'];
    $updateContent = $_POST['QuesContent'];
    $updateDesc = $_POST['QuesDesc'];
    $updateMark = $_POST['QuesMark'];
    $updateAns = $_POST['QuesAnswer'];
    $filename = $_FILES["QuesImg"]["name"];

    $query = "UPDATE question SET QueContent = '$updateContent', QueDesc = '$updateDesc', 
    QueMark = '$updateMark', QueAnswer = '$updateAns' WHERE QuesID = '$refQuestionID';";
    $results = mysqli_query($connection, $query);
    $flagUpdateGood = TRUE;

    // Update question number process
    $query5 = "SELECT QuesID, QueNum FROM question WHERE QueNum = '$updateNum';"; // get the question with same number as updated question num
    $results5 = mysqli_query($connection, $query5);
    $data5 = mysqli_fetch_assoc($results5);

    if(!(empty($data5))) { // If found question with same num
        $targetID = $data5['QuesID'];

        // Update the updated question QueNum
        $query7 = "UPDATE question SET QueNum = '$updateNum' WHERE QuesID = '$refQuestionID';";
        $results7 = mysqli_query($connection, $query7);
        if($results7) {
            // Update the targeted question QueNum
            $query8 = "UPDATE question SET QueNum = '$refQueNum' WHERE QuesID = '$targetID';";
            $results8 = mysqli_query($connection, $query8);
            if($results8) {
                $flagUpdateGood = TRUE;
            } else {
                $flagUpdateGood = FALSE;
            }
        } else {
            $flagUpdateGood = FALSE;
        }
    } 

    if ($filename != NULL) {
        if ($refQueImg != NULL) {
            $oldImgName = $refQueImg;
        } else {
            $oldImgName = NULL;
        }

        $tempname = $_FILES["QuesImg"]["tmp_name"];
        $folder = "../images/questionImg/" . $filename;

        $query2 = "UPDATE question SET QueImg = '$filename' WHERE QuesID = '$refQuestionID';";
        $results2 = mysqli_query($connection, $query2);

        if($results2) {
            $flagUpdateGood = TRUE;
            // If image is not existed before; newly added
            if ($oldImgName == NULL) {
                move_uploaded_file($tempname, $folder);
            } else {
                unlink("../images/questionImg/" . $oldImgName);
                move_uploaded_file($tempname, $folder);
            }
        } else {
            $flagUpdateGood = FALSE;
        }
    }

    // Update MCQ options
    if ($refQueType == "MCQ") {
        // Get inputs
        $Option1 = $_POST['AnswerOpt1'];
        $Option2 = $_POST['AnswerOpt2'];
        $Option3 = $_POST['AnswerOpt3'];
        $Option4 = $_POST['AnswerOpt4'];

        // Loop through the update process four times
        for ($x = 0; $x < 4; $x++) {
            if($x == 0){
                $AnsOption = $Option1;
            } else if ($x == 1) {
                $AnsOption = $Option2;
            } else if ($x == 2) {
                $AnsOption = $Option3;
            } else {
                $AnsOption = $Option4;
            }

            // Get Choice ID
            $query3 = "SELECT ChoiceID FROM choice WHERE QuesID = '$refQuestionID' ORDER BY ChoiceID ASC LIMIT 1 OFFSET $x;";
            $results3 = mysqli_query($connection, $query3);
            $data3 = mysqli_fetch_assoc($results3);
            $getChoiceID = $data3['ChoiceID'];
            
            $query4 = "UPDATE choice SET ChoiceContent = '$AnsOption' WHERE ChoiceID = '$getChoiceID';";
            $results4 = mysqli_query($connection, $query4);

            if ($results4) {
                $flagUpdateGood = TRUE;
            } else {
                $flagUpdateGood = FALSE;              
            }
        }
    }

    if ($flagUpdateGood) {
        if ($results && $results2 && $results4) {
?>
            <script>
                alert("You have successfully updated your question info and answer options! The question image has also been replaced with new one. Please check your question record.");
                history.back();
            </script>
    <?php
        } else if ($results && $results2) {
    ?>
            <script>
                alert("You have successfully updated your question info! The question image has also been replaced with new one. Please check your question record.");
                history.back();
            </script>
    <?php
        } else if ($results && $results4) {
    ?>
            <script>
                alert("You have successfully updated your question info and answer options! Please check your question record.");
                history.back();
            </script>
    <?php
        } else if ($results) {
    ?> 
            <script>
                alert("You have successfully updated your question info! Please check your question record.");
                history.back();
            </script>
    <?php
        } else {
    ?>         
            <script>
                alert("Oh no! Your updating question process has failed! Please try again.");
                history.back();
            </script> 
<?php                         
        }
    }
?>
 