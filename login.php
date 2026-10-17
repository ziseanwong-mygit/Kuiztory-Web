<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuiztory - Login Account</title>
    <link rel="icon" type="image/x-icon" href="./images/Kuiztory_logo_trans.png">
    <link rel="stylesheet" href="./styles/login.css">
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

    <h1>Account Login</h1>
    <p>Your history journey begins here! Please fill in your information here.</p>

    <main>
        <div class="tab">
            <button id="student-tab" class="active" onclick="showForm('student')">Student</button>
            <button id="teacher-tab" onclick="showForm('teacher')">Teacher</button>
        </div>
        <label style="color:red;font-style:italic;">* Required fields</label>

        <div id="student" class="form-section active" style="margin-top:15px;">
            <form action="" method="POST">
                <label for="student-email"><span style="color:red;">* </span>Email Address:</label>
                <input type="email" id="teacher-email" name="stuEmail" required>

                <label for="student-password"><span style="color:red;">* </span>Password:</label>
                <input type="password" id="student-password" name="stuPswd" required>

                <input class="showPswd-btn" type="button" onclick="showStuPswd()" value="Show Password">
                <button type="submit" name="loginStudent">Log In Student Account</button>
                <button type="reset">Clear Form</button>
            </form>
        </div>

        <div id="teacher" class="form-section" style="margin-top:15px;">
            <form action="" method="POST">     
                <label for="teacher-email"><span style="color:red;">* </span>Email Address:</label>
                <input type="email" id="teacher-email" name="teaEmail" required>

                <label for="teacher-password"><span style="color:red;">* </span>Password:</label>
                <input type="password" id="teacher-password" name="teaPswd" required>

                <input class="showPswd-btn" type="button" onclick="showTeaPswd()" value="Show Password">
                <button type="submit" name="loginTeacher">Log In Teacher Account</button>
                <button type="reset">Clear Form</button>
            </form>
        </div>
            
        <!--<p>Forgotten password? <a href="#">Reset here</a></p>-->
    </main>

    <?php
        if (isset($_POST['loginStudent']) || isset($_POST['loginTeacher'])) {
            include './phpcrud/loginAccount.php';
        }
    ?>

    <?php include "footer.php";?>

    <script>
        function showStuPswd() {
            var x = document.getElementById("student-password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        function showTeaPswd() {
            var x = document.getElementById("teacher-password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>

    <script>
        function showForm(formType) {
            document.querySelectorAll('.form-section').forEach(section => section.classList.remove('active'));
            document.querySelector(`#${formType}`).classList.add('active');

            document.querySelectorAll('.tab button').forEach(button => button.classList.remove('active'));
            document.querySelector(`#${formType}-tab`).classList.add('active');
        }
    </script>
</body>
</html>
