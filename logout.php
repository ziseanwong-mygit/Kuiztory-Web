<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./images/Kuiztory_logo_trans.png">
    <title>Kuiztory - Log Out Account</title>
    <link rel="stylesheet" href="./styles/logout.css">
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

    <?php
        if(isset($_SESSION['SES_StuID'])) {
    ?>
            <h1 class="title">Log Out Student Account</h1>
            <p class="description">Student Account Logout Confirmation Message</p>
    <?php
        } else {
    ?>        
            <h1 class="title">Log Out Teacher Account</h1>
            <p class="description">Teacher Account Logout Confirmation Message</p>
    <?php        
        }
    ?>

        <section class="delete-confirm-box">
            <h1 class="delete-acc-question">Are you sure you want to log out your account?</h1>
            <form action="" method="POST">
                <input class="action-btn delete-btn" type="submit" name="logoutAcc" value="Yes, I want to log out">
                <input class="action-btn cancel-btn" type="button" onclick="history.back();" value="No, I stay here for a while">
            </form>
        </section>

    <?php
        if (isset($_POST['logoutAcc'])) {
            if (isset($_SESSION['SES_StuID'])) {
                unset($_SESSION['SES_StuID']);
                session_destroy();
    ?>
                <script>
                    alert("You have successfully logged out your student account! Hope you can come back to learn Malaysia history anytime soon!")
                    window.location = "index.php";
                </script>
    <?php            
            } else {
                unset($_SESSION['SES_TeaID']);
                session_destroy();
            }
    ?>
                <script>
                    alert("You have successfully logged out your teacher account! Hope you can come back to teach more students about our beloved Malaysia history!")
                    window.location = "index.php";
                </script>
    <?php
        }
    ?>    

    <!-- Footer -->
    <?php include "footer.php";?>
</body>
</html>