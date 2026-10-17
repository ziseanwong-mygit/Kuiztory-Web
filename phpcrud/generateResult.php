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
    // Set attempt status to complete
    include 'DBconnection.php';
    $refAtmptID = $_GET['atmptID'];

    $query7 = "UPDATE attempt SET AtmptStatus = 'Completed' WHERE AttemptID = '$refAtmptID';";
    $results7 = mysqli_query($connection, $query7);
?>
    
<?php
    $NewResultID = "RES_" . generateID();
    $newDate = date("Y-m-d");
    $refAssmtCode = $_GET['assmtcode'];
    $refHighStreak = $_GET['highstreak'];

    // Get total marks earned by user
    $query = "SELECT SUM(AnswerMark) AS TotalMarks FROM answer WHERE AttemptID = '$refAtmptID';";
    $results = mysqli_query($connection, $query);
    $data = mysqli_fetch_assoc($results);
    $totalMarks = $data['TotalMarks'];

    // Get the total marks for the assessment
    $query2 = "SELECT SUM(QueMark) AS TotalQMarks FROM question WHERE AssmtCode = '$refAssmtCode';";
    $results2 = mysqli_query($connection, $query2);
    $data2 = mysqli_fetch_assoc($results2);
    $totalQMarks = $data2['TotalQMarks'];

    // Calculate average marks in two decimal places
    $avgMark = $totalMarks / $totalQMarks;
    $formatAvgMark = number_format((float)$avgMark, 2, ".", "");
    
    // Calculate percentage of total marks
    $percentMark = $formatAvgMark * 100;
    if (str_contains($percentMark, ".")) {
        $formatPercentMark = number_format((float)$percentMark, 2, ".", "");
    } else {
        $formatPercentMark = $percentMark;
    }

    // Set the result grade, award title, grade value and pass status based on the mark percentage and SPM grading system
    if ($percentMark >= 90 && $percentMark <= 100) {
        $grade = "A+";
        $award = "Highest Distinction";
        $value = 0;
        $status = "Passed";
    } else if ($percentMark >= 80 && $percentMark <= 89) {
        $grade = "A";
        $award = "High Distinction";
        $value = 1;
        $status = "Passed";
    } else if ($percentMark >= 70 && $percentMark <= 79) {
        $grade = "A-";
        $award = "Distinction";
        $value = 2;
        $status = "Passed";
    } else if ($percentMark >= 65 && $percentMark <= 69) {
        $grade = "B+";
        $award = "Highest Credit";
        $value = 3;
        $status = "Passed";
    } else if ($percentMark >= 60 && $percentMark <= 64) {
        $grade = "B";
        $award = "High Credit";
        $value = 4;
        $status = "Passed";
    } else if ($percentMark >= 55 && $percentMark <= 59) {
        $grade = "C+";
        $award = "Upper Credit";
        $value = 5;
        $status = "Passed";
    } else if ($percentMark >= 50 && $percentMark <= 54) {
        $grade = "C";
        $award = "Credit";
        $value = 6;
        $status = "Passed";
    } else if ($percentMark >= 45 && $percentMark <= 49) {
        $grade = "D";
        $award = "Upper Pass";
        $value = 7;
        $status = "Passed";
    } else if ($percentMark >= 40 && $percentMark <= 44) {
        $grade = "E";
        $award = "Pass";
        $value = 8;
        $status = "Passed";
    } else if ($percentMark >= 0 && $percentMark <= 39) {
        $grade = "G";
        $award = "Fail";
        $value = 9;  
        $status = "Failed";
    } else { // If marks are out of range
        $grade = "NA";
        $award = "NA";
        $value = "NA";
    }

    // Get number of correct and incorrect questions answered by user
    $query3 = "SELECT NumCorrect, NumIncorrect FROM attempt WHERE AttemptID = '$refAtmptID';";
    $results3 = mysqli_query($connection, $query3);
    $data3 = mysqli_fetch_assoc($results3);
    $numCorrectQ = $data3['NumCorrect'];
    $numIncorrectQ = $data3['NumIncorrect'];

    // Get the total number of questions
    $query4 = "SELECT COUNT(QuesID) AS TotalQuestions FROM question WHERE AssmtCode = '$refAssmtCode';";
    $results4 = mysqli_query($connection, $query4);
    $data4 = mysqli_fetch_assoc($results4);
    $totalQuestions = $data4['TotalQuestions'];

    // Calculate average of correct and incorrect questions
    $avgCorrect = $numCorrectQ / $totalQuestions;
    $formatAvgCorrect = number_format((float)$avgCorrect, 2, ".", "");
    $avgIncorrect = $numIncorrectQ / $totalQuestions;
    $formatAvgIncorrect = number_format((float)$avgIncorrect, 2, ".", "");
    
    // Calculate percentage of correct and incorrect questions
    $percentCorrect = $formatAvgCorrect * 100;
    if (str_contains($percentCorrect, ".")) {
        $formatPercentCorrect = number_format((float)$percentCorrect, 2, ".", "");
    } else {
        $formatPercentCorrect = $percentCorrect;
    }
    $percentIncorrect = $formatAvgIncorrect * 100;
    if (str_contains($percentIncorrect, ".")) {
        $formatPercentIncorrect = number_format((float)$percentIncorrect, 2, ".", "");
    } else {
        $formatPercentIncorrect = $percentIncorrect;
    }

    // Calculate the ratio of percentage between correct and incorrect questions
    function GCD($a, $b) { // Get the greatest common divisor for ratio
        $smallVal = min($a, $b);
        $gcd = 1;
    
        for ($i = 1; $i <= $smallVal; $i++) {
            if ($a % $i === 0 && $b % $i === 0) {
                $gcd = $i;
            }
        }
    
        return $gcd;
    }
    $gcdPercent = GCD($formatPercentCorrect, $formatPercentIncorrect);
    $ratioCorrect = $formatPercentCorrect / $gcdPercent;
    $ratioIncorrect = $formatPercentIncorrect / $gcdPercent;
    $fullRatio = $ratioCorrect . ":" . $ratioIncorrect;

    // Get total number of questions answered by user
    $query5 = "SELECT COUNT(AnswerID) AS TotalAnswered FROM answer WHERE AttemptID = '$refAtmptID';";
    $results5 = mysqli_query($connection, $query5);
    $data5 = mysqli_fetch_assoc($results5);
    $totalQAnswered = $data5['TotalAnswered'];

    // Start inserting result data into database
    $query6 = "INSERT INTO result (ResultID, AssmtCode, AttemptID, TotalMarks, MarkPercent, AvgMark, ResultGrade, 
    GradeAward, GradeValue, PassStatus, NumQueCorr, NumQueIncorr, AvgCorrect, AvgIncorrect, PercentCorrect, 
    PercentIncorrect, PercentRatio, TotalQueAns, HighestStreak, TeacherFeedback, ResultDate) 
    VALUES ('$NewResultID', '$refAssmtCode', '$refAtmptID', '$totalMarks', '$formatPercentMark', '$formatAvgMark', 
    '$grade', '$award', '$value', '$status', '$numCorrectQ', '$numIncorrectQ', '$formatAvgCorrect', 
    '$formatAvgIncorrect', '$formatPercentCorrect', '$formatPercentIncorrect', '$fullRatio', '$totalQAnswered', 
    '$refHighStreak', 'No feedback given', '$newDate');";
    $results6 = mysqli_query($connection, $query6);
?>