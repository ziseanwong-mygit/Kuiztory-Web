<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuiztory - Add Member into Class</title>
    <link rel="icon" type="image/x-icon" href="../images/Kuiztory_logo_trans.png">
    <link rel="stylesheet" href="./styles/addMember.css">
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

    <h1 class="title">Add Students in Class</h1>
    <p class="description">You can help your students to enroll in your class by adding them. Below is the table of all students.</p>

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

    <div class="info-panel">
        <button class="Back-Btn" onclick="location.href='manageMembers.php?classid=<?php echo $refClassID?>';">
            <i class="fa fa-users" style="padding-right:10px;"></i>    
            Back to Manage Members
        </button>
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

    <div class="select-container">
        <h2 style="margin-bottom:20px;">Select a student name to add</h2>
        <form action="" method="POST">
            <label for="label-student" class="StuLabel">Student Name:</label>
            <select id="student-account" class="fieldInput" name="stuID" required>
                <option value="">Select a student</option>
                <?php
                    $query4 = "SELECT StudentID, StudentName FROM student";
                    $results4 = mysqli_query($connection, $query4);
                    while($data4 = mysqli_fetch_assoc($results4)) {
                        $valueID = $data4['StudentID'];
                        $refName = $data4['StudentName'];
                ?>
                        <option value="<?php echo $valueID?>"><?php echo $refName?></option>
                <?php
                    }
                ?>
            </select><br>  
            <input type="submit" class="submit-btn" name="addMember" value="Add Student">
        </form>             
    </div>

    <section class="table-container">
        <h2 style="margin-bottom:20px;text-align:center;">All Student Table</h2>
        <table>
            <tr>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Student Grade</th>
                <th>Student School</th>
                <th>Registration Date</th>
            </tr>
            <?php
                $query2 = "SELECT * FROM student";
                $results2 = mysqli_query($connection, $query2);
                while ($data2 = mysqli_fetch_assoc($results2)) {
                    $StudentID = $data2['StudentID'];
                    $StudentName = $data2['StudentName'];
                    $StudentGrade = $data2['StudentGradeLvl'];
                    $StudentSchool = $data2['StudentSchool'];
                    $StudentRegDate = $data2['StudentRegDate'];
            ?>
                    <tr>
                        <td><?php echo $StudentID;?></td>
                        <td><?php echo $StudentName;?></td>
                        <td><?php echo $StudentGrade;?></td>
                        <td><?php echo $StudentSchool;?></td>
                        <td><?php echo $StudentRegDate;?></td>
                    </tr>
          <?php } ?>
        </table>
    </section>
    
    <?php
        if(isset($_POST['addMember'])) {
            $stuID = $_POST['stuID'];
    ?>
            <script>
                if(confirm("Are you sure you want to add this student into your class?") == true) {        
                    window.location = "./crudWKS/addMemberClass.php?stuid=<?php echo $stuID?>&classid=<?php echo $refClassID;?>";
                }
            </script>
    <?php
        }
    ?>
    
    <!-- Footer -->
    <?php include "WKSfooter.php";?>
</body>
</html>