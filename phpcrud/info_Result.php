<?php
    include 'DBconnection.php';
    
    if(isset($_SESSION['SES_StuID'])) { // Get student ID
        $refUserID = $_SESSION['SES_StuID'];
    } else if (isset($_SESSION['SES_TeaID'])) { // Get teacher ID
        $refUserID = $_SESSION['SES_TeaID'];
    } else { // Without login, referred as guest
        $refUserID = "Guest";
    }

    $query = "SELECT * FROM result WHERE AssmtCode = '$refAssmtCode' AND AttemptID = '$refAtmptID';";
    $results = mysqli_query($connection, $query);
    $data = mysqli_fetch_assoc($results);

    $resultID = $data['ResultID'];
    $totalMarks = $data['TotalMarks'];
    $markPercent = $data['MarkPercent'];
    $avgMark = $data['AvgMark'];
    $resultGrade = $data['ResultGrade'];
    $gradeAward = $data['GradeAward'];
    $gradeValue = $data['GradeValue'];
    $passStatus = $data['PassStatus'];
    $numQueCorr = $data['NumQueCorr'];
    $numQueIncorr = $data['NumQueIncorr'];
    $avgCorrect = $data['AvgCorrect'];
    $avgIncorrect = $data['AvgIncorrect'];
    $percentCorrect = $data['PercentCorrect'];
    $percentIncorrect = $data['PercentIncorrect'];
    $percentRatio = $data['PercentRatio'];
    $totalQueAns = $data['TotalQueAns'];
    $highestStreak = $data['HighestStreak'];
    $teacherFeedback = $data['TeacherFeedback'];
    $resultDate = $data['ResultDate'];

    // Format mark percentage
    if (str_ends_with($markPercent, '.00')) {
        $trimmedPercent = str_replace('.00', '', $markPercent);
        $formatMarkPercent = $trimmedPercent . "%";
    } else {
        $formatMarkPercent = $markPercent . "%";
    }

    // Format correct question percentage
    if (str_ends_with($percentCorrect, '.00')) {
        $trimmedPercent = str_replace('.00', '', $percentCorrect);
        $formatCorrectPercent = $trimmedPercent . "%";
    } else {
        $formatCorrectPercent = $percentCorrect . "%";
    }

    // Format incorrect question percentage
    if (str_ends_with($percentIncorrect, '.00')) {
        $trimmedPercent = str_replace('.00', '', $percentIncorrect);
        $formatIncorrectPercent = $trimmedPercent . "%";
    } else {
        $formatIncorrectPercent = $percentIncorrect . "%";
    }
?>

<?php
    // Get total number of marks of the assessment
    $query2 = "SELECT SUM(QueMark) AS TotalQueMarks FROM question WHERE AssmtCode = '$refAssmtCode';";
    $results2 = mysqli_query($connection, $query2);
    $data2 = mysqli_fetch_assoc($results2);

    $refTotalQMarks = $data2['TotalQueMarks'];
?>

<?php
    // Get user information; for report
    if(isset($_SESSION['SES_StuID'])) {
        $query3 = "SELECT * FROM student WHERE StudentID = '$refUserID';";
        $results3 = mysqli_query($connection, $query3);
        $data3 = mysqli_fetch_assoc($results3);

        $userRole = "Student";
        $userName = $data3['StudentName'];
        $userSchool = $data3['StudentSchool'];
        $userGrade = $data3['StudentGradeLvl'];
        $userSPM = $data3['StudentSPM'];
        $userImg = "./images/student/" . $data3['StudentImg'];
    } else if (isset($_SESSION['SES_TeaID'])) {
        $query4 = "SELECT * FROM teacher WHERE TeacherID = '$refUserID';";
        $results4 = mysqli_query($connection, $query4);
        $data4 = mysqli_fetch_assoc($results4);

        $userRole = "Teacher";
        $userName = $data4['TeacherName'];
        $userSchool = $data4['TeacherSchool'];
        $userTeachLvl = $data4['TeachingLvl'];
        $userTeachRole = $data4['TeacherRole'];
        $userImg = "./images/teacher/" . $data4['TeacherImg'];
    } else {
        
    }
?>

<?php
    // Get assessment info for report
    $query4 = "SELECT * FROM assessment WHERE AssmtCode = '$refAssmtCode';";

    $results4 = mysqli_query($connection, $query4);
    
    $data4 = mysqli_fetch_assoc($results4);

    $refAssmtName = $data4['AssmtName'];
    $refTeacherID = $data4['TeacherID'];
    $refAssmtGrade = $data4['AssmtGradeLvl'];
    $refAssmtChapter = $data4['AssmtChapter'];
    $refAssmtTopic = $data4['AssmtTopic'];
    $refAssmtDiff = $data4['AssmtDifficulty'];
?>

<?php
    // Get teacher name for report
    $query5 = "SELECT TeacherName FROM teacher WHERE TeacherID = '$refTeacherID';";

    $results5 = mysqli_query($connection, $query5);
    
    $data5 = mysqli_fetch_assoc($results5);

    $refTeacherName = $data5['TeacherName'];
?>

<?php
    // Get attempt date for report
    $query6 = "SELECT AtmptDate FROM attempt WHERE AttemptID = '$refAtmptID';";

    $results6 = mysqli_query($connection, $query6);
    
    $data6 = mysqli_fetch_assoc($results6);

    $refAtmptDate = $data6['AtmptDate'];
?>