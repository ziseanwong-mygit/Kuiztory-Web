<?php
    include 'DBconnection.php';
    $StudentID = $_GET['stuid'];
    $ClassID = $_GET['classid'];

    $query = "DELETE FROM enrollment WHERE StudentID = '$StudentID' AND ClassID = '$ClassID';";
    $results = mysqli_query($connection, $query);

    if ($results) {
        $query2 = "SELECT StudentName FROM student WHERE StudentID = '$StudentID';";
        $results2 = mysqli_query($connection, $query2);
        $data2 = mysqli_fetch_assoc($results2);
?>
        <script>
            alert("You have successfully removed student: <?php echo $data2['StudentName'];?> from your class");
            window.location = "../manageMembers.php?classid=<?php echo $ClassID?>";
        </script>
<?php
    } else {
?>
        <script>
            alert("Sorry! You have failed to remove the student from your class. Please try again.");
            window.location = "../manageMembers.php?classid=<?php echo $ClassID?>";
        </script>
<?php
    }
?>