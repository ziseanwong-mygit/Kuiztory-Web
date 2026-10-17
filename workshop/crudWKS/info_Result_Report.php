<?php
    include 'DBconnection.php';

    $query = "SELECT * FROM result WHERE ResultID = '$refResultID';";
    $results = mysqli_query($connection, $query);
    $data = mysqli_fetch_assoc($results);

    $AssmtCode = $data['AssmtCode'];
    $AttemptID = $data['AttemptID'];
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

    // Get total number of marks of the assessment
    $query2 = "SELECT SUM(QueMark) AS TotalQueMarks FROM question WHERE AssmtCode = '$AssmtCode';";
    $results2 = mysqli_query($connection, $query2);
    $data2 = mysqli_fetch_assoc($results2);
    $refTotalQMarks = $data2['TotalQueMarks'];
?>

<?php
    $query3 = "SELECT StudentID, TeacherID FROM attempt WHERE AttemptID = '$AttemptID';";
    $results3 = mysqli_query($connection, $query3);
    $data3 = mysqli_fetch_assoc($results3);

    if($data3['StudentID'] != NULL) {
        $UserID = $data3['StudentID'];

        $query4 = "SELECT * FROM student WHERE StudentID = '$UserID';";
        $results4 = mysqli_query($connection, $query4);
        $data4 = mysqli_fetch_assoc($results4);

        $userRole = "Student";
        $userName = $data4['StudentName'];
        $userSchool = $data4['StudentSchool'];
        $userGrade = $data4['StudentGradeLvl'];
        $userSPM = $data4['StudentSPM'];
        $userImg = "../images/student/" . $data4['StudentImg'];

    } else if ($data3['TeacherID'] != NULL) {
        $UserID = $data3['TeacherID'];

        $query5 = "SELECT * FROM teacher WHERE TeacherID = '$UserID';";
        $results5 = mysqli_query($connection, $query5);
        $data5 = mysqli_fetch_assoc($results5);

        $userRole = "Teacher";
        $userName = $data5['TeacherName'];
        $userSchool = $data5['TeacherSchool'];
        $userTeachLvl = $data5['TeachingLvl'];
        $userTeachRole = $data5['TeacherRole'];
        $userImg = "../images/teacher/" . $data5['TeacherImg'];

    } else {
        
    }
?>

<?php
    // Get assessment info for report
    $query6 = "SELECT * FROM assessment WHERE AssmtCode = '$AssmtCode';";

    $results6 = mysqli_query($connection, $query6);
    
    $data6 = mysqli_fetch_assoc($results6);

    $refAssmtName = $data6['AssmtName'];
    $refTeacherID = $data6['TeacherID'];
    $refAssmtGrade = $data6['AssmtGradeLvl'];
    $refAssmtChapter = $data6['AssmtChapter'];
    $refAssmtTopic = $data6['AssmtTopic'];
    $refAssmtDiff = $data6['AssmtDifficulty'];
?>

<?php
    // Get teacher name for report
    $query7 = "SELECT TeacherName FROM teacher WHERE TeacherID = '$refTeacherID';";

    $results7 = mysqli_query($connection, $query7);
    
    $data7 = mysqli_fetch_assoc($results7);

    $refTeacherName = $data7['TeacherName'];
?>

<?php
    // Get attempt date for report
    $query8 = "SELECT AtmptDate FROM attempt WHERE AttemptID = '$AttemptID';";

    $results8 = mysqli_query($connection, $query8);
    
    $data8 = mysqli_fetch_assoc($results8);

    $refAtmptDate = $data8['AtmptDate'];
?>
