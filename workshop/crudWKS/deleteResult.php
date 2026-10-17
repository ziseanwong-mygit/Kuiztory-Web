<?php
    include 'DBconnection.php';
    $refResultID = $_GET['resultid'];

    $query = "DELETE FROM result WHERE ResultID = '$refResultID';";
    $results = mysqli_query($connection, $query);
    
    if ($results) {
?>
        <script>
            alert("You have successfully deleted a result from the database.");
            history.back();
        </script>
<?php
    } else {
?>
        <script>
            alert("Sorry! You have failed to delete a result from the database. Please try again!");
            history.back();
        </script>
<?php
    }
?>