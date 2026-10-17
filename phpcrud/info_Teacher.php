<?php
    include './phpcrud/DBconnection.php';
    $getTeaID = $_SESSION['SES_TeaID'];

    $query = "SELECT * FROM teacher WHERE TeacherID = '$getTeaID';";

    $results = mysqli_query($connection, $query);
    
    $data = mysqli_fetch_assoc($results);

    $refTeaID = $data['TeacherID'];
    $refTeaEmail = $data['TeacherEmail'];
    $refTeaName = $data['TeacherName'];
    $refTeaTelNo = $data['TeacherTelNo'];
    $refTeaGender = $data['TeacherGender'];
    $refTeaCountry = $data['TeacherCountry'];
    $refTeaLvl = $data['TeachingLvl'];
    $refTeaSchool = $data['TeacherSchool'];
    $refTeaRole = $data['TeacherRole'];
    $refTeaImg = $data['TeacherImg'];
    $refTeaPswd = $data['TeacherPSWD'];
    $refTeaRegDate = $data['TeacherRegDate'];
?>