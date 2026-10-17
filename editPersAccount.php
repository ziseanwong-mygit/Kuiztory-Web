<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuiztory - Edit Personal Account</title>
    <link rel="icon" type="image/x-icon" href="./images/Kuiztory_logo_trans.png">
    <link rel="stylesheet" href="./styles/accRegistration.css">
    <link rel="stylesheet" href="./styles/footer.css">
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
            include './phpcrud/info_Student.php';
            $getImgName = $refStuImg; // get old image file name for update
    ?>        
            <h1>Edit Student Account</h1>
            <p>
                Students can edit their own account by changing the details below. <br> 
                <span style="color: red; font-weight: bold;">Each details cannot be blank.</span>
            </p>
            <main>
                <div id="student" class="form-section active">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <label for="student-email">Email Address:</label>
                        <input type="email" id="student-email" name="accEmail" placeholder="Eg: user123@gmail.com" value="<?php echo $refStuEmail?>" required>

                        <label for="student-username">Username:</label>
                        <input type="text" id="student-username" name="accName" placeholder="Eg: Mohammad bin Ahmad" value="<?php echo $refStuName?>" required>

                        <label for="student-tel">Tel No:</label>
                        <input type="tel" id="student-tel" name="accTelNo" placeholder="Eg: 0127650992" value="<?php echo $refStuTelNo?>" required>

                        <label for="student-gender">Gender:</label>
                        <select id="student-gender" name="accGender" required>
                            <option value="">Select your gender</option>
                            <?php
                                if ($refStuGender == "Male") {
                            ?>        
                                    <option value="Male" selected>Male</option>
                                    <option value="Female">Female</option>
                            <?php        
                                } else {
                            ?>        
                                    <option value="Male">Male</option>
                                    <option value="Female" selected>Female</option>
                            <?php       
                                }
                            ?>
                        </select>

                        <label for="student-country">Country:</label>
                        <input type="tel" id="student-country" name="accCountry" placeholder="Eg: Malaysia" value="<?php echo $refStuCountry;?>"required>

                        <label for="student-grade">Grade Level:</label>
                        <select id="student-grade" name="accGradeLvl" required>
                            <option value="">Select your level</option>
                            <?php
                                if ($refStuGradeLvl == "Form 1") {
                            ?>        
                                <option value="Form 1" selected>Form 1</option>
                                <option value="Form 2">Form 2</option>
                                <option value="Form 3">Form 3</option>
                                <option value="Form 4">Form 4</option>
                                <option value="Form 5">Form 5</option>
                            <?php        
                                } else if ($refStuGradeLvl == "Form 2") {
                            ?>        
                                <option value="Form 1">Form 1</option>
                                <option value="Form 2" selected>Form 2</option>
                                <option value="Form 3">Form 3</option>
                                <option value="Form 4">Form 4</option>
                                <option value="Form 5">Form 5</option>
                            <?php       
                                } else if ($refStuGradeLvl == "Form 3") {
                            ?>
                                <option value="Form 1">Form 1</option>
                                <option value="Form 2">Form 2</option>
                                <option value="Form 3" selected>Form 3</option>
                                <option value="Form 4">Form 4</option>
                                <option value="Form 5">Form 5</option>
                            <?php        
                                } else if ($refStuGradeLvl == "Form 4") {
                            ?>        
                                <option value="Form 1">Form 1</option>
                                <option value="Form 2">Form 2</option>
                                <option value="Form 3">Form 3</option>
                                <option value="Form 4" selected>Form 4</option>
                                <option value="Form 5">Form 5</option>
                            <?php       
                                } else if ($refStuGradeLvl == "Form 5") {
                            ?>
                                <option value="Form 1">Form 1</option>
                                <option value="Form 2">Form 2</option>
                                <option value="Form 3">Form 3</option>
                                <option value="Form 4">Form 4</option>
                                <option value="Form 5" selected>Form 5</option>
                            <?php        
                                } else {}
                            ?>        
                        </select>

                        <label for="student-school">School/Organisation:</label>
                        <input type="text" id="student-school" name="accSchool" placeholder="Eg: SMK Bukit Jalil" value="<?php echo $refStuSchool?>" required>

                        <label for="student-SPM">SPM Student:</label>
                        <select id="student-SPM" name="accSPM" required>
                            <option value="">Are you facing SPM?</option>
                            <?php
                                if ($refStuSPM == "Yes") {
                            ?>        
                                    <option value="Yes" selected>Yes</option>
                                    <option value="No">No</option>
                            <?php        
                                } else {
                            ?>        
                                    <option value="Yes">Yes</option>
                                    <option value="No" selected>No</option>
                            <?php       
                                }
                            ?>
                        </select>

                        <label for="student-img">Profile Image:</label>
                        <input type="file" id="imgContent" name="accImg" accept="image/*">

                        <label for="student-password">Password:</label>
                        <input type="password" id="student-password" name="accPswd" value="<?php echo $refStuPswd?>" required>
                        <input class="showPswd-btn" type="button" onclick="showPswd()" value="Show Password">

                        <button type="submit" name="startUpdate">Update Account</button>
                        <button type="button" onclick="location.href='studentDashboard.php';">Cancel Update</button>
                    </form>
                </div>
            </main>
  <?php 
        } else {
            include './phpcrud/info_Teacher.php';
            $getImgName = $refTeaImg; // get old image file name for update
  ?>
            
            <h1>Edit Teacher Account</h1>
            <p>
                Teachers can edit their own account by changing the details below. <br> 
                <span style="color: red; font-weight: bold;">Each details cannot be blank.</span>
            </p>
            <main>
                <div id="teacher" class="form-section active">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <label for="teacher-email">Email Address:</label>
                        <input type="email" id="teacher-email" name="accEmail" placeholder="Eg: user123@gmail.com" value="<?php echo $refTeaEmail?>" required>

                        <label for="teacher-username">Username:</label>
                        <input type="text" id="teacher-username" name="accName" placeholder="Eg: Mohammad bin Ahmad" value="<?php echo $refTeaName?>" required>

                        <label for="teacher-tel">Tel No:</label>
                        <input type="tel" id="teacher-tel" name="accTelNo" placeholder="Eg: 0127650992" value="<?php echo $refTeaTelNo?>" required>

                        <label for="teacher-gender">Gender:</label>
                        <select id="teacher-gender" name="accGender" required>
                            <option value="">Select your gender</option>
                            <?php
                                if ($refTeaGender == "Male") {
                            ?>        
                                    <option value="Male" selected>Male</option>
                                    <option value="Female">Female</option>
                            <?php        
                                } else {
                            ?>        
                                    <option value="Male">Male</option>
                                    <option value="Female" selected>Female</option>
                            <?php       
                                }
                            ?>
                        </select>

                        <label for="teacher-country">Country:</label>
                        <input type="tel" id="teacher-country" name="accCountry" placeholder="Eg: Malaysia" value="<?php echo $refTeaCountry;?>"required>

                        <label for="teacher-grade">Grade Level:</label>
                        <select id="teacher-grade" name="accGradeLvl" required>
                            <option value="">Select your level</option>
                            <?php
                                if ($refTeaLvl == "Form 1") {
                            ?>        
                                <option value="Form 1" selected>Form 1</option>
                                <option value="Form 2">Form 2</option>
                                <option value="Form 3">Form 3</option>
                                <option value="Form 4">Form 4</option>
                                <option value="Form 5">Form 5</option>
                            <?php        
                                } else if ($refStuGradeLvl == "Form 2") {
                            ?>        
                                <option value="Form 1">Form 1</option>
                                <option value="Form 2" selected>Form 2</option>
                                <option value="Form 3">Form 3</option>
                                <option value="Form 4">Form 4</option>
                                <option value="Form 5">Form 5</option>
                            <?php       
                                } else if ($refStuGradeLvl == "Form 3") {
                            ?>
                                <option value="Form 1">Form 1</option>
                                <option value="Form 2">Form 2</option>
                                <option value="Form 3" selected>Form 3</option>
                                <option value="Form 4">Form 4</option>
                                <option value="Form 5">Form 5</option>
                            <?php        
                                } else if ($refStuGradeLvl == "Form 4") {
                            ?>        
                                <option value="Form 1">Form 1</option>
                                <option value="Form 2">Form 2</option>
                                <option value="Form 3">Form 3</option>
                                <option value="Form 4" selected>Form 4</option>
                                <option value="Form 5">Form 5</option>
                            <?php       
                                } else if ($refStuGradeLvl == "Form 5") {
                            ?>
                                <option value="Form 1">Form 1</option>
                                <option value="Form 2">Form 2</option>
                                <option value="Form 3">Form 3</option>
                                <option value="Form 4">Form 4</option>
                                <option value="Form 5" selected>Form 5</option>
                            <?php        
                                } else {}
                            ?>        
                        </select>

                        <label for="teacher-school">School/Organisation:</label>
                        <input type="text" id="teacher-school" name="accSchool" placeholder="Eg: SMK Bukit Jalil" value="<?php echo $refTeaSchool?>" required>

                        <label for="teacher-role"><span style="color:red;">* </span>Teaching Role:</label>
                        <select id="teacher-role" name="accTeachRole" required>
                            <option value="">Select your role</option>
                            <?php
                                if ($refTeaRole == "Teacher") {
                            ?>       
                                <option value="Teacher" selected>Teacher</option>
                                <option value="Head of subject">Head of subject</option>
                                <option value="Tutor">Tutor</option>
                                <option value="Part time">Part time</option>
                                <option value="Other">Other</option>
                            <?php        
                                } else if ($refTeaRole == "Head of subject") {
                            ?>        
                                <option value="Teacher">Teacher</option>
                                <option value="Head of subject" selected>Head of subject</option>
                                <option value="Tutor">Tutor</option>
                                <option value="Part time">Part time</option>
                                <option value="Other">Other</option>
                            <?php       
                                } else if ($refTeaRole == "Tutor") {
                            ?>
                                <option value="Teacher">Teacher</option>
                                <option value="Head of subject">Head of subject</option>
                                <option value="Tutor" selected>Tutor</option>
                                <option value="Part time">Part time</option>
                                <option value="Other">Other</option>
                            <?php        
                                } else if ($refTeaRole == "Part time") {
                            ?>        
                                <option value="Teacher">Teacher</option>
                                <option value="Head of subject">Head of subject</option>
                                <option value="Tutor">Tutor</option>
                                <option value="Part time" selected>Part time</option>
                                <option value="Other">Other</option>
                            <?php       
                                } else if ($refTeaRole == "Other") {
                            ?>
                                <option value="Teacher">Teacher</option>
                                <option value="Head of subject">Head of subject</option>
                                <option value="Tutor">Tutor</option>
                                <option value="Part time">Part time</option>
                                <option value="Other" selected>Other</option>
                            <?php        
                                } else {}
                            ?>  
                        </select>

                        <label for="teacher-img">Profile Image:</label>
                        <input type="file" id="imgContent" name="accImg" accept="image/*">
                        
                        <label for="teacher-password">Password:</label>
                        <input type="password" id="teacher-password" name="accPswd" value="<?php echo $refTeaPswd?>" required>
                        <input class="showPswd-btn" type="button" onclick="showPswd2()" value="Show Password">

                        <button type="submit" name="startUpdate">Update Account</button>
                        <button type="button" onclick="location.href='teacherDashboard.php';">Cancel Update</button>
                    </form>
                </div>
            </main>
  <?php } ?>                           
                    
    <script>
        function showPswd() {
            var x = document.getElementById("student-password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        function showPswd2() {
            var x = document.getElementById("teacher-password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
    
    <?php
        if(isset($_POST['startUpdate'])) {
            include './phpcrud/updateAccount.php';
        }
    ?>
    
    <?php include "footer.php";?>

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
