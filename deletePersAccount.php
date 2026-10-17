<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./images/Kuiztory_logo_trans.png">
    <title>Kuiztory - Delete Personal Account</title>
    <link rel="stylesheet" href="./styles/deletePersAcc.css">
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
            $dashboard = "studentDashboard.php";
    ?>
            <h1 class="title">Delete Student Account</h1>
            <p class="description">Student Account Deletion Confirmation Message</p>
    <?php
        } else {
            $dashboard = "teacherDashboard.php";
    ?>        
            <h1 class="title">Delete Teacher Account</h1>
            <p class="description">Teacher Account Deletion Confirmation Message</p>
    <?php        
        }
    ?>

        <section class="delete-confirm-box">
            <h1 class="delete-acc-question">Are you sure you want to delete your account?</h1>
            <p class="delete-acc-warning">The action you will execute will permanently erase all your account data from the database!</p>
            <form action="" method="POST">
                <input class="action-btn delete-btn" type="submit" name="deleteAcc" value="Yes, delete my account">
                <input class="action-btn cancel-btn" type="button" onclick="location.href='<?php echo $dashboard;?>';" value="No, I changed my mind">
            </form>
        </section>

    <?php
        if(isset($_POST['deleteAcc'])) {
            if(isset($_SESSION['SES_StuID'])) {
                include './phpcrud/deleteStuAccount.php';
            } else {
                include './phpcrud/deleteTeaAccount.php';
            }
        }
    ?>    

    <!-- Footer -->
    <?php include "footer.php";?>
</body>
</html>