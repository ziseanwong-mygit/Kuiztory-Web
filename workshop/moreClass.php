<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../images/Kuiztory_logo_trans.png">
    <title>Kulztory - More Classes</title>
    <link rel="stylesheet" href="./styles/moreClass.css">
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

    <main>      
        <h1>All Classes</h1>
        <div class="grid-container">
            <?php
                $refTeachID = $_SESSION['SES_TeaID'];
                $query = "SELECT * FROM class WHERE TeacherID = '$refTeachID' ORDER BY ClassRegDate DESC;";
                $results = mysqli_query($connection, $query);

                while ($data = mysqli_fetch_assoc($results)) {
                    $classID = $data['ClassID'];
                    $className = $data['ClassName'];
                    $classDesc = $data['ClassDesc'];
                    $classStatus = $data['ClassStatus'];
                    $classDate = $data['ClassRegDate'];
            ?>
                    <div class="game-card">
                        <div class="code"><?php echo $classID?></div>
                        <div class="title"><?php echo $className?></div>
                        <div class="description"><?php echo $classDesc?></div>
                        <div style="font-size:12px;margin-bottom:3px;">
                            <b>Creation date:</b> <?php echo $classDate?>
                        </div>
                        <div style="font-size:12px;margin-bottom:3px;">
                            <b>Class status:</b> <?php echo $classStatus?>
                        </div>
                        <div class="stats">
                            <button class="class-btn manageMemberBtn" onclick="location.href='manageMembers.php?classid=<?php echo $classID?>';">
                                <i class="fa fa-users" style="padding-right:10px;"></i>
                                Manage Members
                            </button>
                            <button class="class-btn editClassBtn" onclick="location.href='editClass.php?classid=<?php echo $classID?>';">
                                <i class="fa fa-edit" style="padding-right:10px;"></i>
                                Edit Class
                            </button>
                            <button class="class-btn deleteClassBtn" onclick="location.href='deleteClass.php?classid=<?php echo $classID?>';">
                                <i class="fa fa-trash" style="padding-right:10px;"></i>
                                Delete Class
                            </button>
                        </div>
                    </div>
            <?php 
                }                     
            ?>       
        </div>
    </main> 

    <!-- Footer -->
    <?php include "WKSfooter.php";?>
</body>
</html>