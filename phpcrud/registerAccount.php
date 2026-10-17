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
    include 'DBconnection.php'; // Include the database connection

    if (isset($_POST['registerStudent'])) {
        $stuEmail = $_POST['stuEmail'];
        $stuName = $_POST['stuName'];
        $stuTelNo = $_POST['stuTelNo'];
        $stuGender = $_POST['stuGender'];
        $stuCountry = $_POST['stuCountry'];
        $stuGrade = $_POST['stuGrade'];
        $stuSchool = $_POST['stuSchool'];
        $stuSPM = $_POST['stuSPM'];
        $filename = $_FILES["stuImg"]["name"];
        $stuPswd = $_POST['stuPswd'];
        $stuConfPswd = $_POST['stuConfPswd'];
        $flagRegister = FALSE;
        $flagRegister2 = FALSE;

        // Check if account exists or not
        $query2 = "SELECT * FROM student WHERE StudentEmail = '$stuEmail';";
        $results2 = mysqli_query($connection, $query2);
        $data2 = mysqli_fetch_assoc($results2);

        if (empty($data2)) {
            $flagRegister2 = TRUE;            
        } else {
            $flagRegister2 = FALSE; 
        }

        // Validation
        if (!$flagRegister2) {
?>
            <script>
                alert("This account has already been registered. Please use another email.");
            </script>
<?php
        } else if (!(str_contains($stuEmail, "@")) || !(str_ends_with($stuEmail, ".com"))) {
?>
            <script>
                alert("Your email address must contain both '@' and '.com' characters. Please fill in the correct details again!");
            </script>
<?php
        } else if ((preg_match("/[a-z]/i", $stuTelNo)) || (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $stuTelNo))) {
            
?>
            <script>
                alert("Your phone number must contain numbers only. Please fill in the correct details again!");
            </script>
<?php
        } else if ((preg_match('~[0-9]+~', $stuCountry)) || (preg_match('/[\'^£!.$%&*()}{@#~?><>,|=_+¬-]/', $stuCountry))) {
                
?>
            <script>
                alert("The country you entered should not have numbers or special characters. Please fill in the correct details again!");
            </script>                
<?php
        } else if (!((preg_match('~[0-9]+~', $stuPswd))) || !((preg_match('/[\'^£!.$%&*()}{@#~?><>,|=_+¬-]/', $stuPswd))) || 
        !((preg_match('/[A-Z]/i', $stuPswd))) || !((preg_match('/[a-z]/i', $stuPswd)))) {
                    
?>
            <script>
                alert("Your password does not meet the requirements. Please re-enter a new password!");
            </script>                        
<?php
        } else if ($stuPswd != $stuConfPswd) {
?>
                        
            <script>
                alert("Your password does not match with confirm password. Please re-enter your password again!");
            </script> 
<?php
        } else {
            $flagRegister = TRUE;
        }

        if ($flagRegister && $flagRegister2) {
            $newID = "STU_" . generateID();
            $newDate = date("Y-m-d");

            // If user uploaded an image
            if($filename != NULL) {
                // Upload image to folder
                $tempname = $_FILES["stuImg"]["tmp_name"];
                $folder = "./images/student/" . $filename;
                move_uploaded_file($tempname, $folder);
            } else {
                $filename = NULL;
            }
            
            $query = "INSERT INTO student VALUES ('$newID', '$stuEmail', '$stuName', '$stuTelNo', '$stuGender', 
            '$stuCountry', '$stuGrade', '$stuSchool', '$stuSPM', '$filename', '$stuPswd', '$newDate');";
            $results = mysqli_query($connection, $query);

            if ($results) {
?>
                <script>
                    alert("You have successfully registered a student account. Your details are saved in the database.");
                    if(confirm("Do you wish to log in your account?") == true) {
                        window.location = "login.php";
                    } else {
                        window.location = "index.php";
                    }
                </script>
<?php
            } else {
?>                
                <script>
                    alert("Sorry! Your account registration has failed; not saving any data in database. Please try again!");
                </script>
<?php            
            }
        }

    } else {
        $teaEmail = $_POST['teaEmail'];
        $teaName = $_POST['teaName'];
        $teaTelNo = $_POST['teaTelNo'];
        $teaGender = $_POST['teaGender'];
        $teaCountry = $_POST['teaCountry'];
        $teaTeachLvl = $_POST['teaTeachLvl'];
        $teaSchool = $_POST['teaSchool'];
        $teaRole = $_POST['teaRole'];
        $filename = $_FILES["teaImg"]["name"];
        $teaPswd = $_POST['teaPswd'];
        $teaConfPswd = $_POST['teaConfPswd'];
        $flagRegister = FALSE;
        $flagRegister2 = FALSE;

        // Check if account exists or not
        $query2 = "SELECT * FROM teacher WHERE TeacherEmail = '$teaEmail';";
        $results2 = mysqli_query($connection, $query2);
        $data2 = mysqli_fetch_assoc($results2);

        if (empty($data2)) {
            $flagRegister2 = TRUE;            
        } else {
            $flagRegister2 = FALSE; 
        }

        // Validation
        if (!$flagRegister2) {
?>
            <script>
                alert("This account has already been registered. Please use another email.");
            </script>
<?php
        } else if (!(str_contains($teaEmail, "@")) || !(str_ends_with($teaEmail, ".com"))) {
?>
            <script>
                alert("Your email address must contain both '@' and '.com' characters. Please fill in the correct details again!");
            </script>
<?php
        } else if ((preg_match("/[a-z]/i", $teaTelNo)) || (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $teaTelNo))) {
            
?>
            <script>
                alert("Your phone number must contain numbers only. Please fill in the correct details again!");
            </script>
<?php
        } else if ((preg_match('~[0-9]+~', $teaCountry)) || (preg_match('/[\'^£!.$%&*()}{@#~?><>,|=_+¬-]/', $teaCountry))) {
                
?>
            <script>
                alert("The country you entered should not have numbers or special characters. Please fill in the correct details again!");
            </script>                
<?php
        } else if (!((preg_match('~[0-9]+~', $teaPswd))) || !((preg_match('/[\'^£!.$%&*()}{@#~?><>,|=_+¬-]/', $teaPswd))) || 
        !((preg_match('/[A-Z]/i', $teaPswd))) || !((preg_match('/[a-z]/i', $teaPswd)))) {
                    
?>
            <script>
                alert("Your password does not meet the requirements. Please re-enter a new password!");
            </script>                        
<?php
        } else if ($teaPswd != $teaConfPswd) {
?>
                        
            <script>
                alert("Your password does not match with confirm password. Please re-enter your password again!");
            </script> 
<?php
        } else {
            $flagRegister = TRUE;
        }

        if ($flagRegister && $flagRegister2) {
            $newID = "TEA_" . generateID();
            $newDate = date("Y-m-d");

            // If user uploaded an image
            if($filename != NULL) {
                // Upload image to folder
                $tempname = $_FILES["teaImg"]["tmp_name"];
                $folder = "./images/teacher/" . $filename;
                move_uploaded_file($tempname, $folder);
            } else {
                $filename = NULL;
            }
            
            $query = "INSERT INTO teacher VALUES ('$newID', '$teaEmail', '$teaName', '$teaTelNo', '$teaGender', 
            '$teaCountry', '$teaTeachLvl', '$teaSchool', '$teaRole', '$filename', '$teaPswd', '$newDate');";
            $results = mysqli_query($connection, $query);

            if ($results) {
?>
                <script>
                    alert("You have successfully registered a teacher account. Your details are saved in the database.");
                    if(confirm("Do you wish to log in your account?") == true) {
                        window.location = "login.php";
                    } else {
                        window.location = "index.php";
                    }
                </script>
<?php
            } else {
?>                
                <script>
                    alert("Sorry! Your account registration has failed; not saving any data in database. Please try again!");
                </script>
<?php            
            }
        }
    }
?>
