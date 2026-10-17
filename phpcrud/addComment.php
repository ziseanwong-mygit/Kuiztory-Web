<?php
    function generateID($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
    
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
    
        return $randomString;
    }
?>

<?php
    include 'DBconnection.php';
    $refAssmtCode = $_GET['assmtcode'];
    $getComment = $_POST['commentInp'];
    $commentDate = date("Y-m-d");
    $commentID = "COMT_" . generateID();

    if(isset($_SESSION['SES_StuID'])) {
        $refUserID = $_SESSION['SES_StuID'];
        $query = "INSERT INTO comment (CommentID, AssmtCode, StudentID, TeacherID, ComtContent, ComDate) VALUES
              ('$commentID','$refAssmtCode','$refUserID', NULL, '$getComment','$commentDate');";
    } else {
        $refUserID = $_SESSION['SES_TeaID'];
        $query = "INSERT INTO comment (CommentID, AssmtCode, StudentID, TeacherID, ComtContent, ComDate) VALUES
              ('$commentID','$refAssmtCode', NULL, '$refUserID', '$getComment','$commentDate');";
    }

    $results = mysqli_query($connection, $query);

    if($results) {
?>
        <script>
            alert("You have successfully commented on this assessment! You should be able to view your comment.")
        </script>
<?php        
    }          
?>