<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuiztory - Create Class</title>
    <link rel="icon" type="image/x-icon" href="../images/Kuiztory_logo_trans.png">
    <link rel="stylesheet" href="./styles/createClass.css">
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
        <h1>Creating Your Class</h1>
        <p>Please select options and fill in the necessary details to save class info.</p>

        <!-- Class Form -->
        <form action="" method="POST">
            <div class="step">
                <label class="instruction">Fill in & select all class details:</label><br>
                <label style="color:yellow;font-style:italic;">* Required fields</label>
                <div class="form-group">
                    <label><span style="color:yellow;">*</span> Name:</label>
                    <input type="text" name="ClassName" placeholder="E.g. Kelas SPM Sejarah HOTS" required>
                    
                    <label><span style="color:yellow;">*</span> Description:</label>
                    <textarea name="ClassDesc" placeholder="E.g. Selamat datang kepada semua pelajar untuk menyertai kelas ini!" required></textarea>

                    <label><span style="color:yellow;">*</span> Class Status:</label>
                    <select name="ClassStatus" style="font-size:14px;" required>
                        <option value="">Select a status</option>
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>    
            </div>

            <!-- Submit Buttons -->
            <div class="form-buttons">
                <button type="submit" name="createClass">
                    <i class="fa fa-plus" style="padding-right: 5px;"></i>
                    Create Class
                </button>
                <button type="reset" name="eraseData">
                    <i class="fa fa-eraser" style="padding-right: 5px;"></i>
                    Erase Form
                </button>
            </div>
        </form>
    </div>

    <?php
        if(isset($_POST['createClass'])) {
            include './crudWKS/addClass.php';
        }
    ?>
    
    <!-- Footer -->
    <?php include "WKSfooter.php";?>
</body>
</html>
