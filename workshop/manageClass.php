<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../images/Kuiztory_logo_trans.png">
    <title>Kuiztory - Manage Classes</title>
    <link rel="stylesheet" href="./styles/manageClass.css">
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
        <h1 class="title">Manage Your Classes Here</h1>
        <p class="description">You can edit or delete classes, and view list of members</p>
        
        <div class="class-list">
            <?php
                $refTeachID = $_SESSION['SES_TeaID'];
                $query = "SELECT * FROM class WHERE TeacherID = '$refTeachID' ORDER BY ClassRegDate DESC;";
                $results = mysqli_query($connection, $query);

                while ($data = mysqli_fetch_assoc($results)) {
                    $classID = $data['ClassID'];
                    $className = $data['ClassName'];
                    $classDesc = $data['ClassDesc'];
                    $classStat = $data['ClassStatus'];
                    $classDate = $data['ClassRegDate'];
            ?>
                    <div class="class-card">
                        <div class="class-info">
                            <div class="container-id">
                                <button class="text-id" id="copyID" onclick="copyToClipboard('copyID');" title="Click to copy ID">
                                    <?php echo $classID?>
                                </button>
                            </div>
                            <div class="container-title">
                                <strong class="text-title"><?php echo $className?></strong>
                            </div>
                            <div class="container-desc">
                                <span class="text-desc"><?php echo $classDesc?></span>
                            </div>
                            <div class="container-info">
                                <p class="text-info">
                                    <strong>Creation date:</strong> <?php echo $classDate?> &nbsp; &nbsp; 
                                    <strong>Status:</strong> <?php echo $classStat?>
                                </p>
                            </div>
                        </div>
                        <div class="class-actions">
                            <button class="act-btn view-btn" onclick="location.href='manageMembers.php?classid=<?php echo $classID?>';"> 
                                <i class="fa fa-users" style="padding-right: 5px;"></i>
                                Manage members
                            </button>
                            <button class="act-btn edit-btn" onclick="location.href='editClass.php?classid=<?php echo $classID?>';">
                                <i class="fa fa-pencil-square-o" style="padding-right: 5px;"></i>
                                Edit class
                            </button>
                            <button class="act-btn delete-btn" onclick="location.href='deleteClass.php?classid=<?php echo $classID?>';">
                                <i class="fa fa-trash" style="padding-right: 5px;"></i>
                                Delete class
                            </button>
                        </div>
                    </div>
          <?php } ?>        
        </div>
    </main>

    <script> 
        function copyToClipboard(targetCopy) {
            var textCopy = document.getElementById(targetCopy).innerHTML;

            navigator.clipboard.writeText(textCopy);

            alert("Class ID copied!");
        }
    </script>
    
    <!-- Footer -->
    <?php include "WKSfooter.php";?>
</body>
</html>
