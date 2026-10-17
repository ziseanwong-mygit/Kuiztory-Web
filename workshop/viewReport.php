<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuiztory - View Assessment Report</title>
    <link rel="icon" type="image/x-icon" href="../images/Kuiztory_logo_trans.png">
    <link rel="stylesheet" href="./styles/viewReport.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <!-- Header -->
    <?php 
        if(isset($_SESSION['SES_TeaID'])) {
            include "WKSheader.php";
        }
    ?>

    <h1 class="title">View Assessment Reports</h1>
    <p class="description">Below is the table of both student and teacher assessment reports for the quiz.</p>
    <p class="description-2">You can add comment, view and delete results, and print reports</p>

    <section class="table-container">
        <table>
            <tr>
                <th>Result ID</th>
                <th>Result Date</th>
                <th>User ID</th>
                <th>User Role</th>
                <th>Username</th>
                <th>Grade Level</th>
                <th>Total Marks</th>
                <th>Percentage</th>
                <th>Grade</th>
                <th>Pass Status</th>
                <th>Feedback</th>
                <th>Action</th>
            </tr>
            <?php
                include './crudWKS/DBconnection.php';
                $refAssmtCode = $_GET['assmtcode'];

                $query = "SELECT * FROM result WHERE AssmtCode = '$refAssmtCode';";
                $results = mysqli_query($connection, $query);
                while ($data = mysqli_fetch_assoc($results)) {
                    $ResultID = $data['ResultID'];
                    $refAttemptID = $data['AttemptID'];
                    $ResultDate = $data['ResultDate'];
                    $TotalMarks = $data['TotalMarks'];
                    $MarkPercent = $data['MarkPercent'];
                    $ResultGrade = $data['ResultGrade'];
                    $PassStatus = $data['PassStatus'];
                    $Feedback = $data['TeacherFeedback'];

                    // Format mark percentage
                    if (str_ends_with($MarkPercent, '.00')) {
                        $trimmedPercent = str_replace('.00', '', $MarkPercent);
                        $formatMarkPercent = $trimmedPercent . "%";
                    } else {
                        $formatMarkPercent = $MarkPercent . "%";
                    }

                    $query2 = "SELECT * FROM attempt WHERE AttemptID = '$refAttemptID';";
                    $results2 = mysqli_query($connection, $query2);
                    $data2 = mysqli_fetch_assoc($results2);

                    $refStudentID = $data2['StudentID'];
                    $refTeacherID = $data2['TeacherID'];

                    if($refStudentID != NULL) {
                        $query3 = "SELECT * FROM student WHERE StudentID = '$refStudentID';";
                        $results3 = mysqli_query($connection, $query3);
                        $data3 = mysqli_fetch_assoc($results3);

                        $UserID = $data3['StudentID'];
                        $UserRole = "Student";
                        $UserName = $data3['StudentName'];
                        $UserLevel = $data3['StudentGradeLvl'];

                    } else {
                        $query4 = "SELECT * FROM teacher WHERE TeacherID = '$refTeacherID';";
                        $results4 = mysqli_query($connection, $query4);
                        $data4 = mysqli_fetch_assoc($results4);
    
                        $UserID = $data4['TeacherID'];
                        $UserRole = "Teacher";
                        $UserName = $data4['TeacherName'];
                        $UserLevel = $data4['TeachingLvl'];
                    }
            ?>
                    <tr>
                        <td><?php echo $ResultID;?></td>
                        <td><?php echo $ResultDate;?></td>
                        <td><?php echo $UserID;?></td>
                        <td><?php echo $UserRole;?></td>
                        <td><?php echo $UserName;?></td>
                        <td><?php echo $UserLevel;?></td>
                        <td><?php echo $TotalMarks;?></td>
                        <td><?php echo $formatMarkPercent;?></td>
                        <td><?php echo $ResultGrade;?></td>
                        <td>
                        <?php 
                                if ($PassStatus == "Passed") {
                            ?>    
                                    <span style="color:lime;"><?php echo $PassStatus;?></span>
                            <?php
                                } else {
                            ?>
                                    <span style="color:red;"><?php echo $PassStatus;?></span>
                            <?php
                                }    
                            ?>
                        </td>
                        <td><?php echo $Feedback;?></td>
                        <td>
                            <div class="action-container">
                                <button class="action-btn comment-btn" onclick="location.href='commentFeedback.php?assmtcode=<?php echo $refAssmtCode?>&resultid=<?php echo $ResultID?>&userid=<?php echo $UserID?>';">
                                    <i class="fa fa-comment" style="padding-right:5px;"></i>
                                    Comment Feedback
                                </button>
                                <button class="action-btn result-btn" onclick="location.href='viewFullResult.php?resultid=<?php echo $ResultID?>';">
                                    <i class="fa fa-eye" style="padding-right:5px;"></i>
                                    View Full Result
                                </button>
                                <button class="action-btn report-btn" onclick="location.href='viewFullReport.php?resultid=<?php echo $ResultID?>';">
                                    <i class="fa fa-file-text" style="padding-right:5px;"></i>
                                    View Full Report
                                </button>
                                <form action="" method="POST">
                                    <button class="action-btn delete-btn" type="submit" name="deleteResult" value="<?php echo $ResultID?>">
                                        <i class="fa fa-trash" style="padding-right:5px;"></i>
                                        Delete
                                    </button>
                                </form>

                            </div>    
                        </td>
                    </tr>
          <?php } ?>
        </table>
    </section>

    <?php
        if(isset($_POST['deleteResult'])) {
            $referResultID = $_POST['deleteResult'];
    ?>
            <script>
                if(confirm("Are you sure you want to delete this result? This action cannot be undone.") == true) {        
                    window.location = "./crudWKS/deleteResult.php?resultid=<?php echo $referResultID?>";
                }
            </script>
    <?php
        }
    ?>

    <!-- Footer -->
    <?php include "WKSfooter.php";?>
</body>
</html>