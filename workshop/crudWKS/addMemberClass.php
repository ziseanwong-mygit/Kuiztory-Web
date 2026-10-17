<?php
    include 'DBconnection.php';
    $StuRef = $_GET['stuid'];
    $ClassRef = $_GET['classid'];
    $newDate = date("Y-m-d");
        
    $query = "SELECT * FROM enrollment WHERE StudentID = '$StuRef' AND ClassID = '$ClassRef';";
    $results = mysqli_query($connection, $query);
    $data = mysqli_fetch_assoc($results);

    $query2 = "SELECT StudentName FROM student WHERE StudentID = '$StuRef';";
    $results2 = mysqli_query($connection, $query2);
    $data2 = mysqli_fetch_assoc($results2);

    if (!(empty($data3))) {
?>
        <script>
            alert("The student: <?php echo $data2['StudentName'];?> has already enrolled in this class.")
        </script>
<?php
    } else {
        $query3 = "INSERT INTO enrollment (StudentID, ClassID, EnrollDate) VALUES 
        ('$StuRef', '$ClassRef', '$newDate');";
        $results3 = mysqli_query($connection, $query3);

        if ($results3) {
?>
            <script>
                alert("You have successfully added the student: <?php echo $data2['StudentName'];?> into your class.");
                window.location = "../addMember.php?classid=<?php echo $ClassRef?>";
            </script>
<?php
        } else {
?>
            <script>
                alert("Sorry! You have failed to add a student into your class. Please try again!");
                window.location = "../addMember.php?classid=<?php echo $ClassRef?>";
            </script>
<?php
        }
    }
?>