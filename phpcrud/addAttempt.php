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
    $atmptDate = date("Y-m-d");
    $attemptID = "ATMPT_" . generateID();
    $atmptStatus = "Incomplete";
    
    if(isset($_SESSION['SES_StuID'])) {
        $refUserID = $_SESSION['SES_StuID'];
        $query = "INSERT INTO attempt (AttemptID, AssmtCode, StudentID, TeacherID, AtmptDate, AtmptStatus, NumCorrect, NumIncorrect) VALUES 
                                       ('$attemptID','$refAssmtCode','$refUserID', NULL, '$atmptDate', '$atmptStatus', 0, 0);";
    } else if(isset($_SESSION['SES_TeaID'])) {
        $refUserID = $_SESSION['SES_TeaID'];
        $query = "INSERT INTO attempt (AttemptID, AssmtCode, StudentID, TeacherID, AtmptDate, AtmptStatus, NumCorrect, NumIncorrect) VALUES 
                                       ('$attemptID','$refAssmtCode', NULL, '$refUserID', '$atmptDate', '$atmptStatus', 0, 0);";
    } else {
        $query = "INSERT INTO attempt (AttemptID, AssmtCode, StudentID, TeacherID, AtmptDate, AtmptStatus, NumCorrect, NumIncorrect) VALUES 
                                       ('$attemptID','$refAssmtCode', NULL, NULL, '$atmptDate', '$atmptStatus', 0, 0);";
    }
    
    $results = mysqli_query($connection, $query);
?>