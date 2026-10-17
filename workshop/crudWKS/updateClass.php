<?php
    include 'DBconnection.php';

    $updateName = $_POST['ClassName'];
    $updateDesc = $_POST['ClassDesc'];
    $updateStatus = $_POST['ClassStatus'];

    $query = "UPDATE class SET ClassName = '$updateName', ClassDesc = '$updateDesc', ClassStatus = '$updateStatus' WHERE ClassID = '$refClassID';";
    $results = mysqli_query($connection, $query);

    if ($results) {
?>
        <script>
            alert("You have successfully edited your class info. Please check if your class details are updated or not.");
            history.back();
        </script>
<?php
    } else {
?>
        <script>
            alert("Sorry! You have failed to edit your class info. Please try again.");
            history.back();
        </script>
<?php        
    }
?>