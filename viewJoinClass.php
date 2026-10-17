<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuiztory - View Enrolled Classes</title>
    <link rel="icon" type="image/x-icon" href="./images/Kuiztory_logo_trans.png">
    <link rel="stylesheet" href="./styles/viewJClass.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <!-- Header -->
    <?php 
        $_SESSION['SES_StuID'] = "STU_ZRPLYWBQ7C"; // need to follow based on login
        if(isset($_SESSION['SES_StuID']) || isset($_SESSION['SES_TeaID'])) {
            include "header2.php";
        } else {
            include "header.php";
        }
    ?>

    <h1 class="title">View Enrolled Classes</h1>
    <p class="description">You can view the list of enrolled classes in the table below.</p>

    <section class="table-container">
        <table>
            <tr>
                <th>Class ID</th>
                <th>Class Name</th>
                <th>Class Description</th>
                <th>Teacher Name</th>
                <th>Class Status</th>
                <th>Enrollment Date</th>
                <th>Action</th>
            </tr>
            <?php
                include './phpcrud/DBconnection.php';
                $refStuID =  $_SESSION['SES_StuID'];

                $query = "SELECT * FROM enrollment WHERE StudentID = '$refStuID';";
                $results = mysqli_query($connection, $query);
                while ($data = mysqli_fetch_assoc($results)) {
                    $ClassID = $data['ClassID'];
                    $EnrollDate = $data['EnrollDate'];

                    $query2 = "SELECT * FROM class WHERE ClassID = '$ClassID';";
                    $results2 = mysqli_query($connection, $query2);
                    $data2 = mysqli_fetch_assoc($results2);

                    $ClassName = $data2['ClassName'];
                    $ClassDesc = $data2['ClassDesc'];
                    $TeacherID = $data2['TeacherID'];
                    $ClassStatus = $data2['ClassStatus'];

                    $query3 = "SELECT * FROM teacher WHERE TeacherID = '$TeacherID';";
                    $results3 = mysqli_query($connection, $query3);
                    $data3 = mysqli_fetch_assoc($results3);

                    $TeacherName = $data3['TeacherName'];
            ?>
                    <tr>
                        <td><?php echo $ClassID;?></td>
                        <td><?php echo $ClassName;?></td>
                        <td><?php echo $ClassDesc;?></td>
                        <td><?php echo $TeacherName;?></td>
                        <td><?php echo $ClassStatus;?></td>
                        <td><?php echo $EnrollDate;?></td>
                        <td>
                            <button class="action-btn" onclick="confirmUnenroll()">
                                <i class="fa fa-sign-out" style="padding-right:5px;"></i>
                                Unenroll
                            </button>
                        </td>
                    </tr>
          <?php } ?>
        </table>
    </section>

    <script>
        function confirmUnenroll(){
            if(confirm("Are you sure you want to unenroll this class?")) {
                location.href="./phpcrud/unenrollClass.php?ClassID=<?php echo $ClassID;?>";
            }
        }
    </script>

    <!-- Footer -->
    <?php include "footer.php";?>
</body>
</html>