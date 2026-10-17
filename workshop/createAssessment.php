<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuiztory - Create Assessment</title>
    <link rel="icon" type="image/x-icon" href="../images/Kuiztory_logo_trans.png">
    <link rel="stylesheet" href="./styles/createAssessment.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <!-- Header -->
    <?php 
        if(isset($_SESSION['SES_TeaID'])) {
            include "WKSheader.php";
        }
    ?>

    <!-- Main Content -->
    <div class="container">
        <button class="back-btn" onclick="window.location.href='assessmentWorkshop.php'">
            <i class="fa fa-arrow-circle-left" style="padding-right: 10px;"></i>
            Back to Workshop
        </button>
        <h1>Creating Your Assessment</h1>
        <p>Before adding questions, please select options and fill in the necessary details to save assessment info.</p>

        <!-- Assessment Form -->
        <form action="" method="POST" enctype="multipart/form-data">
            <!-- Step 1: Select Grade Level -->
            <div class="step">
                <label class="instruction">1. Select the assessment grade level:</label>
                <div class="options">
                    <input type="radio" name="AssmtLvl" value="Form 1" required> Form 1
                    <input type="radio" name="AssmtLvl" value="Form 2"> Form 2
                    <input type="radio" name="AssmtLvl" value="Form 3"> Form 3
                    <input type="radio" name="AssmtLvl" value="Form 4"> Form 4
                    <input type="radio" name="AssmtLvl" value="Form 5"> Form 5
                </div>
            </div>

            <!-- Step 2: Fill in Assessment Details -->
            <div class="step">
                <label class="instruction">2. Fill in assessment details:</label><br>
                <label style="color:yellow;font-style:italic;">* Required fields</label>
                <div class="form-group">
                    <label><span style="color:yellow;">*</span> Name:</label>
                    <input type="text" name="AssmtName" placeholder="E.g. Kuiz Sejarah SPM Cemerlang" required>
                    
                    <label><span style="color:yellow;">*</span> Description:</label>
                    <textarea name="AssmtDesc" placeholder="E.g. Kuiz ini mengandungi 50 soalan objektif" required></textarea>

                    <label><span style="color:yellow;">*</span> Chapter:</label>
                    <input type="number" name="AssmtChap" placeholder="E.g. 1" min="1" max="10" required>

                    <label><span style="color:yellow;">*</span> Topic:</label>
                    <input type="text" name="AssmtTopic" placeholder="E.g. SPM Sejarah Objektif" required>

                    <label><span style="color:yellow;">*</span> Difficulty:</label>
                    <select name="AssmtDifficulty" style="font-size:14px;" required>
                        <option value="">Select a difficulty</option>
                        <option value="Beginner">Beginner</option>
                        <option value="Intermediate">Intermediate</option>
                        <option value="Advanced">Adavanced</option>
                        <option value="Expert">Expert</option>
                    </select>

                    <label><span style="color:yellow;">*</span> Visibility:</label>
                    <select name="AssmtVisible"  style="font-size:14px;" required>
                        <option value="">Select a visibility</option>
                        <option value="Public">Public</option>
                        <option value="Unlisted">Unlisted</option>
                        <option value="Private">Private</option>
                    </select>

                    <label><span style="color:yellow;">*</span> Open status:</label>
                    <select name="AssmtOpenStatus" style="font-size:14px;" required>
                        <option value="">Select a status</option>
                        <option value="Open">Open</option>
                        <option value="Closed" selected>Closed</option>
                    </select>

                    <label>Background image:</label>
                    <input type="file" name="AssmtImg" accept="image/*" style="background-color:white;padding:5px;">
                </div>
            </div>

            
            <!-- Step 3: Insert Tags -->
            <div class="step">
                <label class="instruction">3. Insert assessment tags for better searches by users (max 10):</label><br>
                <label style="font-size:14px;color:yellow;">Please use one word for each tag; do not use commas.</label><br><br>
                <input class="fieldTag" type="text" name="AssmtTag1" placeholder="E.g. SejarahTag 1"><br>
                <input class="fieldTag" type="text" name="AssmtTag2" placeholder="E.g. SejarahTag 2"><br>
                <input class="fieldTag" type="text" name="AssmtTag3" placeholder="E.g. SejarahTag 3"><br>
                <input class="fieldTag" type="text" name="AssmtTag4" placeholder="E.g. SejarahTag 4"><br>
                <input class="fieldTag" type="text" name="AssmtTag5" placeholder="E.g. SejarahTag 5"><br>
                <input class="fieldTag" type="text" name="AssmtTag6" placeholder="E.g. SejarahTag 6"><br>
                <input class="fieldTag" type="text" name="AssmtTag7" placeholder="E.g. SejarahTag 7"><br>
                <input class="fieldTag" type="text" name="AssmtTag8" placeholder="E.g. SejarahTag 8"><br>
                <input class="fieldTag" type="text" name="AssmtTag9" placeholder="E.g. SejarahTag 9"><br>
                <input class="fieldTag" type="text" name="AssmtTag10" placeholder="E.g. SejarahTag 10">
            </div>

            <!-- Submit Buttons -->
            <div class="form-buttons">
                <button type="submit" name="createAssmt">
                    <i class="fa fa-plus" style="padding-right: 5px;"></i>
                    Create Assessment
                </button>
                <button type="reset" name="eraseData">
                    <i class="fa fa-eraser" style="padding-right: 5px;"></i>
                    Erase Form
                </button>
            </div>
        </form>
    </div>
    
    <?php
        if(isset($_POST['createAssmt'])) {
            include './crudWKS/addAssessment.php';
        }
    ?>
    
    <!-- Footer -->
    <?php include "WKSfooter.php";?>
</body>
</html>
