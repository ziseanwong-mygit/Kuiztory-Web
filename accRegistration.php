<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuiztory - Register Account</title>
    <link rel="icon" type="image/x-icon" href="./images/Kuiztory_logo_trans.png">
    <link rel="stylesheet" href="./styles/accRegistration.css">
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

    <h1>Account Registration</h1>
    <p>Your history journey begins here! <br> Please fill in your personal details.</p>
    <main>
        <div class="tab">
            <button id="student-tab" class="active" onclick="showForm('student')">Student</button>
            <button id="teacher-tab" onclick="showForm('teacher')">Teacher</button>
        </div>
        <label style="color:red;font-style:italic;">* Required fields</label>
        
        <div id="student" class="form-section active" style="margin-top:15px;">
            <form action="" method="POST" enctype="multipart/form-data">
                <label for="student-email"><span style="color:red;">* </span>Email Address:</label>
                <input type="email" id="student-email" name="stuEmail" placeholder="Eg: user123@gmail.com" required>

                <label for="student-username"><span style="color:red;">* </span>Username:</label>
                <input type="text" id="student-username" name="stuName" placeholder="Eg: Mohammad bin Ahmad" required>

                <label for="student-tel"><span style="color:red;">* </span>Tel No:</label>
                <input type="tel" id="student-tel" name="stuTelNo" placeholder="Eg: 0127650992" required>

                <label for="student-gender"><span style="color:red;">* </span>Gender:</label>
                <select id="student-gender" name="stuGender" required>
                    <option value="">Select your gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>

                <label for="student-country"><span style="color:red;">* </span>Country:</label>
                <input type="tel" id="student-country" name="stuCountry" placeholder="Eg: Malaysia" required>

                <label for="student-grade"><span style="color:red;">* </span>Grade Level:</label>
                <select id="student-grade" name="stuGrade" required>
                    <option value="">Select your level</option>
                    <option value="Form 1">Form 1</option>
                    <option value="Form 2">Form 2</option>
                    <option value="Form 3">Form 3</option>
                    <option value="Form 4">Form 4</option>
                    <option value="Form 5">Form 5</option>
                </select>

                <label for="student-school"><span style="color:red;">* </span>School/Organisation:</label>
                <input type="text" id="student-school" name="stuSchool" placeholder="Eg: SMK Bukit Jalil" required>

                <label for="student-SPM"><span style="color:red;">* </span>SPM Student:</label>
                <select id="student-SPM" name="stuSPM" required>
                    <option value="">Are you facing SPM?</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>

                <label for="student-img">Profile Image:</label>
                <input type="file" id="myFile" name="stuImg" accept="image/*">

                <label for="student-password"><span style="color:red;">* </span>Password:</label>
                <input type="password" id="student-password" name="stuPswd" minlength="8" maxlength="15" required>

                <label for="student-confirm-password"><span style="color:red;">* </span>Confirm Password:</label>
                <input type="password" id="student-confirm-password" minlength="8" maxlength="15" name="stuConfPswd" required>

                <label style="font-size:12px;font-weight:bold;font-style:italic;">Password requirements</label>
                <label style="font-size:12px;">✓ 8-15 characters</label>
                <label style="font-size:12px;">✓ Must have an uppercase letter</label>
                <label style="font-size:12px;">✓ Must have a lowercase letter</label>
                <label style="font-size:12px;">✓ Must have a number</label>
                <label style="font-size:12px;">✓ Must have a special character</label>

                <input class="showPswd-btn" type="button" onclick="showStuPswd()" value="Show Password">
                <button type="submit" name="registerStudent">Register Account</button>
                <button type="reset">Clear Form</button>
            </form>
        </div>

        <div id="teacher" class="form-section" style="margin-top:15px;">
            <form action="" method="POST" enctype="multipart/form-data">
                <label for="teacher-email"><span style="color:red;">* </span>Email Address:</label>
                <input type="email" id="teacher-email" name="teaEmail" placeholder="Eg: user123@gmail.com" required>

                <label for="teacher-username"><span style="color:red;">* </span>Username:</label>
                <input type="text" id="teacher-username" name="teaName" placeholder="Eg: Mohammad bin Ahmad" required>

                <label for="teacher-tel"><span style="color:red;">* </span>Tel No:</label>
                <input type="tel" id="teacher-tel" name="teaTelNo" placeholder="Eg: 0127650992" required>

                <label for="teacher-gender"><span style="color:red;">* </span>Gender:</label>
                <select id="teacher-gender" name="teaGender" required>
                    <option value="">Select your gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>

                <label for="teacher-country"><span style="color:red;">* </span>Country:</label>
                <input type="tel" id="teacher-country" name="teaCountry" placeholder="Eg: Malaysia" required>

                <label for="teacher-grade"><span style="color:red;">* </span>Teaching Level:</label>
                <select id="teacher-grade" name="teaTeachLvl" required>
                    <option value="">Select your level</option>
                    <option value="Form 1">Form 1</option>
                    <option value="Form 2">Form 2</option>
                    <option value="Form 3">Form 3</option>
                    <option value="Form 4">Form 4</option>
                    <option value="Form 5">Form 5</option>
                </select>

                <label for="teacher-school"><span style="color:red;">* </span>School/Organisation:</label>
                <input type="text" id="teacher-school" name="teaSchool" placeholder="Eg: SMK Bukit Jalil" required>

                <label for="teacher-role"><span style="color:red;">* </span>Teaching Role:</label>
                <select id="teacher-role" name="teaRole" required>
                    <option value="">Select your role</option>
                    <option value="Teacher">Teacher</option>
                    <option value="Head of subject">Head of subject</option>
                    <option value="Tutor">Tutor</option>
                    <option value="Part time">Part time</option>
                    <option value="Other">Other</option>
                </select>

                <label for="teacher-img">Profile Image:</label>
                <input type="file" id="myFile" name="teaImg" accept="image/*">

                <label for="teacher-password"><span style="color:red;">* </span>Password:</label>
                <input type="password" id="teacher-password" minlength="8" maxlength="15" name="teaPswd" required>

                <label for="teacher-confirm-password"><span style="color:red;">* </span>Confirm Password:</label>
                <input type="password" id="teacher-confirm-password" minlength="8" maxlength="15" name="teaConfPswd" required>

                <label style="font-size:12px;font-weight:bold;font-style:italic;">Password requirements</label>
                <label style="font-size:12px;">✓ 8-15 characters</label>
                <label style="font-size:12px;">✓ Must have an uppercase letter</label>
                <label style="font-size:12px;">✓ Must have a lowercase letter</label>
                <label style="font-size:12px;">✓ Must have a number</label>
                <label style="font-size:12px;">✓ Must have a special character</label>

                <input class="showPswd-btn" type="button" onclick="showTeaPswd()" value="Show Password">
                <button type="submit" name="registerTeacher">Register Account</button>
                <button type="reset">Clear Form</button>
            </form>
        </div>

        <p>Have an account? <a href="login.php">Login here</a></p>
    </main>

    <?php
        if (isset($_POST['registerStudent']) || isset($_POST['registerTeacher'])) {
            include './phpcrud/registerAccount.php';
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

            var y = document.getElementById("student-confirm-password");
            if (y.type === "password") {
                y.type = "text";
            } else {
                y.type = "password";
            }
        }

        function showTeaPswd() {
            var x = document.getElementById("teacher-password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }

            var y = document.getElementById("teacher-confirm-password");
            if (y.type === "password") {
                y.type = "text";
            } else {
                y.type = "password";
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
