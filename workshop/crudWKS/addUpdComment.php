<?php
    include 'DBconnection.php';
    $comment = $_POST['commentInput'];

    $query = "UPDATE result SET TeacherFeedback = '$comment' WHERE ResultID = '$refResultID';";
    $results = mysqli_query($connection, $query);

    if($results) {
?>
        <script>
            alert("You have successfully added or updated a comment in the result. Please check the comment in the result record.");
            window.location = "viewReport.php?assmtcode=<?php echo $refAssmtCode?>";
        </script>
<?php        
    } else {
?>
        <script>
            alert("Sorry! You have failed to add or update a comment in the result. Please try again!");
            window.location = "viewReport.php?assmtcode=<?php echo $refAssmtCode?>";
        </script>
<?php
    }
?>