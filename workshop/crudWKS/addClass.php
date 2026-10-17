<?php
    function generateID($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
    
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        
        return $randomString;
    }
?>

<?php
    $newID = "CLS_" . generateID();
    $newDate = date("Y-m-d");
    $refTeaID = $_SESSION['SES_TeaID'];
    
    include 'DBconnection.php';

    $inpName = $_POST['ClassName'];
    $inpDesc = $_POST['ClassDesc'];
    $inpStatus = $_POST['ClassStatus'];

    $query = "INSERT INTO class (ClassID, TeacherID, ClassName, ClassDesc, ClassStatus, ClassRegDate) 
    VALUES ('$newID', '$refTeaID', '$inpName', '$inpDesc', '$inpStatus', '$newDate');";
    $results = mysqli_query($connection, $query);

    if($results) {
?>
    <script>
        alert("Your class has been successfully created! Its details are saved in the database.");
        if(confirm("Do you wish to add students in your class?") == true) {
            window.location = "./addMember.php?classid=<?php echo $newID?>"; // need to change link
        } else {
            window.location = "assessmentWorkshop.php";
        }
    </script>
<?php
    } else {
?>
    <script>
        alert("Sorry! Your class details are failed to be stored in the database. Please try again!");
    </script>
<?php
    }
?>