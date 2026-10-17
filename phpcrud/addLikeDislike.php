<?php
    if(isset($_POST['addLike'])) {
        include "DBconnection.php";

        $refAssmtCode = $_GET['assmtcode'];
        
        $query = "SELECT LikeCount FROM assessment WHERE AssmtCode = '$refAssmtCode';";
    
        $results = mysqli_query($connection, $query);
    
        $data = mysqli_fetch_assoc($results);
        $currentLike = $data['LikeCount'];
        $newLike = $currentLike + 1;
        
        $query2 = "UPDATE assessment SET LikeCount = '$newLike' WHERE AssmtCode = '$refAssmtCode';";
    
        $results2 = mysqli_query($connection, $query2);
    
        if($results2 == TRUE) {
    ?>
            <script>
                alert("Thank you for liking this assessment! Your feedback is important!")
            </script>
    <?php        
        } else {
    ?>        
            <script>
                alert("Oops! Something went wrong! Please try again!")
            </script>
    <?php        
        }
    } else {
        include "DBconnection.php";

        $refAssmtCode = $_GET['assmtcode'];
        
        $query = "SELECT DislikeCount FROM assessment WHERE AssmtCode = '$refAssmtCode';";
    
        $results = mysqli_query($connection, $query);
    
        $data = mysqli_fetch_assoc($results);
        $currentDislike = $data['DislikeCount'];
        $newDislike = $currentDislike + 1;
        
        $query2 = "UPDATE assessment SET DislikeCount = '$newDislike' WHERE AssmtCode = '$refAssmtCode';";
    
        $results2 = mysqli_query($connection, $query2);

        if($results2 == TRUE) {
    ?>
            <script>
                alert("Sorry to hear your dislike on this assessment! Hope we can improve over time!")
            </script>
    <?php        
        } else {
    ?>        
            <script>
                alert("Oops! Something went wrong! Please try again!")
            </script>
    <?php        
        }
    }
?>