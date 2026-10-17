<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./images/Kuiztory_logo_trans.png">
    <title>Kuiztory - View Past Results</title>
    <link rel="stylesheet" href="./styles/viewResult.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <!-- Header -->
    <?php 
        if(isset($_SESSION['SES_StuID']) || isset($_SESSION['SES_TeaID'])) {
            include "header2.php";
        } else {
            include "header.php";
        }
    ?>

    <h1 class="title">View Past Results</h1>
    <p class="description">You can view the list of past results and reports in the table below.</p>

    <section class="table-container">
        <table>
            <tr>
                <th>Result ID</th>
                <th>Result Date</th>
                <th>Assessment Name</th>
                <th>Total Marks</th>
                <th>Mark Percentage</th>
                <th>Grade</th>
                <th>Award</th>
                <th>Passing Status</th>
                <th>Teacher Feedback</th>
                <th>Action</th>
            </tr>
            <?php
                include './phpcrud/DBconnection.php';
                if(isset($_SESSION['SES_StuID'])) { // For student
                    $refStuID = $_SESSION['SES_StuID'];

                    $query = "SELECT AttemptID FROM attempt WHERE StudentID = '$refStuID';";
                    $results = mysqli_query($connection, $query);
                    while($data = mysqli_fetch_assoc($results)) {
                        $refAtmptID = $data['AttemptID'];

                        $query2 = "SELECT * FROM result WHERE AttemptID = '$refAtmptID';";
                        $results2 = mysqli_query($connection, $query2);
                        $data2 = mysqli_fetch_assoc($results2);

                        $ResultID = $data2['ResultID'];
                        $AssmtCode = $data2['AssmtCode'];
                        $ResultDate = $data2['ResultDate'];
                        $TotalMarks = $data2['TotalMarks'];
                        $MarkPercent = $data2['MarkPercent'];
                        $ResultGrade = $data2['ResultGrade'];
                        $GradeAward = $data2['GradeAward'];
                        $PassStatus = $data2['PassStatus'];
                        $TeacherFeedback = $data2['TeacherFeedback'];

                        // Format mark percentage
                        if (str_ends_with($MarkPercent, '.00')) {
                            $trimmedPercent = str_replace('.00', '', $MarkPercent);
                            $formatMarkPercent = $trimmedPercent . "%";
                        } else {
                            $formatMarkPercent = $MarkPercent . "%";
                        }

                        $query3 = "SELECT * FROM assessment WHERE AssmtCode = '$AssmtCode';";
                        $results3 = mysqli_query($connection, $query3);
                        $data3  = mysqli_fetch_assoc($results3);
                        $AssmtName = $data3['AssmtName'];

            ?>
                    <tr>
                        <td><?php echo $ResultID;?></td>
                        <td><?php echo $ResultDate;?></td>
                        <td><?php echo $AssmtName;?></td>
                        <td><?php echo $TotalMarks;?></td>
                        <td><?php echo $formatMarkPercent;?></td>
                        <td><?php echo $ResultGrade;?></td>
                        <td><?php echo $GradeAward;?></td>
                        <td><?php echo $PassStatus;?></td>
                        <td><?php echo $TeacherFeedback;?></td>
                        <td>
                            <button class="action-btn fullResult-btn" onclick="location.href='viewFullResult.php?assmtcode=<?php echo $AssmtCode?>&attmptid=<?php echo $refAtmptID?>';">
                                <i class="fa fa-eye" style="padding-right:5px;"></i>
                                View Full Result
                            </button>
                            <button class="action-btn fullReport-btn" onclick="location.href='viewFullReport.php?assmtcode=<?php echo $AssmtCode?>&attmptid=<?php echo $refAtmptID?>';">
                                <i class="fa fa-file-text" style="padding-right:5px;"></i>
                                View Full Report
                            </button>
                        </td>
                    </tr>
            <?php
                    }
                } else { // For teacher
                    $refTeaID = $_SESSION['SES_TeaID'];

                    $query = "SELECT AttemptID FROM attempt WHERE TeacherID = '$refTeaID';";
                    $results = mysqli_query($connection, $query);
                    while($data = mysqli_fetch_assoc($results)) {
                        $refAtmptID = $data['AttemptID'];

                        $query2 = "SELECT * FROM result WHERE AttemptID = '$refAtmptID';";
                        $results2 = mysqli_query($connection, $query2);
                        $data2 = mysqli_fetch_assoc($results2);

                        $ResultID = $data2['ResultID'];
                        $AssmtCode = $data2['AssmtCode'];
                        $ResultDate = $data2['ResultDate'];
                        $TotalMarks = $data2['TotalMarks'];
                        $MarkPercent = $data2['MarkPercent'];
                        $ResultGrade = $data2['ResultGrade'];
                        $GradeAward = $data2['GradeAward'];
                        $PassStatus = $data2['PassStatus'];
                        $TeacherFeedback = $data2['TeacherFeedback'];

                        // Format mark percentage
                        if (str_ends_with($MarkPercent, '.00')) {
                            $trimmedPercent = str_replace('.00', '', $MarkPercent);
                            $formatMarkPercent = $trimmedPercent . "%";
                        } else {
                            $formatMarkPercent = $MarkPercent . "%";
                        }

                        $query3 = "SELECT * FROM assessment WHERE AssmtCode = '$AssmtCode';";
                        $results3 = mysqli_query($connection, $query3);
                        $data3  = mysqli_fetch_assoc($results3);
                        $AssmtName = $data3['AssmtName'];

            ?>
                    <tr>
                        <td><?php echo $ResultID;?></td>
                        <td><?php echo $ResultDate;?></td>
                        <td><?php echo $AssmtName;?></td>
                        <td><?php echo $TotalMarks;?></td>
                        <td><?php echo $formatMarkPercent;?></td>
                        <td><?php echo $ResultGrade;?></td>
                        <td><?php echo $GradeAward;?></td>
                        <td><?php echo $PassStatus;?></td>
                        <td><?php echo $TeacherFeedback;?></td>
                        <td>
                        <button class="action-btn fullResult-btn" onclick="location.href='viewFullResult.php?assmtcode=<?php echo $AssmtCode?>&attmptid=<?php echo $refAtmptID?>';">
                                <i class="fa fa-eye" style="padding-right:5px;"></i>
                                View Full Result
                            </button>
                            <button class="action-btn fullReport-btn" onclick="location.href='viewFullReport.php?assmtcode=<?php echo $AssmtCode?>&attmptid=<?php echo $refAtmptID?>';">
                                <i class="fa fa-file-text" style="padding-right:5px;"></i>
                                View Full Report
                            </button>
                        </td>
                    </tr>
            <?php
                    }                    
                }
            ?>
        </table>
    </section>

    <!-- Footer -->
    <?php include "footer.php";?>
</body>
</html>