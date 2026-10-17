<?php
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
?>

<?php
    include 'DBconnection.php';

    // Fetch statistics info
    $query = "SELECT * FROM `statistics` WHERE StatID = '$refStatID';";
    $results = mysqli_query($connection, $query);
    $data = mysqli_fetch_assoc($results);

    $refAssmtCode = $data['AssmtCode'];
    $TotalAttempt = $data['TotalAtmpt'];
    $PassAttempts = $data['AtmptPass'];
    $FailAttempts = $data['AtmptFail'];
    $PassRate = $data['PassRate'];
    $FailRate = $data['FailRate'];
    $PassingStatus = $data['PassStatus'];
    $SumOfMarks = $data['SumMark'];
    $MeanOfMarks = $data['MeanMark'];
    $MostCorrectQue = $data['MostCorrQue'];
    $MostIncorrectQue = $data['MostInCorrQue'];
    $HighestMark = $data['HighMark'];
    $LowestMark = $data['LowMark'];
    $StatDate = $data['StatDate'];

    // Format pass rate percentage
    if (str_ends_with($PassRate, '.00')) {
        $trimmedPercent = str_replace('.00', '', $PassRate);
        $formatPassRate = $trimmedPercent . "%";
    } else {
        $formatPassRate = $PassRate . "%";
    }

    // Format fail rate percentage
    if (str_ends_with($FailRate, '.00')) {
        $trimmedPercent = str_replace('.00', '', $FailRate);
        $formatFailRate = $trimmedPercent . "%";
    } else {
        $formatFailRate = $FailRate . "%";
    }

    // Fetch assessment info
    $query2 = "SELECT * FROM assessment WHERE AssmtCode = '$refAssmtCode';";
    $results2 = mysqli_query($connection, $query2);
    $data2 = mysqli_fetch_assoc($results2);

    $AssmtName = $data2['AssmtName'];
    $refTeacherID = $data2['TeacherID'];
    $AssmtDate = $data2['AssmtRegDate'];
    $AssmtGrade = $data2['AssmtGradeLvl'];
    $AssmtChap = $data2['AssmtChapter'];
    $AssmtTopic = $data2['AssmtTopic'];
    $AssmtDiff = $data2['AssmtDifficulty'];
    $AssmtLike = $data2['LikeCount'];
    $AssmtDislike = $data2['DislikeCount'];

    // Get the total marks for the assessment
    $query3 = "SELECT SUM(QueMark) AS TotalMarks FROM question WHERE AssmtCode = '$refAssmtCode';";
    $results3= mysqli_query($connection, $query3);
    $data3 = mysqli_fetch_assoc($results3);
    $TotalMarks = $data3['TotalMarks'];

    // Get the total questions for the assessment
    $query4 = "SELECT COUNT(QuesID) AS TotalQuestions FROM question WHERE AssmtCode = '$refAssmtCode';";
    $results4 = mysqli_query($connection, $query4);
    $data4 = mysqli_fetch_assoc($results4);
    $TotalQuestions = $data4['TotalQuestions'];

    // Get the total grades based on the results
    $query5 = "SELECT COUNT(ResultID) AS NumofAPlus FROM result WHERE AssmtCode = '$refAssmtCode' AND ResultGrade = 'A+';";
    $results5 = mysqli_query($connection, $query5);
    $data5 = mysqli_fetch_assoc($results5);
    $NumofAPlus = $data5['NumofAPlus'];

    $query6 = "SELECT COUNT(ResultID) AS NumofA FROM result WHERE AssmtCode = '$refAssmtCode' AND ResultGrade = 'A';";
    $results6 = mysqli_query($connection, $query6);
    $data6 = mysqli_fetch_assoc($results6);
    $NumofA = $data6['NumofA'];

    $query7 = "SELECT COUNT(ResultID) AS NumofAMinus FROM result WHERE AssmtCode = '$refAssmtCode' AND ResultGrade = 'A-';";
    $results7 = mysqli_query($connection, $query7);
    $data7 = mysqli_fetch_assoc($results7);
    $NumofAMinus = $data7['NumofAMinus'];

    $query8 = "SELECT COUNT(ResultID) AS NumofBPlus FROM result WHERE AssmtCode = '$refAssmtCode' AND ResultGrade = 'B+';";
    $results8 = mysqli_query($connection, $query8);
    $data8 = mysqli_fetch_assoc($results8);
    $NumofBPlus = $data8['NumofBPlus'];
    
    $query9 = "SELECT COUNT(ResultID) AS NumofB FROM result WHERE AssmtCode = '$refAssmtCode' AND ResultGrade = 'B';";
    $results9 = mysqli_query($connection, $query9);
    $data9 = mysqli_fetch_assoc($results9);
    $NumofB = $data9['NumofB'];

    $query10 = "SELECT COUNT(ResultID) AS NumofCPlus FROM result WHERE AssmtCode = '$refAssmtCode' AND ResultGrade = 'C+';";
    $results10 = mysqli_query($connection, $query10);
    $data10 = mysqli_fetch_assoc($results10);
    $NumofCPlus = $data10['NumofCPlus'];

    $query11 = "SELECT COUNT(ResultID) AS NumofC FROM result WHERE AssmtCode = '$refAssmtCode' AND ResultGrade = 'C';";
    $results11 = mysqli_query($connection, $query11);
    $data11 = mysqli_fetch_assoc($results11);
    $NumofC = $data11['NumofC'];

    $query12 = "SELECT COUNT(ResultID) AS NumofD FROM result WHERE AssmtCode = '$refAssmtCode' AND ResultGrade = 'D';";
    $results12 = mysqli_query($connection, $query12);
    $data12 = mysqli_fetch_assoc($results12);
    $NumofD = $data12['NumofD'];

    $query13 = "SELECT COUNT(ResultID) AS NumofE FROM result WHERE AssmtCode = '$refAssmtCode' AND ResultGrade = 'E';";
    $results13 = mysqli_query($connection, $query13);
    $data13 = mysqli_fetch_assoc($results13);
    $NumofE = $data13['NumofE'];

    $query14 = "SELECT COUNT(ResultID) AS NumofG FROM result WHERE AssmtCode = '$refAssmtCode' AND ResultGrade = 'G';";
    $results14 = mysqli_query($connection, $query14);
    $data14 = mysqli_fetch_assoc($results14);
    $NumofG = $data14['NumofG'];

    // Get the total number of results
    $query15 = "SELECT COUNT(ResultID) AS TotalResults FROM result WHERE AssmtCode = '$refAssmtCode';";
    $results15 = mysqli_query($connection, $query15);
    $data15 = mysqli_fetch_assoc($results15);
    $TotalResults = $data15['TotalResults'];

    // Get the teacher's name
    $query16 = "SELECT TeacherName FROM teacher WHERE TeacherID = '$refTeacherID';";
    $results16 = mysqli_query($connection, $query16);
    $data16 = mysqli_fetch_assoc($results16);
    $TeacherName = $data16['TeacherName'];
?>