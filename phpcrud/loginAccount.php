<?php
    session_start();
?>

<?php
    include 'DBconnection.php'; // Include the database connection

    if (isset($_POST['loginStudent'])) {
        $stuEmail = $_POST['stuEmail'];
        $stuPswd = $_POST['stuPswd'];

        $query = "SELECT StudentID FROM student WHERE StudentEmail = '$stuEmail' AND StudentPSWD = '$stuPswd';";
        $results = mysqli_query($connection, $query);

        $data = mysqli_fetch_assoc($results);

        if(empty($data)) {
?>
            <script>
                alert("Sorry! You have failed to log in the account because the account cannot be found in the database.");
                if(confirm("Do you want to register a new account?") == true) {
                    window.location = "accRegistration.php";
                } else {
                    window.location = "login.php";
                }
            </script>
<?php
        } else {
            $_SESSION['SES_StuID'] = $data['StudentID']; // create session variable for student ID
?> 
            <script>            
                alert("You have successfully logged in your student account. You will now be redirected to home page.");
                window.location = "homePage.php";
            </script>
<?php            
        }

    } else {
        $teaEmail = $_POST['teaEmail'];
        $teaPswd = $_POST['teaPswd'];

        $query = "SELECT TeacherID FROM teacher WHERE TeacherEmail = '$teaEmail' AND TeacherPSWD = '$teaPswd';";
        $results = mysqli_query($connection, $query);

        $data = mysqli_fetch_assoc($results);

        if(empty($data)) {
?>
            <script>
                alert("Sorry! You have failed to log in the account because the account cannot be found in the database.");
                if(confirm("Do you want to register a new account?") == true) {
                    window.location = "accRegistration.php";
                } else {
                    window.location = "login.php";
                }
            </script>
<?php
        } else {
            $_SESSION['SES_TeaID'] = $data['TeacherID']; // create session variable for student ID
?> 
            <script>            
                alert("You have successfully logged in your teacher account. You will now be redirected to home page.");
                window.location = "homePage.php";
            </script>
<?php            
        }
    } 
?>