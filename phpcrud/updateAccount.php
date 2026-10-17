<?php
    include 'DBconnection.php';

    if(isset($_SESSION['SES_StuID'])) {
        $results2 = FALSE;

        $refID = $_SESSION['SES_StuID'];
        $email = $_POST['accEmail'];
        $name = $_POST['accName'];
        $telno = $_POST['accTelNo'];
        $gender = $_POST['accGender'];
        $country = $_POST['accCountry'];
        $grade = $_POST['accGradeLvl'];
        $school = $_POST['accSchool'];
        $spm = $_POST['accSPM'];
        $filename = $_FILES["accImg"]["name"];
        $password = $_POST['accPswd'];

        $query = "UPDATE student SET StudentEmail='$email', StudentName='$name', StudentTelNo='$telno', 
                  StudentGender='$gender', StudentCountry='$country', StudentGradeLvl='$grade', 
                  StudentSchool='$school', StudentSPM='$spm', StudentPSWD='$password' WHERE StudentID='$refID';";

        $results = mysqli_query($connection, $query);

        if ($filename != NULL) {
            $oldImgName = $getImgName;

            $tempname = $_FILES["accImg"]["tmp_name"];
            $folder = "./images/student/" . $filename;

            $query2 = "UPDATE student SET StudentImg='$filename' WHERE StudentID='$refID';";

            $results2 = mysqli_query($connection, $query2);

            if($results2) {
                unlink("./images/student/" . $oldImgName);
                move_uploaded_file($tempname, $folder);
            }
        }

        if ($results && $results2) {
    ?>
        <script>
            alert("You have successfully updated your account info! Your profile image has also been replaced with new one. Please check your account.");
            window.location = "studentDashboard.php";
        </script>
    <?php
        } else if ($results) {
    ?>
        <script>
            alert("You have successfully updated your account info! Please check your account.");
            window.location = "studentDashboard.php";
        </script>
    <?php
        } else {
    ?>
        <script>
            alert("Oh no! Your updating account process has failed! Please try again.");
            window.location = "studentDashboard.php";
        </script>
    <?php
        }

    } else {
        $results2 = FALSE;

        $refID = $_SESSION['SES_TeaID'];
        $email = $_POST['accEmail'];
        $name = $_POST['accName'];
        $telno = $_POST['accTelNo'];
        $gender = $_POST['accGender'];
        $country = $_POST['accCountry'];
        $grade = $_POST['accGradeLvl'];
        $school = $_POST['accSchool'];
        $role = $_POST['accTeachRole'];
        $filename = $_FILES["accImg"]["name"];
        $password = $_POST['accPswd'];

        $query = "UPDATE teacher SET TeacherEmail='$email', TeacherName='$name', TeacherTelNo='$telno', 
                  TeacherGender='$gender', TeacherCountry='$country', TeachingLvl='$grade', 
                  TeacherSchool='$school', TeacherRole='$role', TeacherPSWD='$password' WHERE TeacherID='$refID';";

        $results = mysqli_query($connection, $query);

        if ($filename != NULL) {
            $oldImgName = $getImgName;

            $tempname = $_FILES["accImg"]["tmp_name"];
            $folder = "./images/teacher/" . $filename;

            $query2 = "UPDATE teacher SET TeacherImg='$filename' WHERE TeacherID='$refID';";

            $results2 = mysqli_query($connection, $query2);

            if($results2) {
                unlink("./images/teacher/" . $oldImgName);
                move_uploaded_file($tempname, $folder);
            }
        } 
        
        if ($results && $results2) {
?>
            <script>
                alert("You have successfully updated your account info! Your profile image has also been replaced with new one. Please check your account.");
                window.location = "teacherDashboard.php";
            </script>
    <?php
        } else if ($results) {
    ?>
            <script>
                alert("You have successfully updated your account info! Please check your account.");
                window.location = "teacherDashboard.php";
            </script>
    <?php
        } else {
    ?>
            <script>
                alert("Oh no! Your updating account process has failed! Please try again.");
                window.location = "teacherDashboard.php";
            </script>
<?php
        }
    }
?>