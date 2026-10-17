<?php
    session_start();
?>

<?php
    include 'DBconnection.php';

    $refClassID = $_GET['ClassID'];
    $refStuID = $_SESSION['SES_StuID'];

    $query = "DELETE FROM enrollment WHERE StudentID = '$refStuID' AND ClassID = '$refClassID';";
    $results = mysqli_query($connection, $query);

    if($results) {
?>
        <script>
            alert("You have successfully unenroll this class!");
            location.href="../viewJoinClass.php";
        </script>
<?php
    } else {
?>
        <script>
            alert("Oh no! Something unexpected happened! You have failed to unenroll this class.")
            location.href="../viewJoinClass.php";
        </script>
<?php
    }
?>