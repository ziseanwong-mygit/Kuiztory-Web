<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuiztory - Student Dashboard</title>
    <link rel="icon" type="image/x-icon" href="./images/Kuiztory_logo_trans.png">
    <link rel="stylesheet" href="./styles/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <!-- Header -->
    <?php 
        if(isset($_SESSION['SES_StuID']) || isset($_SESSION['SES_TeaID'])) {
            include "header2.php";
        } else {
            include "header.php";
        }
    ?>

    <?php include "./phpcrud/info_Teacher.php";?>

    <div class="container">
        <h2 style="font-size:30px; color:#007BFF;">Teacher Dashboard</h2>
        <div class="section">
            <div class="section-">
                <h3>Account Details</h3>
                <p class="border"></p>
                <p>
                    <strong>Profile Picture:</strong><br><br>
                    <img src="./images/teacher/<?php echo $refTeaImg?>" alt="">
                </p>    
                <p><strong>Teacher ID: </strong><?php echo $refTeaID;?></p>
                <p><strong>Registration Date: </strong><?php echo $refTeaRegDate;?></p>
                <p><strong>Email Address: </strong><?php echo $refTeaEmail;?></p>
                <p><strong>Username: </strong><?php echo $refTeaName;?></p>
                <p><strong>Tel No: </strong><?php echo $refTeaTelNo;?></p>
                <p><strong>Gender: </strong><?php echo $refTeaGender;?></p>
                <p><strong>Country: </strong><?php echo $refTeaCountry;?></p>
                <p>
                    <strong>Password: </strong>
                    <input type="password" value="<?php echo $refTeaPswd;?>" id="showPswd" readonly>
                    <input type="checkbox" onclick="showPswd()"><span style="font-size:14px; padding-left:5px;">Show Password</span>
                </p>
            </div>
        </div>
        <div class="section">
            <div class="section-header">
                <h3>Career Details</h3>
            </div>
            <p class="border"></p>
            <div class="section-details">
                <p><strong>School/Organization: </strong><?php echo $refTeaSchool;?></p>
                <p><strong>Teaching Level: </strong><?php echo $refTeaLvl;?></p>
                <p><strong>Role: </strong><?php echo $refTeaRole;?></p>
            </div>
        </div>
        
        <div class="button-container">
            <button class="edit-btn" onclick="location.href='editPersAccount.php';">Edit Account</button>
            <button class="delete-btn" onclick="location.href='deletePersAccount.php';">Delete Account</button>
        </div>
    </div>

    <script>
        function showPswd() {
            var x = document.getElementById("showPswd");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>

    <!-- Footer -->
    <?php include "footer.php";?>
</body>
</html>
