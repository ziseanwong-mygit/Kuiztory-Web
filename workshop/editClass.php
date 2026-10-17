<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuiztory - Edit Class Info</title>
    <link rel="icon" type="image/x-icon" href="../images/Kuiztory_logo_trans.png">
    <link rel="stylesheet" href="./styles/editClass.css">
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

    <?php
        $refClassID = $_GET['classid'];

        $query = "SELECT * FROM class WHERE ClassID = '$refClassID';";
        $results = mysqli_query($connection, $query);
        $data = mysqli_fetch_assoc($results);

        $className = $data['ClassName'];
        $classDesc = $data['ClassDesc'];
        $classStat = $data['ClassStatus'];
    ?>

    <h1>Edit Class Information</h1>
    <p>
        You can edit your class info by changing the details below. <br> 
        <span style="color: red; font-weight: bold;">Each details cannot be blank.</span>
    </p>

    <main>
        <div id="student" class="form-section active">
            <form action="" method="POST">
                <label for="class-name">Class Name:</label>
                <input type="text" id="class-name" name="ClassName" placeholder="Eg: Kelas SPM Sejarah HOTS" value="<?php echo $className?>" required>

                <label for="class-desc">Class Description:</label>
                <textarea name="ClassDesc" placeholder="E.g. Selamat datang kepada semua pelajar untuk menyertai kelas ini!" required><?php echo $classDesc?></textarea>
                   
                <label for="class-status">Class Status:</label>
                <select id="class-status" name="ClassStatus" required>
                    <option value="">Select a status</option>
                    <?php
                        if ($classStat == "Active") {
                    ?>        
                            <option value="Active" selected>Active</option>
                            <option value="Inactive">Inactive</option>
                    <?php        
                        } else {
                    ?>        
                            <option value="Active">Active</option>
                            <option value="Inactive" selected>Inactive</option>
                    <?php       
                        }
                    ?>
                </select>

                <button type="submit" name="startUpdate">Update Class</button>
                <button type="button" onclick="history.back();">Cancel Update</button>
            </form>
        </div>
    </main>
    
    <?php
        if(isset($_POST['startUpdate'])) {
            include "./crudWKS/updateClass.php";
        }
    ?>
   
    <!-- Footer -->
    <?php include "WKSfooter.php";?>
</body>
</html>
