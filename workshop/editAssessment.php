<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuiztory - Edit Assessment Info</title>
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
        $refAssmtCode = $_GET['assmtcode'];

        $query = "SELECT * FROM assessment WHERE AssmtCode = '$refAssmtCode';";
        $results = mysqli_query($connection, $query);
        $data = mysqli_fetch_assoc($results);

        $AssmtName = $data['AssmtName'];
        $AssmtDesc = $data['AssmtDesc'];
        $AssmtGrade = $data['AssmtGradeLvl'];
        $AssmtChapter = $data['AssmtChapter'];
        $AssmtTopic = $data['AssmtTopic'];
        $AssmtDiff = $data['AssmtDifficulty'];
        $AssmtVisibility = $data['AssmtVisibility'];
        $AssmtTags = $data['AssmtTags'];
        $AssmtBgImg = $data['AssmtBgImg'];
        $AssmtOpenStatus = $data['AssmtOpenStatus'];
    ?>

    <h1>Edit Assessment Information</h1>
    <p>
        You can edit your quiz info by changing the details below. <br><br>
        <span style="color: red; font-weight: bold;">Each details cannot be blank.</span><br><br>
        <span style="color: maroon; font-style: italic;">
            Assessment tags should be in comma-separated values; (E.g. Form 1,Chapter 7,Tamadun,Sejarah).
        </span>
    </p>

    <main>
        <div id="student" class="form-section active">
            <form action="" method="POST" enctype="multipart/form-data">
                <label for="quiz-name">Quiz Name:</label>
                <input type="text" id="quiz-name" name="QuizName" placeholder="Eg: Kuiz Sejarah SPM Cemerlang" value="<?php echo $AssmtName?>" required>

                <label for="quiz-desc">Quiz Description:</label>
                <textarea class="txtarea-desc" name="QuizDesc" placeholder="E.g. Kuiz ini mengandungi 50 soalan objektif" required><?php echo $AssmtDesc?></textarea>
                   
                <label for="quiz-grade">Grade Level:</label>
                <select id="quiz-grade" name="QuizGrade" required>
                    <option value="">Select a grade level</option>
                    <?php
                        if ($AssmtGrade == "Form 1") {
                    ?>        
                            <option value="Form 1" selected>Form 1</option>
                            <option value="Form 2">Form 2</option>
                            <option value="Form 3">Form 3</option>
                            <option value="Form 4">Form 4</option>
                            <option value="Form 5">Form 5</option>
                    <?php        
                        } else if ($AssmtGrade == "Form 2") {
                    ?>        
                            <option value="Form 1">Form 1</option>
                            <option value="Form 2" selected>Form 2</option>
                            <option value="Form 3">Form 3</option>
                            <option value="Form 4">Form 4</option>
                            <option value="Form 5">Form 5</option>
                    <?php        
                        } else if ($AssmtGrade == "Form 3") {
                    ?>        
                            <option value="Form 1">Form 1</option>
                            <option value="Form 2">Form 2</option>
                            <option value="Form 3" selected>Form 3</option>
                            <option value="Form 4">Form 4</option>
                            <option value="Form 5">Form 5</option>
                    <?php        
                        } else if ($AssmtGrade == "Form 4") {
                    ?>        
                            <option value="Form 1">Form 1</option>
                            <option value="Form 2">Form 2</option>
                            <option value="Form 3">Form 3</option>
                            <option value="Form 4" selected>Form 4</option>
                            <option value="Form 5">Form 5</option>
                    <?php        
                        } else {
                    ?>
                            <option value="Form 1">Form 1</option>
                            <option value="Form 2">Form 2</option>
                            <option value="Form 3">Form 3</option>
                            <option value="Form 4">Form 4</option>
                            <option value="Form 5" selected>Form 5</option>     
                    <?php       
                        }
                    ?>
                </select>

                <label for="quiz-chapter">Chapter:</label>
                <?php
                    $numChap = str_replace("Chapter", "", $AssmtChapter);
                    $numChap = (int)$numChap;
                ?>
                <input type="number" id="quiz-chapter" name="QuizChap" placeholder="Eg: 1" value="<?php echo $numChap?>" required>

                <label for="quiz-topic">Topic:</label>
                <input type="text" id="quiz-topic" name="QuizTopic" placeholder="Eg: Latihan SPM Sejarah Objektif" value="<?php echo $AssmtTopic?>" required>

                <label for="quiz-difficulty">Difficulty:</label>
                <select id="quiz-difficulty" name="QuizDiff" required>
                    <option value="">Select a difficulty</option>
                    <?php
                        if ($AssmtDiff == "Beginner") {
                    ?>        
                            <option value="Beginner" selected>Beginner</option>
                            <option value="Intermediate">Intermediate</option>
                            <option value="Advanced">Advanced</option>
                            <option value="Expert">Expert</option>
                    <?php        
                        } else if ($AssmtDiff == "Intermediate") {
                    ?>        
                            <option value="Beginner">Beginner</option>
                            <option value="Intermediate" selected>Intermediate</option>
                            <option value="Advanced">Advanced</option>
                            <option value="Expert">Expert</option>
                    <?php        
                        } else if ($AssmtDiff == "Advanced") {
                    ?>        
                            <option value="Beginner">Beginner</option>
                            <option value="Intermediate">Intermediate</option>
                            <option value="Advanced" selected>Advanced</option>
                            <option value="Expert">Expert</option>
                    <?php        
                        } else {
                    ?>
                            <option value="Beginner">Beginner</option>
                            <option value="Intermediate">Intermediate</option>
                            <option value="Advanced">Advanced</option>
                            <option value="Expert" selected>Expert</option>   
                    <?php       
                        }
                    ?>
                </select>

                <label for="quiz-visibility">Visibility:</label>
                <select id="quiz-visibility" name="QuizVisi" required>
                    <option value="">Select a visibility</option>
                    <?php
                        if ($AssmtVisibility == "Public") {
                    ?>        
                            <option value="Public" selected>Public</option>
                            <option value="Unlisted">Unlisted</option>
                            <option value="Private">Private</option>
                    <?php        
                        } else if ($AssmtVisibility == "Unlisted") {
                    ?>        
                            <option value="Public">Public</option>
                            <option value="Unlisted" selected>Unlisted</option>
                            <option value="Private">Private</option>
                    <?php              
                        } else {
                    ?>
                            <option value="Public">Public</option>
                            <option value="Unlisted">Unlisted</option>
                            <option value="Private" selected>Private</option> 
                    <?php       
                        }
                    ?>
                </select>

                <label for="quiz-tags">Quiz Tags:</label>
                <textarea class="txtarea-tags" name="QuizTags" placeholder="E.g. Form 1,Chapter 7,Tamadun,Sejarah" required><?php echo $AssmtTags?></textarea>

                <label for="quiz-img">Background Image:</label>
                <input type="file" id="imgContent" name="QuizImg" accept="image/*">

                <label for="quiz-status">Open Status:</label>
                <select id="quiz-status" name="QuizStatus" required>
                    <option value="">Select a status</option>
                    <?php
                        if ($AssmtOpenStatus == "Open") {
                    ?>        
                            <option value="Open" selected>Open</option>
                            <option value="Closed">Closed</option>
                    <?php                    
                        } else {
                    ?>
                            <option value="Open">Open</option>
                            <option value="Closed" selected>Closed</option> 
                    <?php       
                        }
                    ?>
                </select>

                <button type="submit" name="startUpdate">Update Quiz</button>
                <button type="button" onclick="history.back();">Cancel Update</button>
            </form>
        </div>
    </main>

    <?php
        if(isset($_POST['startUpdate'])) {
            include "./crudWKS/updateAssessment.php";
        }
    ?>
   
    <!-- Footer -->
    <?php include "WKSfooter.php";?>
</body>
</html>