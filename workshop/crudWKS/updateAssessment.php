<?php
    include 'DBconnection.php';

    $results2 = FALSE;

    $updateName = $_POST['QuizName'];
    $updateDesc = $_POST['QuizDesc'];
    $updateGrade = $_POST['QuizGrade'];
    $updateChap = $_POST['QuizChap'];
    $updateTopic = $_POST['QuizTopic'];
    $updateDiff = $_POST['QuizDiff'];
    $updateVisi = $_POST['QuizVisi'];
    $updateTags = $_POST['QuizTags'];
    $filename = $_FILES["QuizImg"]["name"];
    $updateStatus= $_POST['QuizStatus'];

    $formatChap = "Chapter " . $updateChap;

    $query = "UPDATE assessment SET AssmtName = '$updateName', AssmtDesc = '$updateDesc', 
    AssmtGradeLvl = '$updateGrade', AssmtChapter = '$formatChap', AssmtTopic = '$updateTopic', 
    AssmtDifficulty = '$updateDiff', AssmtVisibility = '$updateVisi', AssmtTags = '$updateTags', 
    AssmtOpenStatus = '$updateStatus' WHERE AssmtCode = '$refAssmtCode';";
    $results = mysqli_query($connection, $query);

    if ($filename != NULL) {
        $oldImgName = $AssmtBgImg;

        $tempname = $_FILES["QuizImg"]["tmp_name"];
        $folder = "../images/assmtBgImg/" . $filename;

        $query2 = "UPDATE assessment SET AssmtBgImg = '$filename' WHERE AssmtCode = '$refAssmtCode';";
        $results2 = mysqli_query($connection, $query2);

        if($results2) {
            // If user changes from default to his own bg img, the copy of default img must remain
            if ($oldImgName == "default_assmtbg.jpg") {
                move_uploaded_file($tempname, $folder);
            } else {
                unlink("../images/assmtBgImg/" . $oldImgName);
                move_uploaded_file($tempname, $folder);
            }
        }
    }

    if ($results && $results2) {
?>
        <script>
            alert("You have successfully updated your assessment info! The background image has also been replaced with new one. Please check your asessment record.");
            history.back();
        </script>
<?php
    } else if ($results) {
?>
        <script>
            alert("You have successfully updated your assessment info! Please check your assessment record.");
            history.back();
        </script>
<?php
    } else {
?>
        <script>
            alert("Oh no! Your updating assessment process has failed! Please try again.");
            history.back();
        </script>
<?php
    }
?>