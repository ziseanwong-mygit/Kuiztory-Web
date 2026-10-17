<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuiztory - Manage Question</title>
    <link rel="icon" type="image/x-icon" href="../images/Kuiztory_logo_trans.png">
    <link rel="stylesheet" href="./styles/manageMembers.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php
        include './crudWKS/DBconnection.php';
    ?>

    <!-- Header -->
    <?php 
        if(isset($_SESSION['SES_TeaID'])) {
            include "WKSheader.php";
        }
    ?>

    <h1 class="title">Manage Class Members</h1>
    <p class="description">Here you can add or remove students in your classes.</p>

    <?php
        include './crudWKS/DBconnection.php';
        $refClassID =  $_GET['classid'];
        
        $query = "SELECT * FROM class WHERE ClassID = '$refClassID';";
        $results = mysqli_query($connection, $query);
        $data = mysqli_fetch_assoc($results);
        $ClassName = $data['ClassName'];
        $ClassDesc = $data['ClassDesc'];
        $ClassStatus = $data['ClassStatus'];
    ?>

    <section class="table-container">
        <button class="Back-Btn" onclick="location.href='manageClass.php';">
            <i class="fa fa-arrow-left" style="padding-right:10px;"></i>    
            Back to Manage Class Page
        </button>
        <div class="info-panel">
            <div class="inner-panel">
                <h3 style="font-style:italic;"><?php echo $refClassID;?></h3>
                <?php
                    if ($ClassStatus == "Active") {
                ?> 
                        <h3 style="color:lime;"><?php echo $ClassStatus;?></h3>
                <?php
                    } else {
                ?>
                        <h3 style="color:red;"><?php echo $ClassStatus;?></h3>
                <?php        
                    }
                ?>
            </div>
            <h2 style="padding-bottom:5px;font-weight:bold;"><?php echo $ClassName;?></h2>
            <p><?php echo $ClassDesc;?></p>
        </div>

        <button class="insert-member-btn" onclick="location.href='addMember.php?classid=<?php echo $refClassID?>';">
            <i class="fa fa-user-plus" style="padding-right:5px;"></i>
            Add Member
        </button>

        <table>
            <tr>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Student Grade</th>
                <th>Student School</th>
                <th>Enrollment Date</th>
                <th>Action</th>
            </tr>
            <?php
                $query2 = "SELECT * FROM enrollment WHERE ClassID = '$refClassID';";
                $results2 = mysqli_query($connection, $query2);
                while ($data2 = mysqli_fetch_assoc($results2)) {

                    $EnrollDate = $data2['EnrollDate'];
                    $StudentID = $data2['StudentID'];

                    $query3 = "SELECT * FROM student WHERE StudentID = '$StudentID';";
                    $results3 = mysqli_query($connection, $query3);
                    $data3 = mysqli_fetch_assoc($results3);

                    $StudentName = $data3['StudentName'];
                    $StudentGrade = $data3['StudentGradeLvl'];
                    $StudentSchool = $data3['StudentSchool'];
            ?>
                    <tr>
                        <td><?php echo $StudentID;?></td>
                        <td><?php echo $StudentName;?></td>
                        <td><?php echo $StudentGrade;?></td>
                        <td><?php echo $StudentSchool;?></td>
                        <td><?php echo $EnrollDate;?></td>
                        <td>
                            <form action="" method="POST">
                                <button class="action-btn" type="submit" name="deleteStu" value="<?php echo $StudentID;?>">
                                    <i class="fa fa-user-times" style="padding-right:5px;"></i>
                                    Remove Member
                                </button>
                            </form>
                        </td>
                    </tr>
          <?php } ?>
        </table>
    </section>

    <?php
        if(isset($_POST['deleteStu'])) {
            $referStudentID = $_POST['deleteStu'];
    ?>
            <script>
                if(confirm("Are you sure you want to remove this student from your class?") == true) {        
                    window.location = "./crudWKS/removeMemberClass.php?stuid=<?php echo $referStudentID?>&classid=<?php echo $refClassID;?>";
                }
            </script>
    <?php
        }
    ?>
    
    <!-- Footer -->
    <?php include "WKSfooter.php";?>
</body>
</html>