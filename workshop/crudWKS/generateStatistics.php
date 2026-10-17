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

    $newID = "STAT_" . generateID();
    $newDate = date("Y-m-d");

    // Get total attempts
    $query = "SELECT COUNT(AttemptID) AS TotalAttempts FROM attempt WHERE AssmtCode = '$refAssmtCode';";
    $results = mysqli_query($connection, $query);
    $data = mysqli_fetch_assoc($results);
    $TotalAttempts = $data['TotalAttempts'];

    // Get total passed attempts
    $query2 = "SELECT COUNT(PassStatus) AS PassAttempts FROM result WHERE AssmtCode = '$refAssmtCode' AND PassStatus = 'Passed';";
    $results2 = mysqli_query($connection, $query2);
    $data2 = mysqli_fetch_assoc($results2);
    $PassAttempts = $data2['PassAttempts'];

    // Get total failed attempts
    $query3 = "SELECT COUNT(PassStatus) AS FailAttempts FROM result WHERE AssmtCode = '$refAssmtCode' AND PassStatus = 'Failed';";
    $results3 = mysqli_query($connection, $query3);
    $data3 = mysqli_fetch_assoc($results3);
    $FailAttempts = $data3['FailAttempts'];

    // Calculate the pass rate
    $PassRate = ($PassAttempts / $TotalAttempts) * 100;
    if (str_contains($PassRate, ".")) {
        $formatPassRate = number_format((float)$PassRate, 2, ".", "");
    } else {
        $formatPassRate = $PassRate;
    }

    // Calculate the pass rate
    $FailRate = ($FailAttempts / $TotalAttempts) * 100;
    if (str_contains($FailRate, ".")) {
        $formatFailRate = number_format((float)$FailRate, 2, ".", "");
    } else {
        $formatFailRate = $FailRate;
    }

    // Get the passing status
    if ($formatPassRate >= $formatFailRate) {
        $PassStatus = "Successful";
    } else {
        $PassStatus = "Unsuccessful";
    }

    // Get the sum of all result marks
    $query4 = "SELECT SUM(TotalMarks) AS SumMarks FROM result WHERE AssmtCode = '$refAssmtCode';";
    $results4 = mysqli_query($connection, $query4);
    $data4 = mysqli_fetch_assoc($results4);
    $SumMark = $data4['SumMarks'];

    // Calculate the mean of all result marks
    $query5 = "SELECT COUNT(ResultID) AS NumofResult FROM result WHERE AssmtCode = '$refAssmtCode';";
    $results5 = mysqli_query($connection, $query5);
    $data5 = mysqli_fetch_assoc($results5);
    $NumofResult = $data5['NumofResult'];
    $MeanMark = $SumMark / $NumofResult;
    $formatMeanMark = number_format((float)$MeanMark, 2, ".", "");

    // Get the most correct question of the assessment
    $query6 = "SELECT MAX(QueNumAnsCorr) AS HighQueCorr FROM question WHERE AssmtCode = '$refAssmtCode';";
    $results6 = mysqli_query($connection, $query6);
    $data6 = mysqli_fetch_assoc($results6);
    $MostCorrQue = $data6['HighQueCorr'];

    // Get the most incorrect question of the assessment
    $query7 = "SELECT MAX(QueNumAnsInCorr) AS HighQueIncorr FROM question WHERE AssmtCode = '$refAssmtCode';";
    $results7 = mysqli_query($connection, $query7);
    $data7 = mysqli_fetch_assoc($results7);
    $MostIncorrQue = $data7['HighQueIncorr'];

    // Get the highest mark among all results
    $query8 = "SELECT MAX(TotalMarks) AS HighMarks FROM result WHERE AssmtCode = '$refAssmtCode';";
    $results8 = mysqli_query($connection, $query8);
    $data8 = mysqli_fetch_assoc($results8);
    $HighestMark = $data8['HighMarks'];

    // Get the lowest mark among all results
    $query9 = "SELECT MIN(TotalMarks) AS LowMarks FROM result WHERE AssmtCode = '$refAssmtCode';";
    $results9 = mysqli_query($connection, $query9);
    $data9 = mysqli_fetch_assoc($results9);
    $LowestMark = $data9['LowMarks'];

    $query10 = "INSERT INTO `statistics` (StatID, AssmtCode, TotalAtmpt, AtmptPass, AtmptFail, PassRate, FailRate, 
    PassStatus, SumMark, MeanMark, MostCorrQue, MostInCorrQue, HighMark, LowMark, StatDate) 
    VALUES ('$newID', '$refAssmtCode', '$TotalAttempts', '$PassAttempts', '$FailAttempts', '$formatPassRate', 
    '$formatFailRate', '$PassStatus', '$SumMark', '$formatMeanMark', '$MostCorrQue', '$MostIncorrQue', 
    '$HighestMark', '$LowestMark', '$newDate');";
    $results10 = mysqli_query($connection, $query10);

    if($results10) {
?>
        <script>
            alert("A statistics record has been successfully generated and stored into the database. Please view the latest record.");
            window.location = "../viewStatistics.php?assmtcode=<?php echo $refAssmtCode?>";
        </script>
<?php
    } else {
?>
        <script>
            alert("Sorry! A statistics record cannot be generated due to unexpected failure in the query or database. Please try again!");
            window.location = "../viewStatistics.php?assmtcode=<?php echo $refAssmtCode?>";
        </script>
<?php
    }
?>