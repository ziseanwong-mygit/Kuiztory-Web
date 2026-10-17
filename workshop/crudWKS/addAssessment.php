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
    $newID = "ASSMT_" . generateID();
    $newDate = date("Y-m-d");
    $refTeaID = $_SESSION['SES_TeaID'];

    include 'DBconnection.php';

    $inpName = $_POST['AssmtName'];
    $inpDesc = $_POST['AssmtDesc'];
    $inpGrade = $_POST['AssmtLvl'];
    $inpChap = $_POST['AssmtChap'];
    $inpTopic = $_POST['AssmtTopic'];
    $inpDiff = $_POST['AssmtDifficulty'];
    $inpVisi = $_POST['AssmtVisible'];
    $inpOpStat = $_POST['AssmtOpenStatus'];
    $filename = $_FILES["AssmtImg"]["name"];

    $formatChap = "Chapter " . $inpChap; 

    // If user uploaded an image
    if($filename != NULL) {
        // Upload image to folder
        $tempname = $_FILES["AssmtImg"]["tmp_name"];
        $folder = "../images/assmtBgImg/" . $filename;
        move_uploaded_file($tempname, $folder);
    } else {
        $filename = "default_assmtbg.jpg";
    }

    // Assessment Tags
    $inpTag1 = $_POST['AssmtTag1'];
    $inpTag2 = $_POST['AssmtTag2'];
    $inpTag3 = $_POST['AssmtTag3'];
    $inpTag4 = $_POST['AssmtTag4'];
    $inpTag5 = $_POST['AssmtTag5'];
    $inpTag6 = $_POST['AssmtTag6'];
    $inpTag7 = $_POST['AssmtTag7'];
    $inpTag8 = $_POST['AssmtTag8'];
    $inpTag9 = $_POST['AssmtTag9'];
    $inpTag10 = $_POST['AssmtTag10'];

    // Store tags in an array; including null values
    $arrayTag = [$inpTag1,$inpTag2,$inpTag3,$inpTag4,$inpTag5,$inpTag6,$inpTag7,$inpTag8,$inpTag9,$inpTag10];

    // Filter out the null values from array
    $cleanArray = array_filter($arrayTag);

    // Count how many tags
    $countTag = count($cleanArray);
    
    // If there are two or more tags
    if ($countTag >= 2) {
        $inpTags = implode(",",$cleanArray);
    } else if ($countTag = 1) {
        $inpTags = $cleanArray[0];
    } else {
        $inpTags = NULL;
    }
    
    $query = "INSERT INTO assessment (AssmtCode, TeacherID, AssmtName, AssmtDesc, AssmtRegDate, AssmtGradeLvl, 
    AssmtChapter, AssmtTopic, AssmtDifficulty, AssmtVisibility, AssmtTags, AssmtBgImg, 
    AssmtOpenStatus, LikeCount, DislikeCount) 
    VALUES ('$newID', '$refTeaID', '$inpName', '$inpDesc', '$newDate', '$inpGrade', '$formatChap', '$inpTopic', 
    '$inpDiff', '$inpVisi', '$inpTags', '$filename', '$inpOpStat', 0, 0);";

    $results = mysqli_query($connection, $query);

    if($results) {
?>
    <script>
        alert("Your assessment has been successfully created! Its details are saved in the database.");
        if(confirm("Do you wish to create questions now?") == true) {
            window.location = "createQuestion.php?assmtcode=<?php echo $newID?>";
        } else {
            window.location = "assessmentWorkshop.php";
        }
    </script>
<?php
    } else {
?>
    <script>
        alert("Sorry! Your assessment details are failed to be stored in the database. Please try again!");
    </script>
<?php
    }
?>