<?php
    include 'DBconnection.php';
    
    $refAssmtCode = $_GET['assmtcode'];
    $refQuesNo = $_GET['quesno'];

    $query = "SELECT * FROM question WHERE AssmtCode = '$refAssmtCode' AND QueNum = '$refQuesNo';";

    $results = mysqli_query($connection, $query);

    $data = mysqli_fetch_assoc($results);

    $refQueID = $data['QuesID'];
    $refQueNum = $data['QueNum'];
    $refQuestion = $data['QueContent'];
    $refQueDesc = $data['QueDesc'];
    $refQueType = $data['QueType'];
    $refQueImg = $data['QueImg'];
    $refQueMark = $data['QueMark'];
    $refQueAnswer = $data['QueAnswer'];
    $refQueNumAnsCorr = $data['QueNumAnsCorr'];
    $refQueNumAnsInCorr = $data['QueNumAnsInCorr'];
    
    // If fill-in-the-blank, get number of blanks for filling answer
    if($refQueType == "Fill-in-the-blank") {
        $query3 = "SELECT (CHAR_LENGTH(QueAnswer) - CHAR_LENGTH(REPLACE(QueAnswer, ',', '')) + 1) as numOfAns
                   FROM question WHERE QuesID = '$refQueID';";
        
        $results3 = mysqli_query($connection, $query3);

        $data3 = mysqli_fetch_assoc($results3);

        $numBlanks =  $data3['numOfAns'];
    }
?>    