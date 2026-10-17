<?php
    include 'DBconnection.php';
    $refStatID = $_GET['statid'];

    $query = "DELETE FROM `statistics` WHERE StatID = '$refStatID';";
    $results = mysqli_query($connection, $query);
    
    if ($results) {
?>
        <script>
            alert("You have successfully deleted a statistics from the database.");
            history.back();
        </script>
<?php
    } else {
?>
        <script>
            alert("Sorry! You have failed to delete a statistics from the database. Please try again!");
            history.back();
        </script>
<?php
    }
?>