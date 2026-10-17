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
    function checkAnswer($inputAnswer, $correctAnswer, $mark) {
        // check if the given correct answer is set or not; as there are variety of answers in subjective
        if ($correctAnswer == NULL) { 
            $setMark = 0;
        } else {
            if ($inputAnswer == $correctAnswer) {
                $setMark = $mark;
            } else {
                $setMark = 0;
            }
        }
        return $setMark;
    }

    function InsertAnswer($getAnswer,$marks,$QuestionID) {
        include 'DBconnection.php';
        $refAssmtCode = $_GET['assmtcode'];
        $refAttemptID = $_GET['atmptID'];
        $answerID = "ANS_" . generateID();

        $query = "INSERT INTO answer (AnswerID, AttemptID, QuesID, AnswerContent, AnswerMark) 
                  VALUES ('$answerID', '$refAttemptID', '$QuestionID', '$getAnswer', '$marks');";

        $results = mysqli_query($connection, $query);
    }

    function updateNumQueCorr($quesID,$marks) {
        include 'DBconnection.php';

        if ($marks != 0) { // if answer is correct, update number of correctly answered toll
            $query = "SELECT QueNumAnsCorr FROM question WHERE QuesID = '$quesID';";
        
            $results = mysqli_query($connection, $query);
        
            $data = mysqli_fetch_assoc($results);
            $currentCorr = $data['QueNumAnsCorr'];
            $newCount = $currentCorr + 1;
            
            $query2 = "UPDATE question SET QueNumAnsCorr = '$newCount' WHERE QuesID = '$quesID';";
        
            $results2 = mysqli_query($connection, $query2);

        } else { // otherwise, update number of incorrectly answered toll
            $query3 = "SELECT QueNumAnsInCorr FROM question WHERE QuesID = '$quesID';";
        
            $results3 = mysqli_query($connection, $query3);
        
            $data3 = mysqli_fetch_assoc($results3);
            $currentIncorr = $data3['QueNumAnsInCorr'];
            $newCount = $currentIncorr + 1;
            
            $query4 = "UPDATE question SET QueNumAnsInCorr = '$newCount' WHERE QuesID = '$quesID';";
        
            $results4 = mysqli_query($connection, $query4);
        }
    }
?>